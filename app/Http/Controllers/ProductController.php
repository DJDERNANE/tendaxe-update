<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Store;
use App\Models\User;
use App\Models\Pub;
use App\Models\Photo;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Retrieve the currently authenticated user
        $user = User::where('id', Auth::id())->first();
        
        // Check if the user exists
        if (!$user) {
            // Handle the case where the user is not found
            return redirect()->back()->with('error', 'User not found.');
        }

        // Ensure the user has at least one store
        if ($user->store->isEmpty()) {
            // Handle the case where the user does not have any stores
            return redirect()->back()->with('error', 'User does not have any stores.');
        }

        // Get the first store of the user
        $store = $user->store->first();

        // Retrieve products where 'accepted' is false
        $products = $store->products()->where('accepted', true)->get();

        // Ensure the store has at least one latest subscription
        $latestSubscription = $store->latestSubscription->first();

        if (!$latestSubscription) {
            // Handle the case where the store does not have any subscriptions
            return redirect()->back()->with('error', 'Store does not have any subscriptions.');
        }

        // Get the points from the latest subscription
        $score = $latestSubscription->points;

        // Return the view with products and score
        return view('store.panel.products', compact('products', 'score'));
    }

    public function pending()
    {
       // Retrieve the currently authenticated user
        $user = User::where('id', Auth::id())->first();
        
        // Check if the user exists
        if (!$user) {
            // Handle the case where the user is not found
            return redirect()->back()->with('error', 'User not found.');
        }

        // Ensure the user has at least one store
        if ($user->store->isEmpty()) {
            // Handle the case where the user does not have any stores
            return redirect()->back()->with('error', 'User does not have any stores.');
        }

        // Get the first store of the user
        $store = $user->store->first();

        // Retrieve products where 'accepted' is false
        $products = $store->products()->where('accepted', false)->get();

        // Ensure the store has at least one latest subscription
        $latestSubscription = $store->latestSubscription->first();

        if (!$latestSubscription) {
            // Handle the case where the store does not have any subscriptions
            return redirect()->back()->with('error', 'Store does not have any subscriptions.');
        }

        // Get the points from the latest subscription
        $score = $latestSubscription->points;

        // Return the view with products and score
        return view('store.panel.pendingProducts', compact('products', 'score'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats1 = Category::where('parent_id', null)->get();
     
        $brands = Brand::all();
        $user =  User::where('id',Auth::id())->get()->first();

        $stores = $user->store;
    
        

        return view('store.panel.addProduct', compact(['brands','cats1', 'stores']));
        //return $stores;
    }


    public function adminCreate()
    {
        $cats1 = Category::where('parent_id', null)->get();
     
        $brands = Brand::all();
        $user =  User::where('id',Auth::id())->get()->first();
      
        $stores = Store::all();
     
        return view('admin.store.addProduct', compact(['brands','cats1', 'stores']));
        //return $stores;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    try {
        
        $user = Auth::user();
        $accepted = $user->type_user == "Super admin";

        $userstore = $user->store[0]->id;
        $imageName = '';
        if ($request->hasFile('picture')) {
            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./Products', $imageName, 'pictures');
        }

        $product = Product::create([
            'name' => $request->name,
            'ref' => $request->ref,
            'unit' => $request->unit,
            'picture' => $imageName,
            'price' => $request->price,
            'quantity' => $request->qty,
            'brand_id' => $request->brand,
            'primary_desc' => $request->desc,
            'full_desc' => $request->details,
            'discount' => $request->discount,
            'satrtOn' => $request->debut,
            'endOn' => $request->fin,
            'store_id' => $userstore,
            'accepted' => $accepted,
            'valeur' => $request->valeur
        ]);

        Log::info('Product created.', ['product_id' => $product->id]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $imgName = $img->getClientOriginalName();
                $img->storeAs('./Products/pictures/' . $imageName, $imgName, 'pictures');
                Photo::create([
                    'name' => $imgName,
                    'path' => $imgName,
                    'product_id' => $product->id
                ]);

                Log::info('Gallery image uploaded.', ['image_name' => $imgName]);
            }
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->storeAs('./Products/files/' . $imageName, $fileName, 'pictures');
                Document::create([
                    'name' => $fileName,
                    'path' => $fileName,
                    'product_id' => $product->id
                ]);

                Log::info('File uploaded.', ['file_name' => $fileName]);
            }
        }

        // Attach categories to the product
        $product->categories()->attach($request->cats);

        Log::info('Categories attached to product.', ['product_id' => $product->id, 'categories' => $request->cats]);

        return back()->with('success', 'produit ajouter');
    } catch (\Exception $e) {
        Log::error('Error in product creation.', ['error' => $e->getMessage()]);
        return back()->with('error', 'etab not inserted');
    }
}

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //return view('store.productDetails');
        return $product->quantity;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = Category::all();
        $brands = Brand::all();
        $selectedCategories = $product->categories->pluck('id')->toArray();
        return view('store.panel.detailsProduct', compact('product','cats', 'brands','selectedCategories'));
    }


    public function adminEdit(Product $product)
    {
        $cats = Category::all();
        $brands = Brand::all();
        $selectedCategories = $product->categories->pluck('id')->toArray();
        return view('admin.store.productDetails', compact('product','cats', 'brands', 'selectedCategories'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('picture')) {
            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./Products',$imageName,'pictures');
            $product->picture = $imageName; 
        }

        if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $img) {
                    $imgName = $img->getClientOriginalName();
                    $proimg = $img->storeAs('./Products/pictures/'.$imageName, $imgName,'pictures');
                    Photo::create([
                        'name'=> $imgName,
                        'path'=> $imgName,
                        'product_id' => $product->id
                    ]);
                }

        }

        if ($request->hasFile('files')) {
                foreach ($request->file('files') as $img) {
                    $imgName = $img->getClientOriginalName();
                    $proimg = $img->storeAs('./Products/files/'.$imageName.'', $imgName,'pictures');
                    Document::create([
                        'name'=> $imgName,
                        'path'=> $imgName,
                        'product_id' => $product->id
                    ]);
                }

        }
        $product->update([
            'name' => $request->name,
            'ref' => $request->ref,
            'unit' => $request->unit,
            'price' => $request->price,
            'quantity' => $request->qty,
            'brand_id' => $request->brand,
            'primary_desc' => $request->desc,
            'full_desc' => $request->details,
            'discount' => $request->discount,
            'satrtOn' => $request->debut,
            'endOn' => $request->fin,
        ]);
        $product->save();

        $product->categories()->sync($request->cats);
            

        return redirect()->route('products.all');
    }

    public function adminUpdate(Request $request, Product $product)
    {
        if ($request->hasFile('picture')) {
            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./Products',$imageName,'pictures');
            $product->picture = $imageName; 
        }

        if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $img) {
                    $imgName = $img->getClientOriginalName();
                    $proimg = $img->storeAs('./Products/pictures/'.$imageName, $imgName,'pictures');
                    Photo::create([
                        'name'=> $imgName,
                        'path'=> $imgName,
                        'product_id' => $product->id
                    ]);
                }

        }

        if ($request->hasFile('files')) {
                foreach ($request->file('files') as $img) {
                    $imgName = $img->getClientOriginalName();
                    $proimg = $img->storeAs('./Products/files/'.$imageName.'', $imgName,'pictures');
                    Document::create([
                        'name'=> $imgName,
                        'path'=> $imgName,
                        'product_id' => $product->id
                    ]);
                }

        }
        $product->update([
            'name' => $request->name,
            'ref' => $request->ref,
            'unit' => $request->unit,
            'price' => $request->price,
            'quantity' => $request->qty,
            'brand_id' => $request->brand,
            'primary_desc' => $request->desc,
            'full_desc' => $request->details,
            'discount' => $request->discount,
            'satrtOn' => $request->debut,
            'endOn' => $request->fin,
            'valeur' => $request->valeur
        ]);
        $product->save();

            

        return redirect()->route('products.pending.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function adminProductsAccepted(){
        $products = Product::where('accepted', true)->get();
        return view('admin.store.products', compact('products'));
    }
    public function adminProductsPending(){
        $products = Product::where('accepted', false)->get();
        return view('admin.store.productsPending', compact('products'));
    }
    public function accept(Product $product)
    {
        try {
            // Update the 'accepted' attribute of the product
            $updated = $product->update(['accepted' => true]);
    
            if ($updated) {
                // Check if the product's store has a latest subscription
                $latestSubscription = $product->store->latestSubscription->first();
    
                if ($latestSubscription) {
                    // Decrement the points and save the subscription
                    $latestSubscription->points -= 1;
                    $latestSubscription->save();
                }
            }
    
            return redirect()->route('products.pending.all')->with('success', 'Product accepted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('products.pending.all')->with('error', 'An error occurred while accepting the product.');
        }
    }
    


    public function reject(Product $product){
        $product->update([
            'accepted' =>false
        ]);
        return redirect()->route('products.accepted.all');
    }

    public function categoryProduct(Category $category){
        $products = $category->products()->paginate(60);
        $mainCats  = Category::where('parent_id', null)->orderBy('position', 'asc')->get();;
        $cats = Category::all();
        $pubs = Pub::where('zone', 2)->get();
        $productsPub = Product::orderBy('valeur')->take(12)->get();
        return view('store.products', compact('products','cats', 'mainCats', 'pubs', 'productsPub'));
    }

    
}

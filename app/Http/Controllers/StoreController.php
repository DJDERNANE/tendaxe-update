<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Pub;
use App\Models\abonnementBoutique;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index(){
        $cats  = Category::where('parent_id', null)->orderBy('position', 'asc')->paginate(20);
        $products = Product::where('accepted', true)->orderBy('valeur' , 'desc')->take(12)->get();
        $brands = Brand::all();
        $stores = Store::where('isActive', true)->get();
        $pubs = Pub::where('zone', 1)->get();
       
        return view('store.index', compact('cats', 'products', 'brands', 'stores', 'pubs'));
    }

    public function products(){
        $pubs = Pub::where('zone', 2)->get();
        $mainCats  = Category::where('parent_id', null)->get();
        $products = Product::where('accepted', true)->paginate(24);
        return view('store.products', compact('products','mainCats', 'pubs'));
    }
    public function marques(){
        $brands = Brand::all();
        return view('store.marques', compact('brands'));
    }
    public function Stores(){
        $stores = Store::where('isActive', true)->get();
        return view('store.allStores', compact('stores'));
    }
    public function marqueProducts(Brand $brand){
        $products = $brand->products;
        return view('store.marqueProducts', compact('products', 'brand'));
    }
    public function productDetails(Product $product){
       // Fetch category IDs associated with the given product that are of level 2
    $categoryIds = $product->categories->where('level', 1)->pluck('id');

    // Fetch products that belong to any of these level 2 categories, excluding the current product
    $products = Product::whereHas('categories', function ($query) use ($categoryIds) {
        $query->whereIn('categories.id', $categoryIds);
    })->where('id', '<>', $product->id)->take(12)->get(); // Don't forget to call get() to execute the query
    $cats = Category::where('level', 0)->orderBy('position', 'asc')->get();
    return view('store.productDetails', compact('product', 'products', 'cats'));
    }
    public function createStore(){
        $cats  = Category::where('parent_id', null)->get();
        return view('createStore', compact('cats'));

    }

    public function saveStore(Request $request){
        $coverName = '';
        $logoName= '';
        if ($request->hasFile('logo')) {
            $logoName = $request->file('logo')->getClientOriginalName();
            $logo = $request->file('logo')->storeAs('./storeLogos',$logoName,'pictures');
        }
        if ($request->hasFile('cover')) {
            $coverName = $request->file('logo')->getClientOriginalName();
            $cover = $request->file('logo')->storeAs('./storeCovera',$coverName,'pictures');
        }

        $store = Store::create([
            'storeName'=> $request->storeName,
            'logo'=> $logoName,
            'cover'=> $coverName,
            'wilaya'=> $request->wilaya,
            'region'=> $request->region,
            'secteur'=> $request->secteur,
            'user_id'=> Auth::id(),
        ]);
        
        if ($store) {
            $startDate = now();
            $endDate = $startDate->copy()->addDays(5);
            $abnm = abonnementBoutique::create([
                'store_id' => $store->id,
                'date_debut'=>$startDate,
                'date_fin'=>$endDate
            ]);
            return redirect()->route('store');
        }
    }

    public function allStores(Request $request){
        $query = Store::where('isActive', false);

    // Check if search term is provided
    if ($request->filled('name')) {
        $searchTerm = $request->get('name');

        // Search by store name, user email, or user username
        $query->where(function($query) use ($searchTerm) {
            $query->where('storeName', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('user', function($query) use ($searchTerm) {
                      $query->where('email', 'like', '%' . $searchTerm . '%')
                            ->orWhere('nom', 'like', '%' . $searchTerm . '%');
                  });
        });
    }

    // Get stores matching the criteria
    $stores = $query->get();
        return view('admin.store.stores', compact('stores'));
    }
    
    public function acceptedStores(Request $request)
{
    $query = Store::where('isActive', true);

    // Check if search term is provided
    if ($request->filled('name')) {
        $searchTerm = $request->get('name');

        // Search by store name, user email, or user username
        $query->where(function($query) use ($searchTerm) {
            $query->where('storeName', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('user', function($query) use ($searchTerm) {
                      $query->where('email', 'like', '%' . $searchTerm . '%')
                            ->orWhere('nom', 'like', '%' . $searchTerm . '%');
                  });
        });
    }

    // Get stores matching the criteria
    $stores = $query->get();

    return view('admin.store.acceptedStores', compact('stores'));
}



    public function active($id){
        $store = Store::find($id);
        $store->update([
            'isActive'=> true
        ]);
        $stores = Store::all();
        return redirect()->route('stores.pending');
    }
    
    public function block(Store $store){
        $store->update([
            'isActive'=> false
        ]);
        return redirect()->route('stores.accepted');
        
    }
    
    public function show(Store $store){
        return view('store.boutique', compact('store'));
    }
    public function showStoreAdmin(Store $store){
        return view('admin.store.editStore', compact('store'));
    }

    public function editStoreAdmin(Request $request, Store $store)
    {
        // Handle the logo upload
        if ($request->hasFile('logo')) {
            $logoName = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('storeLogos', $logoName, 'pictures');
            $store->logo = $logoName; // Store only the filename, or use the full path if preferred
        }
    
        // Handle the cover upload
        if ($request->hasFile('cover')) {
            $coverName = $request->file('cover')->getClientOriginalName();
            $request->file('cover')->storeAs('storeCovers', $coverName, 'pictures');
            $store->cover = $coverName; // Store only the filename, or use the full path if preferred
        }
    
        // Update other store attributes
        $store->storeName = $request->nom;
        $store->valeur = $request->valeur;
    
        $store->save();
    
        return redirect()->route('stores.accepted');
    }
    

    public function allProducts(){
        $products = Product::orderBy('valeur', 'desc')->paginate(60);
        $mainCats  = Category::where('parent_id', null)->get();
        $cats = Category::all();
        $pubs = Pub::where('zone', 2)->get();
        $productsPub = Product::orderBy('valeur')->take(12)->get();
        return view('store.products', compact('products','mainCats', 'pubs', 'cats', 'productsPub'));
    }
}

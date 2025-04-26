<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Pub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::orderBy('position', 'asc')->get();
        $products = Product::where('accepted', true)->get();
        return view('admin.store.categories', compact('cats', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        
        if ($request->hasFile('picture')) {
            $iconName = '';
            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./Category',$imageName,'pictures');
            if ($request->hasFile('icon')) {
                $iconName = $request->file('icon')->getClientOriginalName();
                $icon = $request->file('icon')->storeAs('./Category/Icons',$iconName,'pictures');
            }
            $parent = Category::find($request->parent_id);
            $level = $parent ? $parent->level + 1 : 0;
            if ($level == 0 ) {
                $position = Category::max('position') + 1; // Assign the next available position
            }else{
                $position = 0;
            }
            
            Category::create([
                'icon' => $iconName,
                'parent_id' => $request->parent_id,
                'level' => $level,
                'name' => $request->name,
                'picture' => $imageName, // This will be null if no file was uploaded
                'position'=> $position
            ]);
           
            return redirect()->route('categories.level', ['level' => $level])->with('success', 'Category added successfully!');
        }
    } catch (\Throwable $th) {
        return $th;
    }
   

    
 
 
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.store.editCategory', compact('category', 'categories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
            'position' => 'required|integer|min:0', // Validate position input
        ]);
    
        try {
            // Initialize the icon and picture names
            $iconName = $category->icon;
            $imageName = $category->picture;
    
            // Handle picture upload
            if ($request->hasFile('picture')) {
                if ($category->picture) {
                    Storage::disk('pictures')->delete('Category/' . $category->picture);
                }
    
                $imageName = $request->file('picture')->getClientOriginalName();
                $request->file('picture')->storeAs('Category', $imageName, 'pictures');
            }
    
            // Handle icon upload
            if ($request->hasFile('icon')) {
                if ($category->icon) {
                    Storage::disk('pictures')->delete('Category/Icons/' . $category->icon);
                }
    
                $iconName = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->storeAs('Category/Icons', $iconName, 'pictures');
            }
    
            // Update positions
            $newPosition = $request->position;
    
            // Adjust positions of other categories
            if ($newPosition !== $category->position) {
                // If moving up (to a higher position)
                if ($newPosition < $category->position) {
                    Category::where('position', '>=', $newPosition)
                        ->where('position', '<', $category->position)
                        ->increment('position');
                } else { // If moving down (to a lower position)
                    Category::where('position', '<=', $newPosition)
                        ->where('position', '>', $category->position)
                        ->decrement('position');
                }
            }
    
            // Update the category
            $category->update([
                'icon' => $iconName,
                'parent_id' => $request->parent_id,
                // 'level' => $category->parent_id ? $category->level + 1 : 0, // Update level accordingly
                'name' => $request->name,
                'picture' => $imageName,
                'position' => $request->position, // Update the position
            ]);
    
            return redirect()->back()->with('success', 'Category updated successfully!');
        } catch (\Throwable $th) {
            \Log::error('Error updating category: ' . $th->getMessage());
    
            return redirect()->back()->with('error', 'An error occurred while updating the category. Please try again.');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids');
        $categories = Category::whereIn('id', $ids)->get();

        // Loop through each category and delete associated pictures
        foreach ($categories as $category) {
            $imagePath = 'Category/' . $category->picture;

            // Delete the file from the 'pictures' disk
            Storage::disk('pictures')->delete($imagePath);

            // Delete the file from the default disk (e.g., 'public')
            Storage::delete($imagePath);

            // Delete the record from the database
            $category->delete();
        }
        return response()->json(['message' => 'Successfully deleted categories and their pictures.']);
    }

    public function showLevel($level)
    {
        $cats1 = Category::where('parent_id', null)->orderBy('position', 'asc')->get();
      
        // Fetch categories for the specified level
        $categories = Category::where('level', $level)->orderBy('position', 'asc')->get();

        // Fetch parent categories for the filter (only if level is greater than 1)
        $parentCategories = $level > 0 ? Category::where('level', $level-1)->get() : [];

        return view('admin.store.level', compact('categories', 'level', 'cats1', 'parentCategories'));
    }
    public function filterLevel(Request $request)
    {
        $level = $request->level;
        $cats1 = Category::where('parent_id', null)->get();
        
        // Start the query with the selected level and parent category if specified
        $query = Category::query();
        // Filter by parent category if selected
        if ($request->filled('parent_category')) {
            $query->where('parent_id', $request->parent_category);
        }
    
        // Filter by name if provided
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
    
        // Fetch paginated results
        $categories = $query->paginate(10);
    
        // Fetch parent categories for the filter (only if level is greater than 1)
        $parentCategories = $level > 0 ? Category::where('level', $level - 1)->get() : [];
    
        return view('admin.store.level', compact('categories', 'level', 'cats1', 'parentCategories'));
    }
    


   
    
    public function getChildCategories($parentId)
    {
        $pubs = Pub::where('zone', 2)->get();
        $mainCats = Category::where('parent_id', null)->get();
        
        // Get the parent category
        $parentCategory = Category::findOrFail($parentId);
        
        // Retrieve child categories
        $cats = Category::where('parent_id', $parentId)->paginate(20);
    
        // Check if $cats is empty or if the level is 2
        if ($cats->isEmpty() || $parentCategory->level == 1) {
            return redirect()->route('category.products', $parentId);
        }
    
        // Get breadcrumb path
        $breadcrumb = $parentCategory->getBreadcrumbPath();
        $products = Product::orderBy('valeur')->take(12)->get();
        // Pass breadcrumb to the view
        return view('store.subcategories', compact('mainCats', 'cats', 'pubs', 'breadcrumb','products'));
    }

    public function getChildCategoriesJson($parentId)
{
    $cats = Category::where('parent_id', $parentId)->get();

    if ($cats->isEmpty()) {
        return response()->json([]);
    }

    return response()->json($cats);
}


}

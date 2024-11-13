<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Brand::query();
    
        // Apply the name filter if provided
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        }
    
        // Get the filtered results
        $cats = $query->get();
    
        return view('admin.store.brands', compact('cats'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('picture')) {
            $imageName = $request->file('picture')->getClientOriginalName();
            $image = $request->file('picture')->storeAs('./Brands',$imageName,'pictures');
            Brand::create([
                'name' => $request->name,
                'picture' => $imageName // This will be null if no file was uploaded
            ]);
           
            return redirect()->route('brands.all');
        }
    
        
     
      return redirect()->route('brands.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.store.editBrand', compact('brand')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Check if a new picture file has been uploaded
    if ($request->hasFile('picture')) {
        // Get the original name of the uploaded file
        $imageName = $request->file('picture')->getClientOriginalName();
        
        // Store the file in the 'Brands' directory with the original name
        $image = $request->file('picture')->storeAs('./Brands', $imageName, 'pictures');

        // Update the brand's picture
        $brand->picture = $imageName;
    }

    // Update the brand's name
    $brand->name = $request->name;
    
    // Save the updated brand
    $brand->save();

    // Redirect to the 'brands.all' route with a success message
    return redirect()->route('brands.all')->with('success', 'Brand updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
{
    $ids = $request->input('ids');
    Log::info('Request to delete categories received.', ['ids' => $ids]);

    $categories = Brand::whereIn('id', $ids)->get();

    foreach ($categories as $category) {
        $imagePath = 'Brand/' . $category->picture;
        Log::info('Processing category.', ['id' => $category->id, 'imagePath' => $imagePath]);

        // Delete the file from the 'pictures' disk
        if (Storage::disk('pictures')->exists($imagePath)) {
            Storage::disk('pictures')->delete($imagePath);
            Log::info('Deleted picture from pictures disk.', ['imagePath' => $imagePath]);
        } else {
            Log::warning('Picture not found on pictures disk.', ['imagePath' => $imagePath]);
        }

        // Delete the file from the default disk (e.g., 'public')
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
            Log::info('Deleted picture from default disk.', ['imagePath' => $imagePath]);
        } else {
            Log::warning('Picture not found on default disk.', ['imagePath' => $imagePath]);
        }

        // Delete the record from the database
        $category->delete();
        Log::info('Deleted category from database.', ['id' => $category->id]);
    }

    Log::info('Successfully deleted categories and their pictures.', ['ids' => $ids]);
    return response()->json(['message' => 'Successfully deleted categories and their pictures.']);
}
}

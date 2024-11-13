<?php

namespace App\Http\Controllers;

use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        $subCats = SubCategory::all();
        $subSubCats = SubSubCategory::all();
        return view('admin.store.subSubCategories', compact('subCats', 'cats', 'subSubCats'));
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
        $iconName = '';
        if ($request->hasFile('icon')) {
            $iconName = $request->file('icon')->getClientOriginalName();
            $icon = $request->file('icon')->storeAs('./Category/Icons',$iconName,'pictures');
        }
        SubSubCategory::create([
            'icon'=> $iconName,
            'name' => $request->name,
            'sub_category_id' => $request->subCategory // This will be null if no file was uploaded
        ]);
        return redirect()->route('subsubcategories.all');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubSubCategory $subSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSubCategory $subSubCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSubCategory $subSubCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids');
        $SubSubCategory = SubSubCategory::whereIn('id', $ids)->delete();
        return response()->json(['message' => 'Successfully deleted categories and their pictures.']);
        
    }
}

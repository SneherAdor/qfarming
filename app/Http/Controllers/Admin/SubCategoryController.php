<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\SubCategory\SubCategoryStoreRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\SubCategory\SubCategoryUpdateRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::latest()->get();

        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryStoreRequest $request)
    {
        /* create sub-category */
        $subcategory = SubCategory::create([
            'name' => $request->subcategory,
            'slug' => str_slug($request->subcategory),
            'category_id' => $request->category,
        ]);
        /* cheack and showing toastr message */
        if($subcategory){
            Toastr::success('Sub-Category Successfully Added', 'Success');
            return redirect()->route('admin.sub-category.index');
        }
        abort(404);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryUpdateRequest $request, SubCategory $subCategory)
    {
        /* update sub-category */
        $resultSubCategory = $subCategory->update([
            
            'category_id'  =>   $request->category,
            'name'         =>   $request->subcategory,
            'slug'         =>   str_slug($request->subcategory),
        ]);

        /* cheack and showing toastr message */
        if($resultSubCategory){
            Toastr::success('Sub-Category Successfully Updated', 'Success');
            return redirect()->route('admin.sub-category.index');
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        Toastr::success('Sub-Category Successfully Deleted', 'Success');
        return redirect()->route('admin.sub-category.index');
    }
}

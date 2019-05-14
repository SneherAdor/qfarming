<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.category.index', compact('categories'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        /* category created */
        $category = Category::create([
            'name' => $request->category,
            'slug' => str_slug($request->category),
        ]);
        
        if($category) {
            Toastr::success('Category Successfully Inserted', 'Success');
            return redirect()->route('admin.category.index');
        }
        abort(404);
       
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
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        /* update category */
        $resultCategory = $category->update([
            'name'  => $request->category,
            'slug'  => str_slug($request->category),
        ]);

        /* check and toastr message */
        if($resultCategory) {
            Toastr::success('Category Successfully Updated', 'Success');
            return redirect()->route('admin.category.index');
        }
        abort(404);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Toastr::success('Category Successfully Deleted', 'Success');
        return redirect()->route('admin.category.index');
    }
}

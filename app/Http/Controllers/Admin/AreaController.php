<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Area\AreaStoreRequest;
use App\Http\Requests\Area\AreaUpdateRequest;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $areas = Area::latest()->get();

        return view('admin.area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaStoreRequest $request)
    {
        //  store area
        $area = Area::create([
            'name'  => $request->area,
            'slug'  => str_slug($request->slug)
        ]);

        
        // check area and toast message
        if($area)
        {
            Toastr::success('Area Successfully Inserted', 'Success');
            return redirect()->route('admin.area.index');
        }
        abort(404);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('admin.area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaUpdateRequest $request, $id)
    {
        /* update Area */
        $area = Area::findOrFail($id);
        $resutArea = $area->update([
            'name' => $request->area,
            'slug' => str_slug($request->area),
        ]);

        //check and toast message
        if($resutArea){
            Toastr::success('Area Successfully Updated', 'Success');
            return redirect()->route('admin.area.index');
        }
        abort(404);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::findOrFail($id)->delete();
        Toastr::success('Area Successfully Deleted', 'Success');
        return redirect()->route('admin.area.index');
    }
}

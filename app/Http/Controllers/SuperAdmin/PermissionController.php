<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Http\Requests\SuperAdmin\Permission\PermissionStoreRequest;
use App\Http\Requests\SuperAdmin\Permission\PermissionUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('superadmin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        //  store Permission name
        $permission = Permission::create([
            'name'  => $request->permission
        ]);

        
        // check Permission and toast message
        if($permission)
        {
            Toastr::success('Permission Successfully Inserted', 'Success');
            return redirect()->route('super-admin.permission.index');
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
        $permission = Permission::findOrFail($id);
        return view('superadmin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        /* update Permission name */
        $permission = Permission::findOrFail($id);
        $resultPermission = $permission->update([
            'name' => $request->permission
        ]);

        //check Permission and toast message
        if($resultPermission){
            Toastr::success('Permission Successfully Updated', 'Success');
            return redirect()->route('super-admin.permission.index');
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
        Permission::findOrFail($id)->delete();
        Toastr::success('Permission Successfully Deleted', 'Success');
        return redirect()->route('super-admin.permission.index');
    }
}

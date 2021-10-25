<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Branch;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\User\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        return view('admin.user.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        /* Insert User */
        $user = User::create([
            'branch_id'        =>      $request->branch,
            'name'             =>      $request->user,
            'username'         =>      $request->username,
            'phone1'           =>      $request->phone1,
            'phone2'           =>      $request->phone2,
            'email'            =>      $request->email,
            'password'         =>      bcrypt($request->password),
            'address'          =>      $request->address,
            'starting_date'    =>      Carbon::parse($request->starting_date)->format('Y-m-d H:i'),
            'ending_date'      =>      Carbon::parse($request->ending_date)->format('Y-m-d H:i'),
            'status'           =>      'active',
        ]);
        /* Check famer insertion  and Toastr */
        if($user){
            Toastr::success('User Inserted Successfully', 'Success');
            return redirect()->route('admin.user.index');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

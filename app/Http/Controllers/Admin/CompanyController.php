<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->get();
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {

        $company = Company::create([
            'name'                  => $request->company,
            'slug'                  => str_slug($request->company),
            'representative_name'   => $request->representative_name,
            'phone1'                => $request->phone1,
            'phone2'                => $request->phone2,
            'email'                 => $request->email,
            'address'               => $request->address,
            'opening_balance'       => $request->opening_balance,
            'starting_date'         => Carbon::parse($request->starting_date)->format('Y-m-d H:i'),
            'ending_date'           => Carbon::parse($request->ending_date)->format('Y-m-d H:i')
        ]);
        /* cheack and showing toastr message */
        if($company){
            Toastr::success('Company Successfully Added', 'Success');
            return redirect()->route('admin.company.index');
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
        $company = Company::findOrFail($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $Resultcompany = $company->update([
            'name'                  => $request->company,
            'slug'                  => str_slug($request->company),
            'representative_name'   => $request->representative_name,
            'phone1'                => $request->phone1,
            'phone2'                => $request->phone2,
            'email'                 => $request->email,
            'address'               => $request->address,
            'opening_balance'       => $request->opening_balance,
            'starting_date'         => Carbon::parse($request->starting_date)->format('Y-m-d H:i'),
            'ending_date'           => Carbon::parse($request->ending_date)->format('Y-m-d H:i')
        ]);
        /* cheack and showing toastr message */
        if($Resultcompany){
            Toastr::success('Company Successfully Update', 'Success');
            return redirect()->route('admin.company.index');
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
        Company::findOrFail($id)->delete();
        Toastr::success('Company Successfully Deleted', 'Success');
        return redirect()->route('admin.company.index');
    }
}

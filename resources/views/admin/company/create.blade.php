<?php
    use Carbon\Carbon;
?>
@extends('template.app')

@section('title', 'Create - Company')

@push('css')
   <link href="{{ asset('admin/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }} " rel="stylesheet" media="screen">
@endpush

@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head text-white " style="background-color:#3FCC7E;">
                    <header>Company</header>
                </div>
                <div class="card-body " id="bar-parent">
                    <form method="post" action="{{ route('admin.company.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="simpleFormEmail">Company Name</label>
                            <input type="text" name="company" class="form-control" id="simpleFormEmail" placeholder="Enter Company name">
                        </div>
                        <div class="form-group">
                            <label for="simpleFormEmail">Representative Name</label>
                            <input type="text" name="representative_name" class="form-control" id="simpleFormEmail" placeholder="Enter Representative Name">
                        </div>
                        <div class="form-group">
                            <label for="simpleFormEmail">Phone </label>
                            <input type="number" name="phone1" class="form-control" id="simpleFormEmail" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="simpleFormEmail">Alternative Phone</label>
                            <input type="number" name="phone2" class="form-control" id="simpleFormEmail" placeholder="Enter Alternative Phone">
                        </div>
                        <div class="form-group">
                            <label for="simpleFormEmail">Email</label>
                            <input type="email" name="email" class="form-control" id="simpleFormEmail" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="simpleFormEmail">Address</label>
                            <input type="textarea" name="address" class="form-control" id="simpleFormEmail" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="simpleFormEmail">Opening Balance</label>
                            <input type="number" name="opening_balance" class="form-control" id="simpleFormEmail" placeholder="Enter Opening Balance">
                        </div>
                        <div class="form-group row">
                                            <label class="col-md-4 control-label">Starting Date</label>
                                            <div class="input-group date form_datetime col-md-8" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-m-d H:i" data-link-field="dtp_input2">
                                                <input class="form-control" size="16" type="text" value="" name="starting_date">
                                                <span class="input-group-addon"><span class="fa fa-remove"></span></span>
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input2" value="" />
                                            <br/>
                                        </div>


                        <div class="form-group row">
                                            <label class="col-md-4 control-label">Ending Date</label>
                                            <div class="input-group date form_datetime col-md-8" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-m-d H:i" data-link-field="dtp_input1">
                                                <input class="form-control" size="16" type="text" value="" name="ending_date">
                                                <span class="input-group-addon"><span class="fa fa-remove"></span></span>
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" value="" />
                                            <br/>
                                        </div>
                        
                        <a class="btn deepPink-bgcolor m-t-15 waves-effect" href="{{ route('admin.company.index') }}">BACK</a>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
   <!-- data time -->
    <script src="{{ asset('admin/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"  charset="UTF-8"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js') }}"  charset="UTF-8"></script>
@endpush

<?php
    use Carbon\Carbon;
?>
@extends('layouts.app')

@section('title', 'Create - Category')

@push('css')
   
@endpush

@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head">
                    <header>Category</header>
                </div>
                <div class="card-body " id="bar-parent">
                    <form method="post" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="simpleFormEmail">Catagory Name</label>
                            <input type="text" name="category" class="form-control" id="simpleFormEmail" placeholder="Enter category name">
                        </div>
                        
                        <a class="btn deepPink-bgcolor m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush

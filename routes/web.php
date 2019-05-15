<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::group(['as'=>'admin.', 'prefix' => 'admin', 'namespace'=>'Admin'], function () {

    Route::resource('area', 'AreaController');
    Route::resource('category', 'CategoryController');
});



/*For checking errors page  START*/

Route::get('401', function (){ return view('errors.401'); });
Route::get('403', function (){ return view('errors.403'); });
Route::get('404', function (){ return view('errors.404'); });
Route::get('500', function (){ return view('errors.500'); });

/*For checking errors page  END*/

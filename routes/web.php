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

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function(){
	Route::get('home', 'Admin\AdminController@home');
	Route::resource('admin', 'Admin\AdminController');
	Route::get('user-management', 'Admin\AdminController@userManagement')->name('admin.user-management');
	Route::get('customer', 'Admin\AdminController@customer')->name('admin.customer');
	Route::get('blacklists', 'Admin\AdminController@blacklists')->name('admin.blacklists');
});

Route::group(['middleware' => ['auth']], function(){
	Route::get('index', 'Customer\CustomerController@index');
});
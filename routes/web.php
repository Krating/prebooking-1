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

Route::get('/test', function () {
	return view('email.bookingdetail');
});

Route::get('/', function () {
    return Auth::check() ? Auth::user()->role_id == '1' ? view('admin.index') : redirect()->route('products.index') : view('welcome'); 
});

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function(){

	Route::resource('admin', 'Admin\AdminController');
	Route::get('user-management/admin', 'Admin\AdminController@userManagement')->name('user-management.admin');
	Route::get('user-management/customer', 'Admin\AdminController@customer')->name('user-management.customer');
	Route::get('blacklists', 'Admin\AdminController@blacklists')->name('admin.blacklists');

	Route::resource('product', 'Admin\Product\ProductController');
	Route::get('openbooking/{id}', 'Admin\Product\ProductController@openbooking')->name('product.openbooking');
	Route::get('closebooking/{id}', 'Admin\Product\ProductController@closebooking')->name('product.closebooking');

	Route::resource('category', 'Admin\Product\CategoryController');

	Route::resource('promotion', 'Admin\Product\PromotionController');

	Route::resource('payment', 'Admin\PaymentController');
	Route::get('payment/approve/{id}/{booking}', 'Admin\PaymentController@approve')->name('payment.approve');

	Route::resource('booking', 'Admin\BookingController');
	Route::get('booking/approve/{id}', 'Admin\BookingController@edit')->name('booking.approve');

	Route::post('product/search_code', 'SearchController@searchProduct')->name('search-product');
	Route::post('booking/search_code', 'SearchController@searchBooking')->name('search-booking');
	Route::post('payment/search_code', 'SearchController@searchPayment')->name('search-payment');

});

Route::group(['middleware' => ['auth']], function(){

	Route::resource('products', 'Customer\CustomerController');
	Route::get('products', 'Customer\CustomerController@index')->name('products.index');
	Route::get('customer/{id}/edit', 'Customer\CustomerController@edit')->name('customer.edit');
	Route::get('profile', 'Customer\CustomerController@profile')->name('customer.profile');
	Route::get('coupons', 'Customer\CustomerController@coupon')->name('customer.coupon');

	Route::resource('myorder', 'Customer\BookingController');
	Route::get('myorder/create/{id}', 'Customer\BookingController@create')->name('myorder.create');

	Route::get('payment/create/{id}', 'Customer\PaymentController@create')->name('customer.payment.create');
	Route::post('payment/store', 'Customer\PaymentController@store')->name('customer.payment.store');

	Route::post('products/search_code', 'SearchController@search')->name('search-autocomplete');
	Route::post('myorder/search_code', 'SearchController@searchMyorder')->name('search-myorder');

	Route::post('/add-to-cart/{id}', 'Customer\BookingController@addToCart')->name('booking.addtocart');
	Route::get('/remove/{id}', 'Customer\BookingController@removeItem')->name('booking.removeitem');

	// Route::get('mail', function(){
	// 	return view('email.mail');
	// });
});
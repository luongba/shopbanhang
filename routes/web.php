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
// frontend
Route::get('/', 'HomeController@index' )->name('home');

// backend

Route::get('/admin', 'AdminController@index' );
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('/logout', 'AdminController@logout')->name('admin.logout');

//Category

Route::resource('/dashboard/category','CategoryController');
Route::get('/danh-muc-san-pham/{id}', 'CategoryController@hienThiCategory')->name('category.show');

//Brand
Route::resource('/dashboard/brand','BrandController');
Route::get('/thuong-hieu-san-pham/{id}','BrandController@hienThiBrand')->name('brand.show');
//Product
Route::resource('/dashboard/product','ProductController');
Route::get('/chi-tiet-san-pham/{id}','ProductController@detail')->name('product.detail');


//Cart

Route::resource('/cart','CartController');
Route::get('/show-cart','CartController@index');
Route::get('/delete-to-cart/{id}','CartController@destroy');
Route::get('/update-cart','CartController@update_cart');

//checkout 

Route::get('/login', 'CheckoutController@login')->name('check.login');
Route::post('/register', 'CheckoutController@register')->name('check.register');
Route::get('/checkout', 'CheckoutController@checkout');



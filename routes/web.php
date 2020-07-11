<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@home')->name('home');

Route::get('/home', 'HomeController@index');
//Auth Routes
Auth::routes();
Auth::routes(['verify' => true]);
//FrontPage Routes
Route::get('/filter-category', 'HomeController@filterCategory')->name('filterCategory');
Route::get('category/{category}', 'CategoriesController@category')->name('category');
Route::get('/filter-sub-category', 'CategoriesController@filterSubCategory')->name('filterCategory');
Route::get('/filter-product', 'SubCategoriesController@filterProduct')->name('filterProduct');
Route::get('sub-category/{subcategory}', 'SubCategoriesController@subCategory')->name('subcategory');
Route::get('product/{name}', 'ProductsController@singleView')->name('singleProduct');

//User Routes
Route::get('signup', 'CustomerController@signup')->name('registerUser');
Route::post('signin', 'CustomerController@signin')->name('signin');
Route::get('my-account', 'CustomerController@myAccount')->name('myAccount');
Route::post('update-profile', 'CustomerController@updateProfile')->name('updateProfile');
Route::post('update-address', 'CustomerController@updateAddress')->name('updateAddress');
Route::get('my-order/{order}', 'CustomerController@myOrder')->name('myOrder');
//cart routes
Route::get('cart', 'CartController@cart')->name('cart');
Route::get('remove-cart', 'CartController@removeCart')->name('removeCart');
Route::get('update-cart', 'CartController@updateCart')->name('updateCart');
Route::get('get-cart', 'CartController@getCart');
Route::get('add-to-cart', 'CartController@addToCart');
//wishlist routes
Route::get('add-wishlist/{product}', 'CustomerController@addToWishList');
Route::get('remove-wishlist/{product}', 'CustomerController@removeFromWishList');
Route::get('wishlist', 'CustomerController@wishList')->name('wishlist');
//checkout routes
Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('checkout', 'CheckoutController@checkoutSubmit')->name('checkoutSubmit');

//Admin Routes
Route::get('sync-category', 'CategoriesController@sync')->name('syncCategory')->middleware('is_admin');
Route::resource('settings', 'SettingsController')->middleware('is_admin');
Route::get('change-password', 'SettingsController@changePassword')->name('changePassword')->middleware('is_admin');
Route::get('add-admin', 'SettingsController@addAdmin')->name('addAdmin')->middleware('is_admin');
Route::post('add-admin', 'SettingsController@insertAdmin')->name('insertAdmin')->middleware('is_admin');
Route::get('delete-admin/{user}', 'SettingsController@deleteAdmin')->name('deleteAdmin')->middleware('is_admin');
Route::get('admins', 'SettingsController@adminList')->name('adminList')->middleware('is_admin');
Route::get('users', 'SettingsController@userList')->name('userList')->middleware('is_admin');
//user-data
Route::get('user-data', 'SettingsController@userData')->name('userData')->middleware('is_admin');

Route::post('update-password-admin', 'SettingsController@updatePassword')->name('updatePasswordAdmin')->middleware('is_admin');
Route::resource('categories', 'CategoriesController')->middleware('is_admin');
Route::resource('sub-categories', 'SubCategoriesController')->middleware('is_admin');
Route::resource('products', 'ProductsController')->middleware('is_admin');
Route::get('sync-product', 'ProductsController@sync')->name('syncProduct')->middleware('is_admin');
Route::get('orders', 'OrderController@orderList')->name('orderList')->middleware('is_admin');
Route::get('order-data', 'OrderController@orderDataTable')->middleware('is_admin');
Route::get('edit-order/{order}', 'OrderController@editOrder')->name('editOrder')->middleware('is_admin');
Route::get('print-order/{order}', 'OrderController@printOrder')->name('printOrder')->middleware('is_admin');
Route::post('update-order/{order}', 'OrderController@updateOrder')->name('updateOrder')->middleware('is_admin');
Route::get('update-order-status/{order}/{status}', 'OrderController@updateOrderStatus')->name('updateOrderStatus')->middleware('is_admin');
//updateOrderPickup
Route::post('update-order-pickup/{order}', 'OrderController@updateOrderPickup')->name('updateOrderPickup')->middleware('is_admin');
Route::get('delete-order/{order}', 'OrderController@deleteOrder')->name('deleteOrder')->middleware('is_admin');
Route::get('view-order/{order}', 'OrderController@viewOrder')->middleware('is_admin');
Route::get('delete-orderline/{orderLine}', 'OrderController@deleteOrderLine')->name('deleteOrderLine')->middleware('is_admin');
Route::get('edit-orderline/{orderLine}', 'OrderController@updateOrderLine')->name('updateOrderLine')->middleware('is_admin');

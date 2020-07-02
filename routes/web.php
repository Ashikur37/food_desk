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
Route::get('product/{name}', 'ProductsController@singleView');

//User Routes
Route::get('signup', 'CustomerController@signup');
Route::post('signin', 'CustomerController@signin')->name('signin');
Route::get('my-account', 'CustomerController@myAccount');
//cart routes
Route::get('cart', 'CartController@cart')->name('cart');
Route::get('remove-cart', 'CartController@removeCart')->name('removeCart');
Route::get('add-to-cart', 'CartController@addToCart');
//wishlist routes
Route::get('add-wishlist/{product}', 'CustomerController@addToWishList');
Route::get('remove-wishlist/{product}', 'CustomerController@removeFromWishList');
Route::get('wishlist', 'CustomerController@wishList')->name('wishlist');
//checkout routes
Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('checkout', 'CheckoutController@checkoutSubmit')->name('checkoutSubmit');

//Admin Routes
Route::get('sync-category', 'CategoriesController@sync');
Route::resource('settings', 'SettingsController');
Route::resource('categories', 'CategoriesController');
Route::resource('sub-categories', 'SubCategoriesController');
Route::resource('products', 'ProductsController');
Route::get('sync-product', 'ProductsController@sync');
Route::get('orders', 'OrderController@orderList');
Route::get('order-data', 'OrderController@orderDataTable');

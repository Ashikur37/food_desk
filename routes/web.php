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

Route::get('/', 'HomeController@home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/filter-category', 'HomeController@filterCategory')->name('filterCategory');
Route::get('category/{category}', 'CategoriesController@category')->name('category');
Route::get('/filter-sub-category', 'CategoriesController@filterSubCategory')->name('filterCategory');
Route::get('/filter-product', 'SubCategoriesController@filterProduct')->name('filterProduct');
Route::get('sync-category', 'CategoriesController@sync');
Route::resource('settings', 'SettingsController');
Route::resource('categories', 'CategoriesController');

Route::resource('sub-categories', 'SubCategoriesController');
Route::get('sub-category/{subcategory}', 'SubCategoriesController@subCategory')->name('subcategory');
Route::resource('products', 'ProductsController');
Route::get('sync-product', 'ProductsController@sync');
Route::get('signup', 'CustomerController@signup');


Route::resource('posts', 'PostsController');

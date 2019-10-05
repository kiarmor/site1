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
Route::get('/', 'PagesController@home' );

Route::get('/news', 'PagesController@news');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');

Route::resource('/posts', 'PostController');

Route::resource('/products', 'ProductController');

Route::resource('/categories', 'CategoriesController');

Route::get('/admin', 'PagesController@admin')->middleware('admin');

Route::resource('/admin/edit_products', 'PagesController');

Route::resource('/admin/edit_posts', 'PostController');

Route::get('search', 'SearchController@show');

Route::get('/create_products', 'PagesController@showForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

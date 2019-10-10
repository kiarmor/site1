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

Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@show');

Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/{id}', 'CategoriesController@show');

Route::group(['middleware' => 'admin'], function (){

    Route::get('/admin', 'PagesController@admin');

    Route::get('/create_products', 'PagesController@createProductForm');
    Route::get('/products/{id}/edit', 'ProductController@edit');
    Route::patch('/products/{id}', 'ProductController@update');
    Route::post('/products', 'ProductController@store');
    Route::delete('/products/{id}', 'ProductController@destroy');

    Route::get('/create_category', 'PagesController@createCategoryForm');
    Route::get('/categories/{id}/edit', 'CategoriesController@edit');
    Route::patch('/categories/{id}', 'CategoriesController@update');
    Route::post('/categories', 'CategoriesController@store');
    Route::delete('/categories/{id}', 'CategoriesController@destroy');
});

Route::get('search', 'SearchController@show');

Route::get('add_to_cart/{id}', [
    'uses' => 'ProductController@addToCart',
    'as' => 'product.addToCart'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

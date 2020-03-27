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


Route::get('/', 'HomeController@index')->name('index');
Route::get('about', function () { return view('about'); })->name('about');
Route::get('news', 'NewsController@index')->name('news');
Route::post('search', 'HomeController@search')->name('search');

Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/category', 'Admin\CategoryController@category')->name('category');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
    Route::get('/category/remove/{id}', 'Admin\CategoryController@remove')->name('category.remove');
    Route::get('/category/add', 'Admin\CategoryController@add')->name('category.add');
    Route::post('/category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::get('/products', 'Admin\ProductsController@products')->name('products');
    Route::get('/products/edit/{id}', 'Admin\ProductsController@edit')->name('products.edit');
    Route::get('/products/remove/{id}', 'Admin\ProductsController@remove')->name('products.remove');
    Route::get('/products/add', 'Admin\ProductsController@add')->name('products.add');
    Route::post('/products/create', 'Admin\ProductsController@create')->name('products.create');
    Route::get('/orders', 'Admin\OrdersController@orders')->name('orders');
    Route::get('/changemail', 'Admin\AdminController@changemail')->name('changemail');
});


Auth::routes();
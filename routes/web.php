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
Route::get('news', 'Front\NewsController@index')->name('news');
Route::post('search', 'HomeController@search')->name('search');
Route::get('/single-news/{id}', 'Front\NewsController@singleNews')->name('single-news');


Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/category', 'Admin\CategoryController@category')->name('category');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
    Route::get('/category/remove/{id}', 'Admin\CategoryController@remove')->name('category.remove');
    Route::get('/category/add', 'Admin\CategoryController@add')->name('category.add');
    Route::post('/category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::post('/category/update', 'Admin\CategoryController@update')->name('category.update');
    Route::get('/products', 'Admin\ProductsController@products')->name('products');
    Route::get('/products/edit/{id}', 'Admin\ProductsController@edit')->name('products.edit');
    Route::post('/products/update', 'Admin\ProductsController@update')->name('products.update');
    Route::get('/products/remove/{id}', 'Admin\ProductsController@remove')->name('products.remove');
    Route::get('/products/add', 'Admin\ProductsController@add')->name('products.add');
    Route::post('/products/create', 'Admin\ProductsController@create')->name('products.create');
    Route::get('/orders', 'Admin\OrdersController@allOrders')->name('orders');
    Route::get('/orders/edit/{id}', 'Admin\OrdersController@edit')->name('orders.edit');
    Route::post('/orders/update', 'Admin\OrdersController@update')->name('orders.update');
    Route::get('/orders/remove/{id}', 'Admin\OrdersController@remove')->name('orders.remove');
    Route::get('/changemail', 'Admin\AdminController@changemail')->name('changemail');
});

Route::group(['middleware' => ['web']], function() {

    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('orders', 'Front\OrdersController@myOrders')->name('my-orders');
    Route::get('/product/{id}', 'Front\ProductController@showProduct')->name('product');
    Route::post('/order/create', 'Front\OrdersController@orderCreate')->name('order.create');
});

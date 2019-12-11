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

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/product/{id}', 'FrontEndController@singleProduct')->name('single.product');
Route::post('/cart/add', 'ShoppingController@addToCart')->name('cart.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingController@cartDestroy')->name('cart.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('products', 'Admin\ProductsController');
});

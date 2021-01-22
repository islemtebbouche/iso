<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return redirect()->route('store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store', 'HomeController@store')->name('store');
Route::get('/products', 'productController@index')->name('product.index');
Route::get('/viewdetails', 'productController@index')->name('view.index');
Route::get('/addToCart/{product}', 'productController@addToCart')->name('cart.add');
Route::get('/addTowishlist/{product}', 'productController@addTowishlist')->name('wishlist.add');
Route::get('/shopping-cart', 'productController@showcart')->name('cart.show');
Route::get('/checkout/{amount}', 'ProductController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge', 'ProductController@charge')->name('cart.charge');
Route::get('/orders', 'OrderController@index')->name('order.index');
Route::delete('/products/{product}', 'ProductController@destroy')->name('product.remove');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::post('/products', 'productController@search');


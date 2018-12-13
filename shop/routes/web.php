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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('welcome');
});


Route::get('/categories/{category}', 'CategoryController@index')->name('categories.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop', 'ProductController@index')->name('shop.index');
Route::get('/product/{product}', 'ProductController@show')->name('product.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::put('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@delete')->name('cart.delete');
Route::post('/search-with-algolia', 'ProductController@search_with_algolia')->name('search.algolia');
Route::get('/search', 'ProductController@search')->name('search');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::post('/checkout/payment', 'CheckoutController@payment')->name('checkout.payment');

Route::post('/cart/watch-later/{product}', 'CartController@watch_later')->name('cart.watchlater');

Route::post('/watch-later/move-to-cart/{product}', 'WatchlaterController@move_to_cart')->name('watchlater.move-to-cart');

Route::get('/products/watch-later', 'WatchlaterController@index')->name('watchlater.index');

Route::delete('/watch-later/{product}', 'WatchlaterController@delete')->name('watchlater.delete');
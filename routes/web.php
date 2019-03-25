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

Auth::routes();

route::group(['namespace' => 'home'], function(){

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
	Route::get('/contact', 'ContactController@index')->name('contact');
	
	route::group(['namespace' => 'categories'], function(){
		Route::get('/', 'CategoryController@index')->name('home');
		
	});

	route::group(['namespace' => 'products'], function(){
		
		Route::get('/{id}/product-detail', 'ProductController@show')->name('product-detail');
		Route::get('/shop', 'ShopController@index')->name('shop');
	});

	route::group(['namespace' => 'cart'], function(){
		
		Route::get('/{id}/add-cart','CartController@addcart')->name('add-cart');
		Route::get('/cart','CartController@index')->name('cart-index');
		Route::get('/cart/{id}/delete-product-cart','CartController@destroy')->name('delete-product-cart');
		Route::get('/cart/{id}/increase-products','CartController@increase')->name('increase-products');
		Route::get('/cart/{id}/reduce-products','CartController@reduction')->name('reduce-products');

		Route::get('/checkout', 'OrderController@index')->name('checkout');
	});
		
});

route::group(['namespace' => 'Auth'], function(){

	Route::get('/account', 'AccountController@index')->name('account');
});

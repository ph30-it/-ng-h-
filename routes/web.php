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
/*Route::group(['namespace'=>'Admin'],function(){


	Route::group(['namespace'=>'product'],function(){

		Route::get('/product','AdminController@index')->name('index-product');
		Route::get('/product/{id}','AdminController@delete')->name('delete-product');
		Route::get('/create-product', 'AdminController@create')->name('create-product');
		Route::post('/product', 'AdminController@store')->name('addproduct');
		Route::get('/product/{id}/edit', 'AdminController@edit')->name('edit-product');
		Route::put('/product/{id}', 'AdminController@update')->name('update-product');

	});
	Route::group(['namespace'=>'category'],function(){

		Route::get('/category','CategoryController@index')->name('index-category');
		Route::get('/category/{id}','CategoryController@destroy')->name('delete-category');
		Route::get('/create-category', 'CategoryController@create')->name('create-category');
		Route::post('/category', 'CategoryController@store')->name('addcategory');
		Route::get('/category/{id}/edit', 'CategoryController@edit')->name('edit-category');
		Route::put('/category/{id}', 'CategoryController@update')->name('update-category');

	});
	Route::group(['namespace'=>'image'], function(){

		Route::get('/image','ImageController@index')->name('index-image');
		Route::get('/image/{id}','ImageController@destroy')->name('delete-image');
		Route::get('/create-image', 'ImageController@create')->name('create-image');
		Route::post('/image', 'ImageController@store')->name('addimage');
		Route::get('/image/{id}/edit', 'ImageController@edit')->name('edit-image');
		Route::put('/image/{id}', 'ImageController@update')->name('update-image');

	});

	Route::group(['namespace'=>'user'], function(){

		Route::get('/user','UserController@index')->name('index-user');
		Route::get('/user/{id}','UserController@destroy')->name('delete-user');
		Route::get('/create-users', 'UserController@create')->name('create-user');
		Route::post('/user', 'UserController@store')->name('adduser');
		Route::get('/user/{id}/edit', 'UserController@edit')->name('edit-user');
		Route::put('/user/{id}', 'UserController@update')->name('update-user');
	});

	Route::group(['namespace'=>'role'],function(){

		Route::get('/role','RoleController@index')->name('index-role');
		Route::get('/role/{id}','RoleController@destroy')->name('delete-role');
		Route::get('/create-role', 'RoleController@create')->name('create-role');
		Route::post('/role', 'RoleController@store')->name('addrole');
		Route::get('/role/{id}/edit', 'RoleController@edit')->name('edit-role');
		Route::put('/role/{id}', 'RoleController@update')->name('update-role');


	});

	Route::group(['namespace'=>'comment'], function(){
	   
		Route::get('/comment','CommentControlller@index')->name('index-comment');
		Route::get('/comment/{id}','CommentControlller@destroy')->name('delete-comment');
		Route::get('/create-comment', 'CommentControlller@create')->name('create-comment');
		Route::post('/comment', 'CommentControlller@store')->name('addcomment');
		Route::get('/comment/{id}/edit', 'CommentControlller@edit')->name('edit-comment');
		Route::put('/comment/{id}', 'CommentControlller@update')->name('update-comment');

	});

	Route::group(['namespace'=>'order'],function(){


		Route::get('/order','OrderController@index')->name('index-order');
		Route::get('/order/{id}','OrderController@destroy')->name('delete-order');
		Route::get('/create-order', 'OrderController@create')->name('create-order');
		Route::post('/order', 'OrderController@store')->name('addorder');
		Route::get('/order/{id}/edit', 'OrderController@edit')->name('edit-order');
		Route::put('/order/{id}', 'OrderController@update')->name('update-order');
	});
});*/

route::get('/quick',function(){
	return view('home.products.quick-view');
});

route::group(['namespace' => 'home'], function(){

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/search','HomeController@search')->name('search');
	Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
	Route::get('/contact', 'ContactController@index')->name('contact');
	Route::post('/send-email', 'ContactController@senmai')->name('send-email');
	
	route::group(['namespace' => 'categories'], function(){
		Route::get('/', 'CategoryController@index')->name('home');
		
	});

	route::group(['namespace' => 'products'], function(){
		Route::get('/shop', 'ProductController@index')->name('shop');
		Route::get('/{id}/product-detail', 'ProductController@show')->name('product-detail');
		Route::post('/comment','ProductController@comment')->name('comment');
		
	});

	route::group(['namespace' => 'cart'], function(){
		
		Route::get('/{id}/add-cart','CartController@addcart')->name('add-cart');
		Route::get('/cart','CartController@index')->name('cart-index');
		Route::get('/cart/{id}/delete-product-cart','CartController@destroy')->name('delete-product-cart');
		Route::get('/cart/{id}/increase-products','CartController@increase')->name('increase-products');
		Route::get('/cart/{id}/reduce-products','CartController@reduction')->name('reduce-products');

		Route::get('/checkout', 'OrderController@index')->name('checkout');
		Route::post('payment','OrderController@postpayment')->name('postpayment');
	});
		
});
route::group(['namespace' => 'Auth'], function(){

	Route::get('/account', 'LoginController@index')->name('account');
});




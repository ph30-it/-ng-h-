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

Route::group(['namespace'=>'Admin'],function(){
Route::get('/admin', function () {
    return view('admin.home');
});

Route::group(['namespace'=>'product'],function(){

Route::get('/admin/product','AdminController@index')->name('index-product');
Route::get('/admin/product/{id}/show','AdminController@showproduct')->name('show-product');
Route::get('/admin/product/{id}','AdminController@delete')->name('delete-product');
Route::get('/admin/create-product', 'AdminController@create')->name('create-product');
Route::post('/admin/product', 'AdminController@store')->name('addproduct');
Route::get('/admin/product/{id}/edit', 'AdminController@edit')->name('edit-product');
Route::put('/admin/product/{id}', 'AdminController@update')->name('update-product');

});
Route::group(['namespace'=>'category'],function(){

Route::get('/admin/category','CategoryController@index')->name('index-category');
Route::get('/admin/category/{id}','CategoryController@destroy')->name('delete-category');
Route::get('/admin/create-category', 'CategoryController@create')->name('create-category');
Route::post('/admin/category', 'CategoryController@store')->name('addcategory');
Route::get('/admin/category/{id}/edit', 'CategoryController@edit')->name('edit-category');
Route::put('/admin/category/{id}', 'CategoryController@update')->name('update-category');

});
Route::group(['namespace'=>'image'], function(){

Route::get('/admin/image','ImageController@index')->name('index-image');
Route::get('/admin/image/{id}','ImageController@destroy')->name('delete-image');
Route::get('/admin/create-image', 'ImageController@create')->name('create-image');
Route::post('/admin/image', 'ImageController@store')->name('addimage');
Route::get('/admin/image/{id}/edit', 'ImageController@edit')->name('edit-image');
Route::put('/admin/image/{id}', 'ImageController@update')->name('update-image');


});

Route::group(['namespace'=>'user'], function(){

Route::get('/admin/user','UserController@index')->name('index-user');
Route::get('/admin/user/{id}','UserController@destroy')->name('delete-user');
Route::get('/admin/create-users', 'UserController@create')->name('create-user');
Route::post('/admin/user', 'UserController@store')->name('adduser');
Route::get('/admin/user/{id}/edit', 'UserController@edit')->name('edit-user');
Route::put('/admin/user/{id}', 'UserController@update')->name('update-user');
});

Route::group(['namespace'=>'role'],function(){

Route::get('/admin/role','RoleController@index')->name('index-role');
Route::get('/admin/role/{id}','RoleController@destroy')->name('delete-role');
Route::get('/admin/create-role', 'RoleController@create')->name('create-role');
Route::post('/admin/role', 'RoleController@store')->name('addrole');
Route::get('/admin/role/{id}/edit', 'RoleController@edit')->name('edit-role');
Route::put('/admin/role/{id}', 'RoleController@update')->name('update-role');


});

Route::group(['namespace'=>'comment'], function(){
   
Route::get('/admin/comment','CommentControlller@index')->name('index-comment');
Route::get('/admin/comment/{id}','CommentControlller@destroy')->name('delete-comment');
Route::get('/admin/create-comment', 'CommentControlller@create')->name('create-comment');
Route::post('/admin/comment', 'CommentControlller@store')->name('addcomment');
Route::get('/admin/comment/{id}/edit', 'CommentControlller@edit')->name('edit-comment');
Route::put('/admin/comment/{id}', 'CommentControlller@update')->name('update-comment');

});

Route::group(['namespace'=>'order'],function(){


Route::get('/admin/order','OrderController@index')->name('index-order');
Route::get('/admin/order/{id}','OrderController@destroy')->name('delete-order');
Route::get('/admin/create-order', 'OrderController@create')->name('create-order');
Route::post('/admin/order', 'OrderController@store')->name('addorder');
Route::get('/admin/order/{id}/edit', 'OrderController@edit')->name('edit-order');
Route::put('/admin/order/{id}', 'OrderController@update')->name('update-order');


});
});














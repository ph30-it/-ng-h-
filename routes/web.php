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
Route::post('/role', 'RoleController@store')->name('adduser');
Route::get('/role/{id}/edit', 'RoleController@edit')->name('edit-role');
Route::put('/role/{id}', 'RoleController@update')->name('update-role');


});
});














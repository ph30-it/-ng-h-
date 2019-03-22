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



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show','AdminController@index')->name('index');
Route::get('/show/{id}','AdminController@delete')->name('delete');
Route::get('/create-product', 'AdminController@create')->name('create-product');
Route::post('/addproduct', 'AdminController@store')->name('addproduct');
Route::get('/show/{id}/edit', 'AdminController@edit')->name('edit-product');

Route::put('/update/{id}', 'AdminController@update')->name('update-product');


});
Route::group(['namespace'=>'category'],function(){
	Route::get('/category','CategoryController@index')->name('index-category');
Route::get('/','CategoryController@destroy')->name('delete');
Route::get('/create-category', 'CategoryController@create')->name('create-category');
Route::post('/show', 'CategoryController@store')->name('store-category');
Route::get('/', 'CategoryController@edit')->name('edit-category');

Route::put('/show/{id}', 'CategoryController@update')->name('update-category');






});
});














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

// Route::get('/', function () {
//     return view('backend.dashboard.dashboard');
// });

Route::prefix('/category')->namespace('backend')->group(function(){
	Route::get('/index','CategoryController@index')->name('category.index');
	Route::post('/store','CategoryController@store')->name('category.store');
	Route::get('/list','CategoryController@list')->name('category.list');
	Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
	Route::post('/update/{id}','CategoryController@update')->name('category.update');
	Route::post('/delete/{id}','CategoryController@destroy')->name('category.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');

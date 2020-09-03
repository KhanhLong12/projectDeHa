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
Route::middleware(['auth'])->group(function(){
	Route::prefix('/category')->namespace('backend')->group(function(){
		Route::get('/index','CategoryController@index')->name('category.index')->middleware('checkRole:view-category');
		Route::post('/store','CategoryController@store')->name('category.store')->middleware('checkRole:create-category');
		Route::get('/list','CategoryController@list')->name('category.list');
		Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
		Route::post('/update/{id}','CategoryController@update')->name('category.update')->middleware('checkRole:edit-category');
		Route::post('/delete/{id}','CategoryController@destroy')->name('category.delete')->middleware('checkRole:delete-category');
		Route::get('/search', 'CategoryController@fcsearch')->name('category.search');
		Route::get('/category', 'CategoryController@getParentCategory')->name('category.category');
		Route::get('/category_edit', 'CategoryController@getParentCategoryEdit')->name('category.category_edit');
	});

	Route::prefix('/post')->namespace('backend')->group(function(){
		Route::get('/index','PostController@index')->name('post.index');
		Route::get('/list','PostController@list')->name('post.list');
		Route::post('/store','PostController@store')->name('post.store');
		Route::post('/delete/{id}','PostController@destroy')->name('post.delete');
		Route::get('/edit/{id}','PostController@edit')->name('post.edit');
		Route::post('/update/{id}','PostController@update')->name('post.update');
	});

	Route::prefix('/author')->namespace('backend')->group(function(){
		Route::get('/index','AuthorController@index')->name('author.index');
		Route::get('/list','AuthorController@list')->name('author.list');
		Route::post('/store','AuthorController@store')->name('author.store');
		Route::get('/edit/{id}','AuthorController@edit')->name('author.edit');
		Route::post('/update/{id}','AuthorController@update')->name('author.update');
		Route::post('/delete/{id}','AuthorController@destroy')->name('author.delete');
		Route::get('/search', 'AuthorController@fcsearch')->name('author.search');
		Route::get('/detail/{id}', 'AuthorController@show')->name('author.detail');
	});
});





Auth::routes();

Route::get('/', 'HomeController@index')->name('dashboard');

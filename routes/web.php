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
Route::middleware(['auth'])->group(function () {
    Route::prefix('/category')->namespace('backend')->group(function () {
        Route::get('/', 'CategoryController@index')->name('categories.index')->middleware('permission:view-category');
        Route::post('/store',
            'CategoryController@store')->name('categories.store')->middleware('permission:create-category');
        Route::get('/list', 'CategoryController@list')->name('categories.list');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}',
            'CategoryController@update')->name('categories.update')->middleware('permission:edit-category');
        Route::post('/delete/{id}',
            'CategoryController@destroy')->name('categories.delete')->middleware('permission:delete-category');
        Route::get('/parent-category', 'CategoryController@getParentCategory')->name('categories.parent_category');
        Route::get('/category-edit', 'CategoryController@getParentCategoryEdit')->name('categories.category_edit');
    });

    Route::prefix('/post')->namespace('backend')->group(function () {
        Route::get('/', 'PostController@index')->name('posts.index')->middleware('permission:view-post');
        Route::get('/list', 'PostController@list')->name('posts.list');
        Route::post('/store', 'PostController@store')->name('posts.store')->middleware('permission:create-post');
        Route::post('/delete/{id}', 'PostController@destroy')->name('posts.delete')->middleware('permission:delete-post');
        Route::get('/edit/{id}', 'PostController@edit')->name('posts.edit')->middleware('permission:edit-post');
        Route::post('/update/{id}', 'PostController@update')->name('posts.update');
    });

    Route::prefix('/authors')->namespace('backend')->group(function () {
        Route::get('/', 'AuthorController@index')->name('authors.index')->middleware('permission:view-author');
        Route::get('/list', 'AuthorController@list')->name('authors.list');
        Route::post('/store', 'AuthorController@store')->name('authors.store')->middleware('permission:view-author');
        Route::get('/{id}/edit', 'AuthorController@edit')->name('authors.edit')->middleware('permission:view-author');
        Route::post('/update/{id}', 'AuthorController@update')->name('authors.update');
        Route::post('/delete/{id}', 'AuthorController@destroy')->name('authors.delete')->middleware('permission:view-author');
        Route::get('/detail/{id}', 'AuthorController@show')->name('authors.detail');
    });

    Route::prefix('/users')->middleware('role')->namespace('backend')->group(function () {
        Route::get('/', 'UserController@index')->name('users.index')->middleware('permission:view-user');
        Route::get('/list', 'UserController@list')->name('users.list');
        Route::post('/store', 'UserController@store')->name('users.store')->middleware('permission:create-user');
        Route::get('/edit/{id}', 'UserController@edit')->name('users.edit')->middleware('permission:edit-user');
        Route::post('/update/{id}', 'UserController@update')->name('users.update');
        Route::post('/delete/{id}', 'UserController@destroy')->name('users.delete')->middleware('permission:delete-user');
    });

    Route::prefix('/roles')->namespace('backend')->group(function () {
        Route::get('/', 'RoleController@index')->name('roles.index');
        Route::get('/list', 'RoleController@list')->name('roles.list');
        Route::post('/store', 'RoleController@store')->name('roles.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('roles.edit');
        Route::post('/update/{id}', 'RoleController@update')->name('roles.update');
        Route::post('/delete/{id}', 'RoleController@destroy')->name('roles.delete');
    });
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('dashboard');

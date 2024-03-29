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

Route::get('home', 'CategoryController@index')
    ->name('categories.index');

Route::get('categories/{category}', 'CategoryController@show')
    ->name('categories.show');

Route::get('posts/create', 'PostController@create')
    ->name('posts.create');

Route::post('posts', 'PostController@store')
    ->name('posts.store');

Route::get('posts/{id}', 'PostController@show')
    ->name('posts.show');

Route::get('users/{id}', 'UserController@show')
    ->name('users.show');

Route::delete('posts/{id}', 'PostController@destroy')
    ->name('posts.destroy');

Auth::routes();

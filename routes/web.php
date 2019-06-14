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

Auth::routes();

Route::get('/post/create', 'PostController@create')->name('post.create');

Route::get('/post/{post}', 'PostController@index')->name('post.show');

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');

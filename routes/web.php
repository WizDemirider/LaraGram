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

Route::get('/', 'PostController@index')->name('post.index');
Route::post('/post', 'PostController@store')->name('post.save');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');

Route::post('/follow/{user}', 'FollowController@store')->name('follow.save');
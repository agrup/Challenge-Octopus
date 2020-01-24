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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@index' );
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create');

Route::get('/post/{post}', 'PostController@show');
Route::delete('/posts/{post}', 'PostController@destroy');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}/update', 'PostController@update');
Route::post('/posts/{post}/publication', 'PublicationController@store');
Route::get('/posts/{post}/like', 'PostController@like');


// Route::get('/test', 'PostController@test');
Route::post('/posts/{post}/like', 'LikeController@store');
Route::get('/posts/{post}/like', 'LikeController@index');

Route::get('/admin', 'AdminController@index')->middleware('checkRoles:AdminRole');



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

//Route::get('/', function () {return view('welcome');});
Route::get('/', 'HomeController@index');

// Chat
Route::get('chat', 'ChatController@index')->middleware('auth');
Route::post('chat/store', 'ChatController@new')->middleware('auth');
// Admin
Route::get('admin', 'AdminController@index')->middleware('auth');
Route::get('admin/users', 'AdminController@users')->middleware('auth');
Route::get('admin/users/edit/{id}', 'AdminController@edit')->middleware('auth');
Route::get('admin/users/edit/store', 'AdminController@save')->middleware('auth');
Route::get('admin/users/ban', 'AdminController@usersBan')->middleware('auth');
Route::get('admin/gallery', 'AdminController@gallery')->middleware('auth');

// Gallery 
Route::get('gallery', 'GalleryController@index');


Auth::routes();


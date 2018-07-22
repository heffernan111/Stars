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
// Chat Page
Route::get('chat', 'ChatController@index')->middleware('auth');
Route::post('chat/store', 'ChatController@new')->middleware('auth');
// Admin Routes
Route::get('admin', 'AdminController@index')->middleware('auth');


Auth::routes();


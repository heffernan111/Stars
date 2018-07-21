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

Route::get('/', function () {return view('myHome');})->middleware('auth');
//Friends Routes
Route::get('/friends', 'FriendsController@index')->middleware('auth');
// Task Routes
Route::get('/tasks', 'TasksController@index')->middleware('auth');
Route::post('/tasks/delete', 'TasksController@delete')->middleware('auth');
Route::get('/tasks/edit/{task_id}', 'TasksController@edit')->middleware('auth');
Route::get('/tasks/new', 'TasksController@create')->middleware('auth');
Route::post('/tasks/store', 'TasksController@store')->middleware('auth');

Auth::routes();

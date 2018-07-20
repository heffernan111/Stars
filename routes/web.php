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
Route::get('/friends', 'FriendsController@index')->middleware('auth');

Route::get('/tasks', 'TasksController@index')->middleware('auth');
Route::post('/tasks/delete', 'TasksController@delete')->middleware('auth');
Route::get('/tasks/edit/{task_id}', 'TasksController@edit')->middleware('auth');



Auth::routes();

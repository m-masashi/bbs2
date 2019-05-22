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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PostsController@index')->name('top');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);
Route::resource('comments', 'CommentsController', ['only' => ['store']]);

Route::get('thread', 'ThreadsController@index')->name('thread');
Route::resource('thread', 'ThreadsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

Route::get('addthread', 'AddthreadController@index')->name('addthread');
Route::resource('addthread', 'AddthreadController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

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

Route::resource('posts', 'PostController', ['only' => ['index', 'show']]);
Route::resource('users', 'UserController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
  Route::resource('posts', 'PostController');

  Route::get('/posts/{post}/submit', 'PostController@submit')->name('posts.submit');
  Route::get('/posts/{post}/publish', 'PostController@publish')->name('posts.publish');
  Route::get('/posts/{post}/reject', 'PostController@reject')->name('posts.reject');
});

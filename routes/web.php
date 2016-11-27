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

Route::get('/', 'HomeController@index');

Route::resource('posts', 'PostController', ['only' => ['index', 'show']]);

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth']], function() {
  Route::resource('users', 'UserController');
  Route::resource('posts', 'PostController');
  Route::get('/posts/{post}/submit', 'PostController@submit')->name('posts.submit');
  Route::get('/posts/{post}/publish', 'PostController@publish')->name('posts.publish');
  Route::get('/posts/{post}/reject', 'PostController@reject')->name('posts.reject');
});

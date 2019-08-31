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

// react route
Route::get('/', 'landingController@landing')->name('Bem-vindo');
Route::get('/login', 'landingController@login')->name('login');
Route::get('/register', 'landingController@register')->name('register');
Route::get('/home', 'HomeController@index')->name('home');



Route::post('/post','PostController@createPost');
Route::get('/analise', 'HomeController@analise');
Route::get('/feed', 'feedController@getFeed');
Route::get('/feed/{roomId}', 'feedController@getFeedByRoom');

Route::post('/comment/{postId}', 'CommentController@createComment');
Route::get('/comment/{postId}', 'CommentController@getComments');

Route::get('/user/all', 'UserController@allUsers');
Route::get('/user/{id}', 'UserController@oneUser');
Route::get('/user/edit/{id}', 'UserController@editUser')->name('editUser');
Route::post('/user/update/{id}', 'UserController@updateUser');
Route::get('/user/delete/{id}', 'UserController@deleteUser')->name('deleteUser');
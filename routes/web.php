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
Route::get('/post','PostController@getPost');
Route::get('/feed', 'feedController@getFeed');

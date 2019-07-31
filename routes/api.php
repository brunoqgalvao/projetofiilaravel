<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload/image', 'Api\UploadController@uploadImage');

Route::get('/comment/{postId}','Api\commentController@getComments');
// rota teste
Route::get('/comment/teste', 'Api\commentController@teste');

Route::get('/usuarios','api\UsuariosController@pegarTodos');
Route::get('/usuarios/{id}','api\UsuariosController@pegarUm');
Route::post('/usuarios','api\UsuariosController@criaUm');
Route::delete('/usuarios/{id}','api\UsuariosController@deletarUm');
Route::put('/usuarios/{id}','api\UsuariosController@updateUm');




// Route::middleware('auth:api')->get('/comment/{postId}', "ApiCommentController@getAll");
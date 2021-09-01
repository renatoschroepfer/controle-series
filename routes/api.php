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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/criar-series', 'Api\SerieController@store');
Route::get('/listar-series', 'Api\SerieController@index');
Route::delete('/deletar-series/{id}', 'Api\SerieController@destroy');
Route::get('/listar-series/{id}', 'Api\SerieController@show');
Route::patch('/atualizar-series/{id}', 'Api\SerieController@update');
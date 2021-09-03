<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix('series')->group(function () {
  Route::post('/criar-series', 'Api\SerieController@store');
  Route::get('/listar-series', 'Api\SerieController@index');
  Route::delete('/deletar-series/{id}', 'Api\SerieController@destroy');
  Route::get('/listar-series/{id}', 'Api\SerieController@show');
  Route::patch('/atualizar-series/{id}', 'Api\SerieController@update');
  Route::get('/series/{serieId}/temporadas', 'Api\TemporadaController@index');
  Route::get('/temporadas/{temporada}/episodios', 'Api\EpisodioController@index');
  Route::post('/temporada/{temporada}/episodios/assistir', 'Api\EpisodioController@assitir');
});
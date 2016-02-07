<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return 'teste';
});

Route::post('/oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function () {

    Route::resource('client', 'ClientController', ['expect' => ['create', 'edit']]);


    Route::resource('projeto', 'ProjetoController', ['expect' => ['create', 'edit']]);

    Route::group(['prefix' => 'projeto'], function() {
        Route::get('{id}/notas', 'ProjetoNotasController@index');
        Route::post('{id}/notas', 'ProjetoNotasController@store');
        Route::get('{id}/notas/{idNota}', 'ProjetoNotasController@show');
        Route::put('{id}/notas/{idNota}', 'ProjetoNotasController@update');
        Route::delete('{id}/notas/{idNota}', 'ProjetoNotasController@destroy');
       
        
        Route::post('{id}/file', 'ProjetoArquivosController@store');
    });
});





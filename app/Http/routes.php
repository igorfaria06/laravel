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
    return view('welcome');
});
Route::get('/client', 'ClientController@index');
Route::post('/client', 'ClientController@store');
Route::get('/client/{id}', 'ClientController@show');
Route::post('/client/{id}', 'ClientController@update');
Route::delete('/client/{id}', 'ClientController@destroy');

Route::get('/projeto/{id}/notas', 'ProjetoNotasController@index');
Route::post('/projeto/{id}/notas', 'ProjetoNotasController@store');
Route::get('/projeto/{id}/notas/{idNota}', 'ProjetoNotasController@show');
Route::put('/projeto/{id}/notas/{idNota}', 'ProjetoNotasController@update');
Route::delete('/projeto/{id}/notas/{idNota}', 'ProjetoNotasController@destroy');


Route::get('/projeto', 'ProjetoController@index');
Route::post('/projeto', 'ProjetoController@store');
Route::get('/projeto/{id}', 'ProjetoController@show');
Route::post('/projeto/{id}', 'ProjetoController@update');
Route::delete('/projeto/{id}', 'ProjetoController@destroy');


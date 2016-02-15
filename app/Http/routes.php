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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('admin.index');
});

Route::get('admin', function () {
    return view('admin.index');
});

Route::get('admin/contas', function () {
    return view('admin.contas.index');
});

//
//Route::group(['prefix' => 'admin'], function () {
//    return 'qjkwhkhjasd';
//});



Route::group(['middleware' => 'oauth'], function () {

    Route::post('/login', 'UserController@login');

    Route::get('/user', 'UserController@index');
    Route::post('/user', 'UserController@store');
    Route::get('/user/{id}', 'UserController@show');
    Route::post('/user/{id}', 'UserController@update');
    Route::delete('/user/{id}', 'UserController@destroy');

    Route::get('/banco', 'BancoController@index');
    Route::post('/banco', 'BancoController@store');
    Route::get('/banco/{id}', 'BancoController@show');
    Route::post('/banco/{id}', 'BancoController@update');
    Route::delete('/banco/{id}', 'BancoController@destroy');

    Route::get('/conta', 'ContaBancariaController@index');
    Route::post('/conta', 'ContaBancariaController@store');
    Route::get('/conta/{id}', 'ContaBancariaController@show');
    Route::post('/conta/{id}', 'ContaBancariaController@update');
    Route::delete('/conta/{id}', 'ContaBancariaController@destroy');
});
Route::post('/oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});
//
//Route::group(['middleware' => 'oauth'], function () {
//
//    Route::resource('client', 'ClientController', ['expect' => ['create', 'edit']]);
//
//
//    Route::resource('projeto', 'ProjetoController', ['expect' => ['create', 'edit']]);
//
//    Route::group(['prefix' => 'projeto'], function() {
//        Route::get('{id}/notas', 'ProjetoNotasController@index');
//        Route::post('{id}/notas', 'ProjetoNotasController@store');
//        Route::get('{id}/notas/{idNota}', 'ProjetoNotasController@show');
//        Route::put('{id}/notas/{idNota}', 'ProjetoNotasController@update');
//        Route::delete('{id}/notas/{idNota}', 'ProjetoNotasController@destroy');
//       
//        
//        Route::post('{id}/file', 'ProjetoArquivosController@store');
//    });
//});
//  Route::group(['prefix' => 'projeto'], function() {
//        Route::get('{id}/notas', 'ProjetoNotasController@index');
//        Route::post('{id}/notas', 'ProjetoNotasController@store');
//        Route::get('{id}/notas/{idNota}', 'ProjetoNotasController@show');
//        Route::put('{id}/notas/{idNota}', 'ProjetoNotasController@update');
//        Route::delete('{id}/notas/{idNota}', 'ProjetoNotasController@destroy');
//       
//        
//        Route::post('{id}/file', 'ProjetoArquivosController@store');
//    });
//});





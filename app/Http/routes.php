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
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register','Auth\AuthController@postRegister');




// Registration routes...

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('admin.index');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

        Route::get('/', function () {
            return view('admin.index');
        });

        Route::group(['prefix' => 'conta'], function() {
            Route::get('/', ['as' => 'conta.listar', 'uses' => 'UserBancoContaController@listarConta']);
            Route::get('/adicionar', ['as' => 'conta.criar', 'uses' => 'UserBancoContaController@criarConta']);
            Route::post('/adicionar', ['as' => 'conta.criar', 'uses' => 'UserBancoContaController@inserirConta']);
            Route::get('/{id}', ['as' => 'conta.editar', 'uses' => 'UserBancoContaController@editarConta']);
            Route::post('/atualizar/{id}', ['as' => 'conta.atualizar', 'uses' => 'UserBancoContaController@atualizarConta']);
            Route::get('/deletar/{id}', ['as' => 'conta.deletar', 'uses' => 'UserBancoContaController@deletarConta']);
            Route::post('/pagar', ['as' => 'conta.despesa.pagar', 'uses' => 'UserBancoContaController@pagarDespesa']);
        });

        Route::group(['prefix' => 'despesa'], function() {
            Route::get('/', ['as' => 'conta.despesa.listar', 'uses' => 'UserContaDespesaController@listarDespesa']);
            Route::get('/adicionar', ['as' => 'conta.despesa.criar', 'uses' => 'UserContaDespesaController@criarDespesa']);
            Route::post('/adicionar', ['as' => 'conta.despesa.criar', 'uses' => 'UserContaDespesaController@inserirDespesa']);
            Route::get('/{id}', ['as' => 'conta.despesa.editar', 'uses' => 'UserContaDespesaController@editarDespesa']);
            Route::post('/atualizar/{id}', ['as' => 'conta.despesa.atualizar', 'uses' => 'UserContaDespesaController@atualizarDespesa']);
            Route::get('/deletar/{id}', ['as' => 'conta.despesa.deletar', 'uses' => 'UserContaDespesaController@deletarDespesa']);

        });


        Route::group(['prefix' => 'receita'], function() {
            Route::get('/', ['as' => 'conta.receita.listar', 'uses' => 'UserContaReceitaController@listarReceita']);
            Route::get('/adicionar', ['as' => 'conta.receita.criar', 'uses' => 'UserContaReceitaController@criarReceita']);
            Route::post('/adicionar', ['as' => 'conta.receita.criar', 'uses' => 'UserContaReceitaController@inserirReceita']);
            Route::get('/{id}', ['as' => 'conta.receita.editar', 'uses' => 'UserContaReceitaController@editarReceita']);
            Route::post('/atualizar/{id}', ['as' => 'conta.receita.atualizar', 'uses' => 'UserContaReceitaController@atualizarReceita']);
            Route::get('/deletar/{id}', ['as' => 'conta.receita.deletar', 'uses' => 'UserContaReceitaController@deletarReceita']);
        });
    });
});

//Route::post('/oauth/access_token', function () {
//    return Response::json(Authorizer::issueAccessToken());
//});
//Route::group(['middleware' => 'oauth'], function () {
//
//Route::get('/aaa', function () {
//    $a = Authorizer::getResourceOwnerId();
//    $user = finLaravel\Entities\User::find($a);
//    return $user->pegarKey();
//});
//
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

    Route::get('/conta', 'UserBancoContaController@index');
    Route::post('/conta', 'UserBancoContaController@store');
    Route::get('/conta/{id}', 'UserBancoContaController@show');
    Route::post('/conta/{id}', 'UserBancoContaController@update');
    Route::delete('/conta/{id}', 'UserBancoContaController@destroy');
});

Route::post('/oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});
//
//Route::group(['middleware' => 'oauth'], function () {
//
//    Route::resource('client', 'ClientController', ['expect' => ['create', 'edit']]);
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
//        Route::post('{id}/file', 'ProjetoArquivosController@store');
//    });
//});





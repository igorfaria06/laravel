<?php

namespace finLaravel\Http\Controllers;

use Illuminate\Http\Request;
use finLaravel\Http\Controllers\Controller;
use finLaravel\Repositories\UserBancoContaRepository;
use finLaravel\Services\UserBancoContaService;
use finLaravel\Entities\Banco;

class UserBancoContaController extends Controller {
    /*
     * @var ClientRepository
     */

    private $repository;

    /*
     * @var ClientService
     */
    private $service;

    public function __construct(UserBancoContaRepository $repository, UserBancoContaService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarConta() {
        $contas = $this->repository->paginate(2);
        return view('admin/conta/list', compact('contas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function criarConta(Request $request) {
        $bancos = Banco::lists('nome', 'id');
        return view('admin/conta/adicionar', compact('bancos'));
    }

    public function inserirConta(Request $request) {
        return $this->service->create($request->except('_token'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarConta($id) {
        $conta = $this->repository->find($id);
        $this->formatarData($conta->data_pagamento);
        $bancos = Banco::lists('nome', 'id');
        return view('admin/conta/editar', compact('conta', 'bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizarConta(Request $request, $id) {
        return $this->service->update($request->except('_token'), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletarConta($id) {
        $this->repository->find($id)->delete();
        return redirect('admin/conta');
    }

    public function pagarDespesa(Request $request) {
        return $this->service->pagar($request->except('_token'));
    }  

}

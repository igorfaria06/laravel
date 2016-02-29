<?php

namespace finLaravel\Http\Controllers;

use Illuminate\Http\Request;
use finLaravel\Http\Controllers\Controller;
use finLaravel\Repositories\UserContaDespesaRepository;
use finLaravel\Services\UserContaDespesaService;
use finLaravel\Services\UserBancoContaService;
use finLaravel\Entities\UserBancoConta;

class UserContaDespesaController extends Controller {
    /*
     * @var ClientRepository
     */

    private $repository;

    /*
     * @var ClientService
     */
    private $service;

    public function __construct(UserContaDespesaRepository $repository, UserContaDespesaService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarDespesa() {
        $despesas = $this->repository->paginate(2);
        return view('admin/despesa/list', compact('despesas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function criarDespesa(Request $request) {
        $contas = UserBancoConta::lists('nome', 'id');
        return view('admin/despesa/adicionar', compact('contas'));
    }

    public function inserirDespesa(Request $request) {
        return $this->service->create($request->except('_token'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarDespesa($id) {
        $despesa = $this->repository->find($id);
        $contas = UserBancoConta::lists('nome', 'id');
        return view('admin/despesa/editar', compact('despesa', 'contas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizarDespesa(Request $request, $id) {
        return $this->service->update($request->except('_token'), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletarDespesa($id) {
        $this->repository->find($id)->delete();
        return redirect('admin/despesa');
    }

}

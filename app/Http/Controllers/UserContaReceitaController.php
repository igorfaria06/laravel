<?php

namespace finLaravel\Http\Controllers;

use Illuminate\Http\Request;
use finLaravel\Http\Controllers\Controller;
use finLaravel\Repositories\UserContaReceitaRepository;
use finLaravel\Services\UserContaReceitaService;
use finLaravel\Entities\UserBancoConta;

class UserContaReceitaController extends Controller {
    /*
     * @var ClientRepository
     */

    private $repository;

    /*
     * @var ClientService
     */
    private $service;

    public function __construct(UserContaReceitaRepository $repository, UserContaReceitaService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarReceita() {
        $receitas = $this->repository->paginate(2);
        return view('admin/receita/list', compact('receitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function criarReceita(Request $request) {
        $contas = UserBancoConta::all('id', 'nome', 'banco_id', 'conta', 'saldo');
        return view('admin/receita/adicionar', compact('contas'));
    }

    public function inserirReceita(Request $request) {
        return $this->service->create($request->except('_token'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarReceita($id) {
        $receita = $this->repository->find($id);
        $contas = UserBancoConta::lists('nome', 'id');
        
        return view('admin/receita/editar', compact('contas', 'receita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizarReceita(Request $request, $id) {
        return $this->service->update($request->except('_token'), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletarReceita($id) {
        $this->repository->find($id)->delete();
        return redirect('admin/receita');
    }

}

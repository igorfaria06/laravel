<?php

namespace cursoLaravel\Http\Controllers;

use Illuminate\Http\Request;
use cursoLaravel\Http\Controllers\Controller;
use cursoLaravel\Repositories\ProjetoRepository;
use cursoLaravel\Services\ProjetoService;

class ProjetoController extends Controller {
    /*
     * @var ClientRepository
     */

    private $repository;

    /*
     * @var ClientService
     */
    private $service;

    public function __construct(ProjetoRepository $repository, ProjetoService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        
        dd($this->checarProjetoMembros($id));
        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idNota) {
        $this->service->update($request->all(), $idNota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->repository->find($id)->delete();
    }

    private function checarProjetoDono($id) {
        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->isOwner($id, $userId);
    }

    private function checarProjetoMembros($id) {
        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->isMember($id, $userId);
    }

}

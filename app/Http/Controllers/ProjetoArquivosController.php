<?php

namespace finLaravel\Http\Controllers;

use Illuminate\Http\Request;
use finLaravel\Http\Controllers\Controller;
use finLaravel\Repositories\ProjetoRepository;
use finLaravel\Services\ProjetoService;


class ProjetoArquivosController extends Controller {
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
                
        $data['arquivo'] = $request->file('file');
        $data['extension'] = $request->file('file')->getClientOriginalExtension();
        $data['name'] = $request->name;
        
        $this->service->createFile($data);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
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

        return $this->repository->hasMember($id, $userId);
    }

    private function checarProjetoPermissao($id) {
        if ($this->checarProjetoDono($id) or $this->checarProjetoMembros($id)):
            return true;
        endif;

        return false;
    }

}

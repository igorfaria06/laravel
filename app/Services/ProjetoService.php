<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace cursoLaravel\Services;

use cursoLaravel\Repositories\ProjetoRepository;
use cursoLaravel\Validators\ProjetoValidator;
use Prettus\Validator\Exceptions\ValidatorException;


/**
 * Description of ClientService
 *
 * @author proativos
 */
class ProjetoService {

    private $repository;
    private $validator;
    
    public function __construct(ProjetoRepository $repository, ProjetoValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data) {
        
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id) {

        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessageBag()
            ];
        }
    }

}

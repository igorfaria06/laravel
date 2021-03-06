<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace finLaravel\Services;

use finLaravel\Repositories\ProjetoNotasRepository;
use finLaravel\Validators\ProjetoNotasValidator;
use Prettus\Validator\Exceptions\ValidatorException;
/**
 * Description of ProjetoNotasService
 *
 * @author proativos
 */
class ProjetoNotasService {
    
    private $repository;
    private $validator;
    
    public function __construct(ProjetoNotasRepository $repository, ProjetoNotasValidator $validator) {
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

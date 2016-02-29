<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace finLaravel\Services;

use finLaravel\Repositories\UserContaDespesaRepository;
use finLaravel\Repositories\UserBancoContaRepository;
use finLaravel\Validators\UserContaDespesaValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use finLaravel\Entities\UserBancoConta;

/**
 * Description of ClientService
 *
 * @author proativos
 */
class UserContaDespesaService {

    private $repository;
    private $validator;
    private $filesystem;
    private $storage;
    protected $contaRepository;


    public function __construct(UserContaDespesaRepository $repository, UserContaDespesaValidator $validator, Filesystem $filesystem, Storage $storage, UserBancoContaRepository $contaRepository) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data) {

        try {
            $this->validator->with($data)->passesOrFail();
            $data['dono_id'] = '1';
            $this->repository->create($data);
            return redirect('/admin/despesa');
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
            $data['dono_id'] = '1';
            $this->repository->update($data, $id);
            return redirect('/admin/despesa');
        } catch (ValidatorException $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessageBag()
            ];
        }
    }

    public function createFile($data) {

        try {
            $this->storage->put($data['name'] . '.' . $data['extension'], $this->filesystem->get($data['arquivo']));
            return true;
        } catch (ValidatorException $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessageBag()
            ];
        }
    }

   
    
}

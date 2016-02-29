<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace finLaravel\Services;

use finLaravel\Repositories\UserBancoContaRepository;
use finLaravel\Validators\UserBancoContaValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use finLaravel\Entities\UserContaDespesa;
use finLaravel\Entities\UserContaReceita;

/**
 * Description of ClientService
 *
 * @author proativos
 */
class UserBancoContaService {

    private $repository;
    private $validator;
    private $filesystem;
    private $storage;

    public function __construct(UserBancoContaRepository $repository, UserBancoContaValidator $validator, Filesystem $filesystem, Storage $storage) {
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
            return redirect('/admin/conta');
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
            return redirect('/admin/conta');
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

    public function pagar(array $data) {

        try {
            $idConta = $data['conta'];
            $idDespesa = $data['despesa_id'];
            $conta = $this->repository->find($idConta);
            $data['saldo'] = $conta->saldo - $data['valor'];
            unset($data['despesa_id'], $data['conta'], $data['valor']);
            $this->validator->with($data)->passesOrFail();
            $despesa = UserContaDespesa::find($idDespesa);
            $despesa['status'] = 1;
            $despesa['conta_id'] = $idConta;
            $despesa['data_pagamento'] = date('Y-m-d H:i');
            $despesa->update();
            $this->repository->update($data, $idConta);
            return redirect('/admin/despesa');
        } catch (ValidatorException $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessageBag()
            ];
        }
    }

}

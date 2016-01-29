<?php

namespace cursoLaravel\Validators;

use Prettus\Validator\LaravelValidator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientValidator
 *
 * @author proativos
 */
class ClientValidator extends LaravelValidator {
    protected $rules = [
    'name' => 'required',
    'responsible' => 'required',
    'email' => 'required|email',
    'phone' => 'required',
    'adress' => 'required',
    'obs' => 'required',
    ];
}

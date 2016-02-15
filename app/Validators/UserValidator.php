<?php

namespace finLaravel\Validators;

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
class UserValidator extends LaravelValidator {
    protected $rules = [
        'nome'=> 'required|min:3|max:60',
        'sexo'=> 'required|min:1|max:1',
        'email'=> 'required|email',
        'password'=> 'required|min:6|max:20',                
    ];
}

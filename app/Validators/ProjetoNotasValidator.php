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
class ProjetoNotasValidator extends LaravelValidator {
    protected $rules = [
    'projeto_id' => 'required',
    'title' => 'required',
    'nota' => 'required',
    
    ];
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace cursoLaravel\Transformers;

use cursoLaravel\Entities\User;
use League\Fractal\TransformerAbstract;

/**
 * Description of ProjetoTransformer
 *
 * @author proativos
 */
class ProjetoMembroTransformer extends TransformerAbstract {

    public function transform(User $membro) {
        return [
            'membro_id' => $membro->id,
        ];
    }

}

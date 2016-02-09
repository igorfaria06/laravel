<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace finLaravel\Transformers;

use finLaravel\Entities\Projeto;
use League\Fractal\TransformerAbstract;

/**
 * Description of ProjetoTransformer
 *
 * @author proativos
 */
class ProjetoTransformer extends TransformerAbstract {
    
    protected $defaultIncludes = ['membro'];

    public function transform(Projeto $projeto) {
        return [

            'projeto_id' => $projeto->id,
            'owner_id' => $projeto->owner_id,
            'client_id' => $projeto->client_id,
            'name' => $projeto->name,
            'description' => $projeto->description,
            'progress' => $projeto->progress,
            'status' => $projeto->status,
        ];
    }

    public function includeMembro(Projeto $projeto){
        
        return $this->collection($projeto->membros, new ProjetoMembroTransformer());
        
    }
}

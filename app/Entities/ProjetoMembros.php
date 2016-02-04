<?php

namespace cursoLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjetoMembros extends Model implements Transformable {

    use TransformableTrait;

    protected $fillable = [
        'projeto_id',
        'membro_id',
        
    ];
      
}

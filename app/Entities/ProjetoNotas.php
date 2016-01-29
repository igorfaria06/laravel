<?php

namespace cursoLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjetoNotas extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'projeto_id',
        'title',
        'nota',
    ];
    
    public function projeto() {
        return $this->belongsTo(Projeto::class);
    }

}

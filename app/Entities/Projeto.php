<?php

namespace finLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Projeto extends Model implements Transformable {

    use TransformableTrait;

    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'
    ];
    
    public function notas() {
        return $this->hasMany(ProjetoNotas::class);
    }

    public function membros() {
        return $this->belongsToMany(User::class, 'projeto_membros', 'projeto_id', 'membro_id');
    }
    public function arquivos() {
        return $this->hasMany(ProjetoArquivos::class);
    }
}

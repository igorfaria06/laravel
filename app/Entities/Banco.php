<?php

namespace finLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Banco extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'pais',
    ];

    protected $table = 'bancos';


    public function contas() {
        return $this->hasMany(UserBancoConta::class, 'id');
    }
    
    
}

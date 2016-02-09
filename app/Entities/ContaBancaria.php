<?php

namespace finLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ContaBancaria extends Model implements Transformable {

    use TransformableTrait;

    protected $table = 'contas_bancarias';
    protected $fillable = [
        'dono_id',
        'banco_id',
        'descricao',
        'conta',
        'senha',
    ];

    public function bancos() {
        return $this->belongsTo(Banco::class, 'banco_id');
    }

    public function dono() {
        return $this->belongsTo(User::class, 'dono_id');
    }

        
}

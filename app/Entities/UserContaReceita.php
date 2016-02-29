<?php

namespace finLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserContaReceita extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_conta_receitas';
    
    protected $fillable = [
        'dono_id',
        'conta_id',
        'nome',
        'valor',
        'status',
        'data_pagamento',
        'data_vencimento',
        'descricao',
    ];

    public function conta() {
        return $this->belongsTo(UserBancoConta::class, 'conta_id');
    }
    
    public function dono() {
        return $this->belongsTo(User::class, 'dono_id');
    }
    
    
}

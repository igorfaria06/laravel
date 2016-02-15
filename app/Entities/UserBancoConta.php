<?php

namespace finLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserBancoConta extends Model implements Transformable {

    use TransformableTrait;

    protected $table = 'user_banco_contas';
    protected $fillable = [
        'dono_id',
        'banco_id',
        'descricao',
        'conta',
        'nome',
        'saldo',
        'senha',
    ];

    public function banco() {
        return $this->belongsTo(Banco::class, 'banco_id');
    }

    public function dono() {
        return $this->belongsTo(User::class, 'dono_id');
    }
    public function despesas() {
        return $this->hasMany(UserContaDespesa::class, 'dono_id');
    }
    public function receitas() {
        return $this->hasMany(UserContaReceita::class, 'dono_id');
    }

        
}

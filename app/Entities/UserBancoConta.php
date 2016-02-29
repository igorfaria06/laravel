<?php

namespace finLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserBancoConta extends Model implements Transformable {

    use TransformableTrait;

    protected $table = 'user_banco_contas';
    protected $fillable = [
        'nome',
        'banco_id',
        'conta',
        'descricao',
        'saldo',
        'dono_id',
    ];

    public function banco() {
        return $this->belongsTo(Banco::class,'banco_id');
    }

    public function dono() {
        return $this->belongsTo(User::class,'dono_id');
    }
    
    public function despesas() {
        return $this->hasMany(UserContaDespesa::class, 'id');
    }
    
    public function receitas() {
        return $this->hasMany(UserContaReceita::class, 'id');
    }   

}

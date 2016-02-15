<?php

namespace finLaravel\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserContaDespesa extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'dono_id',
        'conta_id',
        'nome',
        'valor',
    ];

    public function conta() {
        return $this->belongsTo(UserBancoConta::class);
    }
    
    public function dono() {
        return $this->belongsTo(User::class);
    }
    
    
}

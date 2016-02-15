<?php

namespace finLaravel\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'sexo', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function projetos() {
        return $this->belongsToMany(Projeto::class, 'projeto_membros', 'membro_id', 'projeto_id');
    }
    
    public function contas() {
        return $this->hasMany(UserBancoConta::class, 'dono_id', 'id');
    }
    
      public function despesas() {
        return $this->hasMany(UserContaDespesa::class, 'dono_id', 'id');
    }
    
     public function receitas() {
        return $this->hasMany(UserContaReceita::class, 'dono_id', 'id');
    }
    
}

<?php

namespace finLaravel\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    protected $fillable = [
        'name',
        'responsible',
        'email',
        'adress',
        'phone',
        'obs',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table='users';

    protected $attributes = [
        'status'=>"activo",
        'attemps'=>0,
    ];

    protected $pimaryKey="id";
    
}

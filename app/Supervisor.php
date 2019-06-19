<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{

    protected $table='supervisors';

    protected $attributes = [
        'status'=>"activo",
        'type'=>"SUP",
        'attemps'=>0
    ];

    protected $pimaryKey="id";
    
}

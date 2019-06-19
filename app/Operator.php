<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table='operators';

    protected $attributes = [
        'status'=>"activo",
        'type'=>"OPE",
        'attemps'=>0
    ];

    protected $pimaryKey="id";
}

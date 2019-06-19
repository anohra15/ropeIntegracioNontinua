<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Central extends Model
{
    protected $table='central';

    protected $attributes = [
        'transmissionKW'=>0,
        'associatedCentral'=>0
    ];

    protected $pimaryKey="id";
}

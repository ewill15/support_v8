<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancel extends Model
{
    protected $fillable = [
        'service',
        'mount',
        'ammount',
        'year'
    ];
}

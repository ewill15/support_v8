<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarentine extends Model
{
    protected $fillable = [
        'date',
        'food',
        'type'
    ];
}

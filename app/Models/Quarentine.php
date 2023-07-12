<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarentine extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'food',
        'type'
    ];
}

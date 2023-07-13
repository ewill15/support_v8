<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'page',
        'username',
        'password',
        'hash_password',
        'status',
        'date',
        'description'
    ];
    
}

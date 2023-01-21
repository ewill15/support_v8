<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $table = 'register_web';
    protected $fillable = [
        'username',
        'page',
        'type',
        'password',
        'hash_password',
        'date',
        'description',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    function getLongitudeAttribute()
    {
        return strlen($this->password);
    }
}

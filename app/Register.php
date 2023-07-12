<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
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
        return $this->belongsTo('App/User','user_id');
    }

    function getLongitudeAttribute()
    {
        return strlen($this->password);
    }
}

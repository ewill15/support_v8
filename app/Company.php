<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'type',
        'phone',
        'area',
        'nit',
    ];

    public function bills()
    {
        return $this->hasMany('App\Bill','id');
    }
}

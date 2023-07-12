<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'mobile',            
        'number',
        'bank_id'
    ];

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }
}

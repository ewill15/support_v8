<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'date',
        'description',
        'price',
        'number_week',
        'machine_id'
    ];

    public function machine()
    {
        return $this->belongsTo('App\Machine');
    }
}

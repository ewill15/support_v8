<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'start',
        'end',
        'description',
        'company',
        'resume_id'
    ];

    public function resume(){
        return $this->belongsTo('App\Resume');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}

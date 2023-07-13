<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'word',
        'pronuntiation',
        'meaning',
        'example',
        'lang_id'
    ];

    public function language(){
        return $this->belongsTo(Language::class,'lang_id');
    }
}

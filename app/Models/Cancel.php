<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancel extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'month',
        'ammount',
        'year'
    ];

    public function service(){
        return $this->belongsTo(Language::class);
    }
}

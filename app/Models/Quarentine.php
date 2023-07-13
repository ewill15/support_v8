<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quarentine extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'food',
        'type'
    ];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->date)->format('d-M-Y');
    }
}

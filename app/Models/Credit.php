<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'total',
        'init',
        'monthly_fee',
        'months_to_pay'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}

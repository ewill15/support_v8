<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'credit_id', 
        'user_id',
        'nro_fee',
        'observation'
    ];

    public function credit()
    {
        return $this->belongsTo(Credit::class,'credit_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}

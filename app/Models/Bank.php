<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'city',
        'address',            
        'phone',
        'observation'
    ];

    public function accounts(){
        return $this->hasMany(Account::class);
    }
}

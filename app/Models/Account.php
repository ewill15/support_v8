<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'mobile',            
        'number',
        'bank_id'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }
}

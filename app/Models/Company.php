<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'type',
        'phone',
        'area',
        'nit',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function scopeEdtCompanies($query)
    {
        return $query->whereNull('address')->whereNull('nit');
    }
}

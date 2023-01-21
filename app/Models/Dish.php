<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'picture',
        'description',
        'price',
        'available',
        'restaurant_id'
    ];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }
}

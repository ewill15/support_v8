<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'bills',
        'buy_date',
        'product',
        'price',
        'place'
    ];

    public function bill(){
        return $this->belongsTo(Bill::class,'bill_id');
    }
}
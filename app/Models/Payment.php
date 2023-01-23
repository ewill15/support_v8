<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'month_id',
        'year',
        'amount',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function month()
    {
        return $this->belongsTo(Month::class,'month_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}

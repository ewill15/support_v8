<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'control_code',
        'date',
        'description',
        'price',
        'company_id',
        'user_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->date)->format('d-M-Y');
    }
}

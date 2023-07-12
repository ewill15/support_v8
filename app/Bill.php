<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
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
        return $this->belongsTo('App\Company');
    }

    public function user()
    {
        return $this->belongsTo('App/User','user_id');
    }
}

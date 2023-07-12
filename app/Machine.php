<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{    
    protected $fillable = [
        'motherboard',
        'processor',
        'IP',
        'operative_system',
        'mail_address',
        'office_package',
        'other',
        'owner'
    ];
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'url',
        'page',
        'username',
        'password',
        'hash_password',
        'count_password',
        'status',
        'date',
        'description',
        'last_use'
    ];

    public function getFormattedDateAttribute()
    {
        return $this->updated_at?Carbon::parse($this->updated_at)->format('d-M-Y'):Carbon::parse($this->created_at)->format('d-M-Y');
    }

    public function getCounterPasswordAttribute(){
        return $this->count_password?$this->count_password:'NO';
    }
    
}

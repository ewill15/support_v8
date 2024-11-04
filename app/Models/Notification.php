<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pasanaku_id',
        'date',
        'amount',
        'email',
        'sended',
        'type',
    ];

    public function pasanaku(){
        return $this->belongsTo(Pasanaku::class,'pasanaku_id');
    }
}

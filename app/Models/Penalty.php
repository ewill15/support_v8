<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'amount',
        'pasanaku_id'
    ];

    public function pasanaku(){
        return $this->belongsTo(Pasanaku::class,'pasanaku_id');
    }
}

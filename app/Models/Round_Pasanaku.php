<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round_Pasanaku extends Model
{
    use HasFactory;

    protected $table = 'round_pasanakus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'round_id',
        'pasanaku_id'
    ];

    public function pasanaku(){
        return $this->belongsTo(Pasanaku::class,'pasanaku_id');
    }

    public function round(){
        return $this->belongsTo(Round::class,'round_id');
    }
}

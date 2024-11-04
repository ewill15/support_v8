<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPenalty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable=[
        'user_id',
        'penalty_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function penalty(){
        return $this->belongsTo(Penalty::class,'penalty_id');
    }

    public function total_penalties($query,$user,$pasanaku){ 
        return $query->where('user_id',$user)
            ->where('pasanaku_id',$pasanaku)
            ->count();
    }
}

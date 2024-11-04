<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPasanaku extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable=[
        'user_id',
        'pasanaku_id',
        'turn',
        'delivery_date',
        'week_number'
    ];

    public function scopeTotalParticipants($query, $pasanaku)
    {
        return $query->where('pasanaku_id',$pasanaku)
        // ->whereNull('penalty_amount')
        ;
    }
    public function scopeNextDelivery($query,$pasanaku,$date)
    {
        return $query->where('pasanaku_id',$pasanaku)
            ->whereDate('delivery_date','=',$date);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function pasanaku(){
        return $this->belongsTo(Pasanaku::class,'pasanaku_id');
    }
    public function getFormattedDeliveryAttribute()
    {
        return Carbon::parse($this->delivery_date)->format('d-M-Y');
    }

}

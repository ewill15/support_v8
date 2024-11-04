<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeePasanaku extends Model
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
        'type',
        'round',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function pasanaku(){
        return $this->belongsTo(Pasanaku::class,'pasanaku_id');
    }

    public function typeLegend(){
        return $this->belongsTo(Legend::class,'type');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-M-Y');
    }
}

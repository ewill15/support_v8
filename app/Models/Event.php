<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable=[
        'pasanaku_id',
        'start_date',
        'end_date',
        'fee',
        'description'
    ];

    public function pasanaku(){
        return $this->belongsTo(Pasanaku::class,'pasanaku_id');
    }
    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->format('d-M-Y');
    }
    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->format('d-M-Y');
    }
}

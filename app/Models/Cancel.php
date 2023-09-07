<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cancel extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'month',
        'amount',
        'year'
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function getPeriodAttribute(){
        $date = $this->year.'-'.$this->month.'-10';
        
        return Carbon::createFromFormat('Y-m-d', $date)->format('M - Y');
    }
}

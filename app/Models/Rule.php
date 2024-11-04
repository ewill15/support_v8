<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'pasanaku_id'
    ];

    public function pasanaku(){
        return $this->belongsTo(Pasanaku::class,'pasanaku_id');
    }

    public function scopeByPasanaku($query,$id)
    {
        return $query->where('pasanaku_id',$id);
    }
}

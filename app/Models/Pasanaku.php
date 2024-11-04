<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasanaku extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date_start',
        'date_end',
        'date_next',
        'amount_total',
        'participant_total',
        'description',
        'status',
        'round',
        'year_end'
    ];

    /**********************************************
     * RELATIONSHIP
     **********************************************/
    public function penalties(){
        return $this->hasMany(Penalty::class);
    }
    public function rules(){
        return $this->hasMany(Rule::class);
    }
    public function legends(){
        return $this->hasMany(Rule::class);
    }
    public function fees(){
        return $this->hasMany(FeePasanaku::class);
    }
    public function userPasanakus(){
        return $this->hasMany(UserPasanaku::class);
    }
    public function userPermission(){
        return $this->hasMany(UserPermission::class);
    }

    /**********************************************
     * SCOPES
     **********************************************/

    public function scopePasanakusActive($query)
    {
        return $query->where('status',true);
    }

    /**********************************************
     * ATTRIBUTES
     **********************************************/
    public function getAmountAttribute()
    {
        return ($this->participant_total-1)*$this->amount_total;
    }

    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->date_start)->format('d-M-Y');
    }
    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->date_end)->format('d-M-Y');
    }
    public function getFormattedNextDateAttribute()
    {
        return Carbon::parse($this->date_next)->format('d-M-Y');
    }

    public function getWeekStartDateAttribute()
    {
        $start_year = Carbon::parse($this->date_start)->format('Y');
        $current_year = Carbon::now()->format('Y');
        $week = date("W",strtotime($this->date_start));
        if($start_year < $current_year){
            $week -= 52;
        }

        return $week;
    }
    public function getWeekEndDateAttribute()
    {
        return date('W',strtotime($this->date_end));
    }
    public function getWeekFinalAttribute()
    {   
        if(date("Y",strtotime($this->date_end)) <= date("Y"))     
            $final_week = date('W',strtotime($this->date_end));
        else
            $final_week = 52;

        return $final_week;
    }
    public function getWeekNextDateAttribute()
    {
        return date('W',strtotime($this->date_next));
    }

    public function getHasParticipantsAttribute()
    {
        $participant = UserPasanaku::where('pasanaku_id',$this->id);

        return $participant->count();
    }   
    
    private function getStatusPasanakuAttribute()
    {
        $result = $this->week_final - $this->week_next_date;

        if($result >= 4)
            $result_color = "text-success";
        elseif($result<4 && $result >=1)
            $result_color = "text-warning";
        else
            $result_color = "text-danger";

        return $result_color;
    }

    public function getMessageStatusAttribute()
    {
        if($this->getHasParticipantsAttribute()){
            $color = $this->getStatusPasanakuAttribute();
            if($this->status)
                if(Carbon::parse($this->date_end)->diffInDays(Carbon::now()))
                    $text = 'ACTIVE';
                else 
                    $text ='INACTIVE';
            else
                $text ='INACTIVE';
        }
        else{
            $text = "NO PARTICIPANTS";
            $color = "text-warning";            
        }

        return ["message" => $text, "color" => $color];
    }
}

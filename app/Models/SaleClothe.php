<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleClothe extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'date_sale',
        'description',
        'quantity',
        'price',
        'type',
        'pay_type',
        'week',
        'year'
    ];

    
    /**
     * **********************************************
     * RELATIONSHIPS
     * **********************************************
     */
    /**
     * **********************************************
     * SCOPES
     * **********************************************
     * Income & money
     */
    public function scopeIncomeToday($query,$today)
    {
        return $query->where('type','=',true)
        ->where('pay_type','=',true)
        ->whereDate('date_sale','=',$today)
        ->selectRaw('SUM(price) as total');
    }

    public function scopeIncomeWeek($query,$start,$end,$year)
    {
        return $query->where('type','=',true)
        ->where('pay_type','=',true)
        ->whereBetween('date_sale',[$start, $end])
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(price) as total');
    }
    public function scopeIncomeMonth($query,$month,$year)
    {
        return $query->where('type','=',true)
        ->where('pay_type','=',true)
        ->whereMonth('date_sale',$month)
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(price) as total');
    }
    public function scopeIncomeFull($query)
    {
        return $query->where('type','=',true)
        ->where('pay_type','=',true)
        ->selectRaw('SUM(price) as total');
    }

    /** Income & QR */
    public function scopeIncomeQRToday($query,$today)
    {
        return $query->where('type','=',true)
        ->where('pay_type','=',false)
        ->whereDate('date_sale','=',$today)
        ->selectRaw('SUM(price) as total');
    }

    public function scopeIncomeQRWeek($query,$start,$end,$year)
    {
        return $query->where('type','=',true)
        ->where('pay_type','=',false)
        ->whereBetween('date_sale',[$start, $end])
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(price) as total');
    }
    public function scopeIncomeQRMonth($query,$month,$year)
    {
        return $query->where('type','=',true)
        ->where('pay_type','=',false)
        ->whereMonth('date_sale',$month)
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(price) as total');
    }
    public function scopeIncomeQRFull($query)
    {
        return $query->where('type','=',true)
        ->where('pay_type','=',false)
        ->selectRaw('SUM(price) as total');
    }

    /** Expense & money */
    public function scopeExpenseToday($query,$today)
    {
        return $query->where('type','=',false)
        ->where('pay_type','=',true)
        ->whereDate('date_sale','=',$today)
        ->selectRaw('SUM(price) as total');
    }

    public function scopeExpenseWeek($query, $start, $end, $year)
    {
        return $query->where('type','=',false)
        ->where('pay_type','=',true)
        ->whereDate('date_sale',[$start, $end])
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(price) as total');
    }
    public function scopeExpenseMonth($query,$month,$year)
    {
        return $query->where('type','=',false)
        ->where('pay_type','=',true)
        ->whereMonth('date_sale',$month)
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(price) as total');
    }

    public function scopeExpenseFull($query)
    {
        return $query->where('type','=',false)
        ->where('pay_type','=',true)
        ->selectRaw('SUM(price) as total');
    }
    /** Expense & QR */
    public function scopeExpenseQRToday($query,$today)
    {
        return $query->where('type','=',false)
        ->where('pay_type','=',false)
        ->whereDate('date_sale','=',$today)
        ->selectRaw('SUM(price) as total');;
    }

    public function scopeExpenseQRWeek($query, $start, $end, $year)
    {
        return $query->where('type','=',false)
        ->where('pay_type','=',false)
        ->whereDate('date_sale',[$start, $end])
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(price) as total');
    }
    public function scopeExpenseQRMonth($query,$month,$year)
    {
        return $query->where('type','=',false)
        ->where('pay_type','=',false)
        ->whereMonth('date_sale',$month)
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(price) as total');
    }
    public function scopeExpenseQRFull($query)
    {
        return $query->where('type','=',false)
        ->where('pay_type','=',false)
        ->selectRaw('SUM(price) as total');
    }

    /** prendas vendidas */
    public function scopeClothesToday($query,$today)
    {
        return $query->whereDate('date_sale','=',$today)
        ->selectRaw('SUM(quantity) as prendas');
    }
    public function scopeClothesWeek($query,$month,$year)
    {
        return $query->whereMonth('date_sale',$month)
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(quantity) as prendas');
    }
    public function scopeClothesMonth($query,$month,$year)
    {
        return $query->whereMonth('date_sale',$month)
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(quantity) as prendas');
    }
    public function scopeClothesFull($query)
    {
        return $query->selectRaw('SUM(quantity) as prendas');
    }
    /**
     * **********************************************
     * GETTERS
     * **********************************************
     */
    public function getIncomeAttribute()
    {
        return $this->type?'Ingreso':'Gasto';
    }
    public function getPaymentAttribute()
    {
        return $this->pay_type?'Efectivo':'QR';
    }
    public function getDateSaleFormatAttribute()
    {
        return Carbon::parse($this->date_sale)->format('d-m-Y');
    }
    
}
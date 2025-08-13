<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleClothes extends Model
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
        ->whereBetween('date_sale',[$start, $end])
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
        ->whereBetween('date_sale',[$start, $end])
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
        return $query->where('type','=',1)
        ->whereDate('date_sale','=',$today)
        ->selectRaw('SUM(quantity) as prendas');
    }
    public function scopeClothesWeek($query, $start, $end,$year)
    {
        return $query->where('type','=',1)
        ->whereBetween('date_sale',[$start, $end])
        ->selectRaw('SUM(quantity) as prendas');
    }
    public function scopeClothesMonth($query,$month,$year)
    {
        return $query->where('type','=',1)
        ->whereMonth('date_sale',$month)
        ->whereYear('date_sale', $year)
        ->selectRaw('SUM(quantity) as prendas');
    }
    public function scopeClothesFull($query)
    {
        return $query->where('type','=',1)
        ->selectRaw('SUM(quantity) as prendas');
    }

    public function scopeSummaryByDate($query)
    {
        return $query->selectRaw('
            DATE(date_sale) AS fecha,
            SUM(CASE WHEN type = 1 THEN quantity * price ELSE 0 END) AS ingreso,
            SUM(CASE WHEN type = 0 THEN quantity * price ELSE 0 END) AS gasto,
            SUM(CASE WHEN type = 1 THEN quantity * price ELSE 0 END) - 
            SUM(CASE WHEN type = 0 THEN quantity * price ELSE 0 END) AS total,
            SUM(quantity) AS prendas
        ')
        ->groupBy(DB::raw('DATE(date_sale)'))
        ->orderBy('fecha','desc');
    }

    public function scopeSummaryByWeek($query)
    {
        return $query->selectRaw('
            WEEK(date_sale, 1) AS semana,
            SUM(CASE WHEN type = 1 THEN quantity * price ELSE 0 END) AS ingreso,
            SUM(CASE WHEN type = 0 THEN quantity * price ELSE 0 END) AS gasto,
            SUM(CASE WHEN type = 1 THEN quantity * price ELSE 0 END) - 
            SUM(CASE WHEN type = 0 THEN quantity * price ELSE 0 END) AS total,
            SUM(quantity) AS prendas
        ')
        ->groupBy(DB::raw('WEEK(date_sale, 1)'))
        ->orderBy('semana', 'desc');
    }

    public function scopeSummaryByMonth($query)
    {
        DB::statement("SET lc_time_names = 'es_ES'");
        return $query->selectRaw('
            DATE_FORMAT(date_sale, "%Y-%M") AS mes,
            SUM(CASE WHEN type = 1 THEN quantity * price ELSE 0 END) AS ingreso,
            SUM(CASE WHEN type = 0 THEN quantity * price ELSE 0 END) AS gasto,
            SUM(CASE WHEN type = 1 THEN quantity * price ELSE 0 END) - 
            SUM(CASE WHEN type = 0 THEN quantity * price ELSE 0 END) AS total,
            SUM(quantity) AS prendas
        ')
        ->groupBy(DB::raw('DATE_FORMAT(date_sale, "%Y-%M")'));
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
    public function getPaymentTextAttribute()
    {
        switch ($this->pay_type) {
            case '1':
                $pay_type_string = 'Efectivo';
                break;
            case '2':
                $pay_type_string = 'Transferencia';
                break;
            case '3':
                $pay_type_string = 'Deposito';
                break;
            case '0':
                $pay_type_string = 'QR';
                break;
            default:
                $pay_type_string = 'tipo de pago desconocido';
                break;
        }
        
        return $pay_type_string;
    }
    public function getDateSaleFormatAttribute()
    {
        return Carbon::parse($this->date_sale)->format('d-m-Y');
    }
    
}
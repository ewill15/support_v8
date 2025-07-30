<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     */

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
    
}

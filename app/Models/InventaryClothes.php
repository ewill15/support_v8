<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventaryClothes extends Model
{
    use HasFactory;

    protected $images_attr = ['image'];
    protected $folder_images = 'inventary_images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'size',
        'buy_price',
        'sale_price',
        'code',
        'date_in',
        'date_out',
        'legend_id'
    ];

    /**
     * **********************************************
     * GETTERS
     * **********************************************
    */
    public function getDateInFormatAttribute()
    {
        return Carbon::parse($this->date_in)->format('d-m-Y');
    }
    public function getDateOutFormatAttribute()
    {
        return Carbon::parse($this->date_out)->format('d-m-Y');
    }
}

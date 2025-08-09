<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventaryClothe extends Model
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
    ];
}

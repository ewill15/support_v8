<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegendClothes extends Model
{
    use HasFactory;

    protected $images_attr = ['image'];
    protected $folder_images = 'legend_clothes_images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legend extends Model
{
    use HasFactory;

    protected $images_attr = ['image'];
    protected $folder_images = 'legends_images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'short_name',
        'icon',
        'color'
    ];

    //MUTATOR
    public function getImagePathAttribute()
    {
        if ($this->image)
            return asset('img') .'/'.$this->folder_images.'/'.$this->image;
        else
            return asset('img') .'/no-image.png';
    }
}

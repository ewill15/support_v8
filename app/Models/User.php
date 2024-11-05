<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
        'image',
        'user_role',
        'access_token'
    ];

    protected $dates = ['deleted_at'];
    protected $images_attr = ['image'];
    protected $folder_images = 'users_images';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->user_role === 'admin';
    }

    /**
     * **********************************************
     * RELATIONSHIPS
     * **********************************************
     */
    public function bills(){
        return $this->hasMany(Bill::class);
    }
    /**
     * **********************************************
     * SCOPES
     * **********************************************
     */
    
    public function scopeUsers($query)
    {
        return $query->where('user_role','!=','admin');
    }
    public function scopeClients($query)
    {
        return $query->where('user_role','Client');
    }    
    public function scopeUsersClients($query)
    {
        return $query->where('user_role','!=','Admin');
    }
    public function scopeByEmail($query, $email)
    {
        return $query->where('email',$email);
    }
    public function scopeByAccessToken($query, $access_token)
    {
        return $query->where('access_token',$access_token);
    }
    public function scopeByUserType($query, $type)
    {
        return $query->where('user_role',$type);
    }

    /**
     * **********************************************
     * GETTERS
     * **********************************************
     */
    public function getRoleAttribute(){
        return $this->user_role;
    }

    public function getImagePathAttribute()
    {
        if ($this->image)
            return asset('img') .'/'.$this->folder_images.'/'.$this->image;
        else
            return asset('img/no-image.png');
    }

    public function getShowPictureApiAttribute()
    {
        if ($this->image) {
            if (substr($this->image, 0, 4) === "http")
                return $this->image;
            return asset('img/user') . '/' . $this->image;
        } else {
            return asset('img/no-image.png');
        }
    }

    public function getShowPictureAttribute()
    {
        if ($this->image) {
            if (substr($this->image, 0, 4) === "http")
                return $this->image;
            return asset('img/users_images') . '/' . $this->image;
        } else {
            return asset('img/no-image.png');
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',            
        'email',
        'username',
        'image',
        'facebook_url',
        'linkedin_url',
        'twitter_url',
        'github_url'
    ];

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}

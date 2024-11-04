<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    protected $fillable=[
        'role',
        'create',
        'read',
        'update',
        'delete'
    ];

    public function getCanCreateAttribute()
    {
        return $this->create?'YES':'NO';
    }

    public function getCanReadAttribute()
    {
        return $this->read?'YES':'NO';
    }

    public function getCanUpdateAttribute()
    {
        return $this->update?'YES':'NO';
    }

    public function getCanDeleteAttribute()
    {
        return $this->delete?'YES':'NO';
    }

      
}

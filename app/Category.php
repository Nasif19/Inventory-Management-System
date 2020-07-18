<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'serial', 'status', 'is_delete',
    ];

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }
}

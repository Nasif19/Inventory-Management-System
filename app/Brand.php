<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name', 'status', 'is_delete',
    ];

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }
}

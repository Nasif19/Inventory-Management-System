<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'name', 'address', 'status', 'is_delete',
    ];

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'quantity', 'unit', 'price', 'tbl_type_id', 'tbl_brand_id', 
        'tbl_category_id', 'tbl_storage_id', 'image', 'status', 'is_delete',
    ];

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    protected $fillable=[
        'tbl_product_id','status','is_delete',
    ];
}

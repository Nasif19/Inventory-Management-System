<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRequisition extends Model
{
    protected $fillable = [
        'tbl_product_id', 'tbl_user_id', 'quantity','total_price', 'status', 'is_delete',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderSaleDoc extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'dateDoc',
    ];

    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
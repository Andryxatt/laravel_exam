<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDoc extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'dateDoc',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
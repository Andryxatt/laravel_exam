<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sklad extends Model
{
    protected $fillable = [
        'name',
        'priceMonth'
    ];

    public function products()
    {
        return $this->hasMany('App\product');
    }
}
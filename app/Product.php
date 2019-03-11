<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug',
        'model',
        'marka_id',
        'price_by',
        'price_sale',
        'image',
        'provider_id',
        'sklad_id',
        'sizes',

    ];

    public function sklad()
    {
        return $this->belongsTo('App\Sklad');
    }
    public function marka()
    {
        return $this->belongsTo('App\Marka');
    }
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
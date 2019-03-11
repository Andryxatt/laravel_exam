<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marka extends Model
{
    protected $fillable = [
        'slug',
        'name',
    ];

    public function products()
    {
        return $this->hasMany('App\product');
    }
}
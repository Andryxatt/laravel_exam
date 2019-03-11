<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'family',
        'phone',
        'email',
        'webpage'
    ];

    public function products()
    {
        return $this->hasMany('App\product');
    }
}
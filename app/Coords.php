<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coords extends Model
{
    protected $fillable = [
        'address_latitude',
        'address_longitude'
    ];

    public function coords()
    {
        return $this->belongsToMany('App\News');
    }
}

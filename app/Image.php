<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image'
    ];

    public function news()
    {
        return $this->belongsToMany('App\News')->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function news()
    {
        return $this->belongsToMany('App\News', 'image_news')->withTimestamps();

    }
}

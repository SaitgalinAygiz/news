<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{


    public function images() {

        return $this->hasMany(Image::class, 'news_id');
    }

}

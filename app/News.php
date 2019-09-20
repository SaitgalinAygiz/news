<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{



    protected $fillable = ['title', 'description', 'image', 'user_id'];

    public function images() {

        return $this->hasMany(Image::class, 'news_id');
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }



}

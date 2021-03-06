<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class News extends Model
{

    use HasSlug;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];



    public function images() {

        return $this->hasMany(Image::class, 'news_id');
    }

    public function owner() {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function coords() {

        return $this->hasMany(Coords::class, 'news_id');
    }


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

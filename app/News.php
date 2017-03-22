<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    public function getUrl()
    {
        return url('/novice/' . $this->slug);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getCoverImage()
    {
        return $this->images->first();
    }

    public function getCoverImageUrl()
    {
        return $this->getCoverImage()->getUrl();
    }
}

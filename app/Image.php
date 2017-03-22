<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    public function getUrl()
    {
        return "http://lorempixel.com/300/300/people/" . $this->id;
        return url($this->path);
    }
}

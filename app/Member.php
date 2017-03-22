<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    public function getImageUrl()
    {
        return "http://lorempixel.com/300/300/people/" . $this->id;
        return url("uploads/" . $this->img_path);
    }
}

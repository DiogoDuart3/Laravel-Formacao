<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pen extends Model
{
    function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }
}

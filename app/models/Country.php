<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }
}

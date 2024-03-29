<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->hasMany(User::class);
    }
}

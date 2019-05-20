<?php

namespace App\models;

use App\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $fillable=['title','body','user_id'];

    function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function scopeDesc($query){
        return $query->orderBy('id', 'desc')->withTrashed()->get();
    }
}

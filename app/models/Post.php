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

    function index(){
        $posts = Post::withTrashed()->get();
        return view('admin.posts.index', compact('posts'));
    }

    function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

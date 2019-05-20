<?php

namespace App\models;

use App\Pen;
use App\Photo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function posts()
    {
        return $this->hasMany(Post::class);
    }

    function getPostsQuantityAttribute()
    {
        if ($this->posts())
            return count($this->posts);
        else
            return 0;
    }

    function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    function pen()
    {
        return $this::hasOne(Pen::class, 'user_id');
    }

    function roles()
    {
        return $this::belongsToMany(Role::class);
    }

    function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }
}

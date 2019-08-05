<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content'];


    public function postOwner()
    {
        return $this->belongsTo('App\PostOwner');
    }
    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'posts_in_rooms');
    }
    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}

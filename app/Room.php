<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    public $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'posts_in_rooms');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'posts_in_rooms');
    }
}

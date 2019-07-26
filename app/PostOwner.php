<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostOwner extends Model
{
    public $timestamps = false;

    
    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function fund()
    {
        return $this->hasOne('App\Fund');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'user_level','user_avatar',
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Post(){
        return $this->belongsTo('App\Post');
    }
    public function Comment(){
        return $this->belongsTo('App\Post');
    }
}

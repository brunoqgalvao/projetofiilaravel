<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Room extends Model
{

    public $fillable = ['name'];

    protected $appends = ['followed_by_auth_user'];


    public function postOwner()
    {
        return $this->belongsTo('App\PostOwner');
    }
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows');
    }

    public function getFollowedByAuthUserAttribute()
    {        
        $followed = $this->follows->contains(Auth::user()->id);
        if ($followed) return true;
        return false;
    }
}

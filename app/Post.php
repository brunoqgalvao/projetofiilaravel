<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Post extends Model
{
    protected $fillable = ['content'];
    protected $appends = [
        'age',
        'relevance'
    ];

    public function formattedTimeDifference($time){
        $array = ["ano" => $time->y,"mes" => $time->m,"dia" => $time->d,"hora" => $time->h,"minuto" => $time->i];
        foreach($array as $key=>$item){
            if($item>0){
                $plural = $key=="mes"?"es":"s";
                $string = "$item $key".($item>1?$plural:"");
                return $string;
            }
        }
    }
    public function ageInSeconds($time) {
        return $time->i*60+$time->h*60*60+$time->d*60*60*24+$time->m*30*60*60*24+$time->y*365*60*60*24+10;
    }

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
    public function getAgeAttribute()
    {
        $timeDifference = now()->diff($this->created_at);
        return $this->formattedTimeDifference($timeDifference);
    }
    public function getRelevanceAttribute()
    {
        $timeDifference = now()->diff($this->created_at);
        $ageInSeconds = $this->ageInSeconds($timeDifference);
        $likes = $this->likes_total;
        $comments = $this->comments_total;
        $scoreOne = min(15,sqrt(100000/$ageInSeconds)) + min(20,0.5*pow($likes,1.5)) + min(10,0.5*pow($comments,1.2));
        $isRelated = $this->rooms->reduce(function($carry,$room) { return $carry + $room->followed_by_auth_user;});
        return $scoreOne + pow(20*$isRelated,0.5);
    }
}

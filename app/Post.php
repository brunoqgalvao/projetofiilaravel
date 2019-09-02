<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content'];
    protected $appends = [
        'age'
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
}

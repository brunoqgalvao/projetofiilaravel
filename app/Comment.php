<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'user_level','user_avatar',
    ];
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
            return "segundos";
    }

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
    public function likes()
    {
        return $this->belongsToMany('App\User', 'commentlikes');
    }
    public function getAgeAttribute()
    {
        $timeDifference = now()->diff($this->created_at);
        return $this->formattedTimeDifference($timeDifference);
    }

}

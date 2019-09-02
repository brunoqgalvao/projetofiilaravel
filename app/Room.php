<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    public $fillable = ['name'];

    public function postOwner()
    {
        return $this->belongsTo('App\PostOwner');
    }
}

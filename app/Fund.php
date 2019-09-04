<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{

    public $fillable = ['name', 'ticker'];


    public function postOwner()
    {
        return $this->belongsTo('App\PostOwner');
    }
}

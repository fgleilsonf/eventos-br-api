<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'event_id', 'id');
    }

    public function likesEvents()
    {
        return $this->hasMany('App\LikesEvent', 'event_id', 'id');
    }

//    public function comments()
//    {
//        return $this->hasMany('App\Comment', 'event_id', 'id');
//    }
}
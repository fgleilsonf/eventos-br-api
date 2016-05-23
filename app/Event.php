<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function Media()
    {
        return $this->hasOne('App\MediasEvent', 'id', 'media_event_id');
    }

    public function Medias()
    {
        return $this->hasMany('App\MediasEvent', 'event_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'event_id', 'id');
    }

    public function likesEvents()
    {
        return $this->hasMany('App\LikesEvent', 'event_id', 'id');
    }
}
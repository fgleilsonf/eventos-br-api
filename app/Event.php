<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment', '  event_id', 'id');
    }
}
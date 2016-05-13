<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikesEvent extends Model
{
    protected $table = 'likes_events';


    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
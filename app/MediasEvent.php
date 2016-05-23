<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediasEvent extends Model
{
    protected $table = 'medias_events';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
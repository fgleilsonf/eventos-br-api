<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable =  ['user_id', 'friend_id'];

    public function User()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }
}

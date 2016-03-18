<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable =  ['name', 'email', 'facebook_id', 'profile_photo', 'cover_photo', 'has_car'];

    protected $hidden = array('password');

    public static function getFriendships($userId)
    {
        return DB::select('SELECT DISTINCT 
                                  t1.id as id,
                                  t1.name as name,
                                  t1.email as email,
                                  t1.profile_photo as profile_photo,
                                  t1.cover_photo as cover_photo,
                                  t1.has_car as has_car
                               FROM users t1
                               JOIN friendships t2 ON ((t2.user_id = :user_id OR t2.user_id = :user_id)
                                                   AND (t1.id = t2.user_id OR t1.id = t2.friend_id))
                              WHERE t1.id != :user_id;', array('user_id' => $userId));
    }
}

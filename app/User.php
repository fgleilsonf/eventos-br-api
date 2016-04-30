<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = true;

    protected $fillable =  ['name', 'email', 'facebook_id', 'photo_profile', 'photo_cover'];

    protected $hidden = array('facebook_id');
}
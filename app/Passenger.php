<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable =  ['route_id', 'passenger_id', 'sequence', 'status', 'meeting_point_id'];

    public function route()
    {
        return $this->hasOne('App\Route', 'id', 'route_id');
    }

    public function passenger()
    {
        return $this->hasOne('App\User', 'id', 'passenger_id');
    }

    public function meetingPoint()
    {
        return $this->hasOne('App\Coordinate', 'id', 'meeting_point_id');
    }
}

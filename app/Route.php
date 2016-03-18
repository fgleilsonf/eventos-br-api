<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable =  [
        'name',
        'owner_id',
        'driver_id',
        'starting_point_id',
        'destination_point_id',
        'current_point_id',
        'date',
        'status'
    ];

    public function passengers()
    {
        return $this->belongsToMany('App\User', 'passengers', 'route_id', 'passenger_id');
    }

    public function startingPoint()
    {
        return $this->hasOne('App\Coordinate', 'id', 'starting_point_id');
    }

    public function destinationPoint()
    {
        return $this->hasOne('App\Coordinate', 'id', 'destination_point_id');
    }

    public function currentPoint()
    {
        return $this->hasOne('App\Coordinate', 'id', 'current_point_id');
    }

    public function owner()
    {
        return $this->hasOne('App\User', 'id', 'owner_id');
    }

    public function driver()
    {
        return $this->hasOne('App\User', 'id', 'driver_id');
    }
}

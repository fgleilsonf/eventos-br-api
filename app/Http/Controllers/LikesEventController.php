<?php

namespace App\Http\Controllers;

use App\LikesEvent;
use Exception;
use App\Event;
use Illuminate\Support\Facades\Input;

class LikesEventController extends Controller
{
    public function index()
    {
    }

    public function store($eventId)
    {
        $likesEvent = new LikesEvent();

        $likesEvent->event_id = $eventId;
        $likesEvent->user_id = Input::get('user_id');

        $likesEvent->save();

        return $likesEvent;
    }
}
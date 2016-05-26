<?php

namespace App\Http\Controllers;

use Exception;
use App\Event;
use Illuminate\Support\Facades\Input;

class EVentController extends Controller
{
    public function index()
    {
        $events = Event::all();
        foreach ($events as $event) {
            foreach ($event->comments as $comment) {
                $comment->user;
            }

            foreach ($event->likesEvents as $likesEvent) {
                $likesEvent->user;
            }

            $event->user;
            $event->media;
            $event->medias;
        }

        return $events;
    }

    public function show($id)
    {
        $event = Event::find($id);
        $event->comments;

        return $event;
    }

    public function destroy($id)
    {
        return Event::destroy($id);
    }

    public function store()
    {
        try {
            $event = new Event();

            $event->title = Input::get('title');
            $event->message = Input::get('message');
            $event->user_id = Input::get('user_id');
            $event->start_date = Input::get('start_date', null);
            $event->end_date = Input::get('end_date', null);
            $event->is_public = Input::get('is_public', false);

            $event->save();

            return $event;
        } catch(Exception $e) {
            return array(
                'response_message' => 'Erro ao atualizar dados do usuário. '.$e->getMessage()
            );
        }
    }

    public function update($id)
    {
        try {
            $event = Event::find($id);
            if ($event) {
                $event->message = Input::get('message', $event->message);
                $event->title = Input::get('title', $event->title);
                $event->start_date = Input::get('start_date', $event->start_date);
                $event->end_date = Input::get('end_date', $event->end_date);
                $event->is_public = Input::get('is_public', $event->is_public);
            
                $event->save();

                return $event;
            } else {
                return array(
                    'response_message'=> 'Event id not found'
                );
            }
        } catch(Exception $e) {
            return array(
                'response_message'=> 'Erro ao atualizar dados do evento'.$e->getMessage()
            );
        }
    }
}
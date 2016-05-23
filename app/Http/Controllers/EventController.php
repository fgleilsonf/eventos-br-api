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
            $user = User::find($id);
            if ($user) {
                $user->name = Input::get('name', $user->name);
                $user->photo_profile = Input::get('photo_profile', $user->photo_profile);
                $user->photo_cover = Input::get('photo_cover', $user->photo_cover);

                $user->save();

                return $user;
            } else {
                return array(
                    'response_message'=> 'User id not found'
                );
            }
        } catch(Exception $e) {
            return array(
                'response_message'=> 'Erro ao atualizar dados do usuário'.$e->getMessage()
            );
        }
    }
}
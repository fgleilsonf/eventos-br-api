<?php

namespace App\Http\Controllers;

use App\Comment;
use Exception;
use App\Event;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    public function byEventId($eventId)
    {
        $comments = Comment::where('event_id', '=', $eventId)->get();
        foreach ($comments as $comment) {
            $comment->user;
        }

        return $comments;
    }

    public function show($id)
    {
        $comment = Comment::find($id);
        $comment->user;
        return $comment;
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
            $event->start_date = Input::get('start_date');
            $event->end_date = Input::get('end_date');
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
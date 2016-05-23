<?php

namespace App\Http\Controllers;

use App\MediasEvent;
use Illuminate\Support\Facades\Input;

class MediaController extends Controller
{
    public function byEventId($eventId)
    {
        $medias = MediasEvent::where('event_id', '=', $eventId)->get();
        foreach ($medias as $media) {
            $media->user;
        }

        return $medias;
    }

    public function index()
    {
        $params = Input::all();
        $comments = MediasEvent::where($params)->get();

        foreach ($comments as $comment) {
            $comment->user;
        }

        return $comments;
    }

    public function show($id)
    {
    }

    public function destroy($id)
    {
        return MediasEvent::destroy($id);
    }

    public function store()
    {
        try {
            $media = new MediasEvent();

            $media->url = Input::get('url');
            $media->event_id = Input::get('event_id');
            $media->user_id = Input::get('user_id');
            $media->type_media = Input::get('type_media');

            $media->save();

            return $media;
        } catch(Exception $e) {
            return array(
                'response_message' => 'Erro ao atualizar dados do usuário. '.$e->getMessage()
            );
        }
    }

    public function update($id)
    {
    }
}
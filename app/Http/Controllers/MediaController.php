<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function upload(Request $request)
    {
        $path = '../../eventos-br/src/public/uploads/';
        $data = json_decode(Input::get('data'));

        $file = $_FILES['file'];
        $ext = explode('/', $file['type'])[1];

        $newName = $data->id . $data->user_id . date("Y.m.d-H.i.s") . '.' . $ext;

        if (move_uploaded_file($file['tmp_name'], $path . $newName)) {
            $media = new MediasEvent();
            $media->url = $newName;
            $media->event_id = $data->id;
            $media->user_id = $data->user_id;
            $media->type = $data->type;
            $media->display_order = -1;

            $media->save();

            return $media;
        }

        return 'Falha ao realizar upload';
    }

    public function store()
    {
        try {
            $media = new MediasEvent();

            $media->url = Input::get('url');
            $media->event_id = Input::get('event_id');
            $media->user_id = Input::get('user_id');
            $media->type = Input::get('type');
            $media->display_order = Input::get('display_order', -1);

            $media->save();

            return $media;
        } catch(Exception $e) {
            return array(
                'response_message' => 'Erro ao atualizar dados da mídia. '.$e->getMessage()
            );
        }
    }

    public function update($id)
    {
    }
}
<?php

namespace App\Http\Controllers;

use Exception;
use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }

    public function store()
    {
        try {
            $user = User::where('facebook_id', '=', Input::get('facebook_id'))->first();

            if (!$user) {
                $user = new User();
            }

            $user->facebook_id = Input::get('facebook_id', $user['facebook_id']);
            $user->name = Input::get('name', $user['name']);
            $user->photo_profile = Input::get('photo_profile');
            $user->photo_cover = Input::get('photo_cover');
            $user->email = Input::get('email');

            $user->save();

            return $user;
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
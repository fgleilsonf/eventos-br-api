<?php

namespace App\Http\Controllers;

use Validator;
use Mail;
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
//            $rules = array(
//                'name'             => 'required',
//                'email'            => 'required|email|unique:users',
//                'facebook_id'      => 'required|unique:users'
//            );

            $params = Input::all();
//            $validator = Validator::make($params, $rules);

//            if ($validator->fails()) {
//                return $validator->messages();
//            } else {
                $findUser = User::where('facebook_id' , '=', $params['facebook_id'])->first();
                if ($findUser) {
                    return $findUser;
                }

                $user =  User::create($params);

//                Mail::send('emails.welcome', ['user' => $user], function ($m) use ($user) {
//                    $m->from(MAIL, 'Krona');
//                    $m->to($user->email, $user->name)->subject('Bem vindo ao Krona');
//                });
                return $user;
//            }
        } catch(Exception $e) {
            return array(
                'response_code' => 500,
                'response_message'=> $e->getMessage()
            );
        }
    }

    public function update($id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->name = Input::get('name', $user->name);
                $user->profile_photo = Input::get('profile_photo', $user->profile_photo);
                $user->cover_photo = Input::get('cover_photo', $user->cover_photo);
                $user->has_car = Input::get('has_car', $user->has_car);

                $user->save();

                return $user;
            } else {
                return array(
                    'response_code' => 404,
                    'response_message'=> 'User id not found'
                );
            }
        } catch(Exception $e) {
            return array(
                'response_code' => 500,
                'response_message'=> $e->getMessage()
            );
        }
    }
}

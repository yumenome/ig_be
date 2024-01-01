<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControler extends Controller
{
    public function signup(SignupRequest $request){
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'password'=> bcrypt($data['password']),
        ]);
        $token = $user->createToken('main')->plainTextToken;
        // Auth::login($user);
        return response(compact('token', 'user'));
    }

    public function login(LoginRequest $request){
        $data = $request->validated();

        if(!Auth::attempt($data)){
            return response([
                'message' => 'invalid login!'
            ],422);
        }
            /** @var \App\Models\User $user */
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return response(compact('token','user'));
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response('', 204);
    }


}



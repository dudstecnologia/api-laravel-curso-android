<?php

namespace App\Services\Api;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public static function login($request)
    {
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user = auth()->user();
            $user->token = $user->createToken($user->email)->accessToken;
    
            return $user;
        }

        return response(['message' => 'Unauthenticated.'], 401);
    }

    public static function register($request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
    
        $user->token = $user->createToken($user->email)->accessToken;
    
        return $user;
    }

    public static function logout($request)
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'message' => 'Deslogado com sucesso'
        ]);
    }
}
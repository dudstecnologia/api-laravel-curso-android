<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Api\AuthService;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        return AuthService::login($request->all());
    }

    public function register(RegisterRequest $request)
    {
        return AuthService::register($request->all());
    }

    public function logout(Request $request)
    {
        return AuthService::logout($request->all());
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    public function register(UserService $user, StoreUserRequest $request){
        return $user->register($request);
    }

    public function login(UserService $user, LoginUserRequest $request){
        return $user->login($request);
    }
}

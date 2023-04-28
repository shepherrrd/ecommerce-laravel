<?php
namespace App\Services;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

class UserService{
    use HttpResponses;
    public function register(StoreUserRequest $request){
        $request->validated($request->all());
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
            $fullname = $user->first_name.' '.$user->last_name;
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token Of '.$user->first_name)->plainTextToken
        ]
    );
    }

    public function login(LoginUserRequest $request){
            $request->validated($request->all());

            if(!Auth::attempt($request->only('email','password'))){
                return $this->error([
                    "message" => "invalid Credentials"
                ],[],401);
            };
            $user = User::where([
                'email' => $request->email
            ])->first();
            $fullname = $user->first_name.' '.$user->last_name;
            
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token Of '.$fullname)->plainTextToken
        ]
    );
    }
}
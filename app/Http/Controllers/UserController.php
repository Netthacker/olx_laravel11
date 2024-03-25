<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SigninRequest;


class UserController extends Controller
{
   public function signup(CreateUserRequest $request){
    $data = $request->only(['name','email','password','state_id']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $response = [
            'error' =>'',
            'token'=>$user->createToken('Register_token')->plainTextToken
        ];

        return response()->json($response);
   }

   public function signin(SigninRequest $request){
        $data = $request->only(['email','password']);
        if(Auth::attempt($data)){
            $user = Auth::user();
            $tokenUser = User::where('email',$user->email)->first();
            $response=[
                'error'=>'',
                'token'=> $tokenUser->createToken('Login_token')->plainTextToken
            ];
            return response()->json($response, 200);
        };
        return response()->json(['error'=>'Invalid User or Password !']);
    }

    public function me(Request $request){
        $user = Auth::user();
        $response = ['name'=>$user->name,
                     'email'=> $user->email,
                     'state'=>$user->state->name,
                     'ads'=>$user->advertises
                    ];
        return response()->json($response);
    }

}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiBaseConroller;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends ApiBaseConroller
{

    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
       
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
          
            $user->token = $user->createToken('test_testing')->plainTextToken;
            
            return $this->success(200,new LoginResource($user),'login successfull');
           
            // return new LoginResource($user);
            // return response()->json([
            //     'status' => 200,
            //     'data' => $user,
            //     'message' => 'User Login successful'
            // ]);
        }else{
            // return response()->json([
            //     'status' => 401,
            //     'data' => '',
            //     'message' => 'The credentials does not match'
            // ]);
            return $this->error(500,'does not match');
        }
    }
}

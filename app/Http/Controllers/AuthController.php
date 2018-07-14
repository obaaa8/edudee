<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if ( ! $token = JWTAuth::attempt($credentials)) {
                return response([
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Invalid Credentials.'
                ]);
        }
        return response([
                'status' => 'success',
                'token' => $token
            ]);
    }
    public function user(Request $request){
        $user = User::find(Auth::user()->id);
        return response([
                'status' => 'success',
                'data' => $user
            ]);
    }
    public function refresh(){
        return response([
                'status' => 'success'
            ]);
    }

    public function logout(){
        JWTAuth::invalidate();
        return response([
                'status' => 'success',
                'msg' => 'Logged out Successfully.'
            ], 200);
    }
}

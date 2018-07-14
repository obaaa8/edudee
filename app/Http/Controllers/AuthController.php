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
                'success' => false,
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ]);
        }
        return response([
            'success' => true,
            'token' => $token
        ]);
    }
    public function user(Request $request){
        $user = User::find(Auth::user()->id);
        return response([
            'success' => true,
            'data' => $user
        ]);
    }
    public function refresh(){
        return response([
            'success' => true
        ]);
    }

    public function logout(){
        JWTAuth::invalidate();
        return response([
            'success' => true,
            'msg' => 'Logged out Successfully.'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{

    public function show_register_form(){
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user_id = User::count() + 1;
        if(User::find($user_id)){
            // dd($data);
        }

        $user = new User(); 
        $user->id = $user_id;
        $user->email = $user->email;
        $user->password = bcrypt($request->password);
        
        $user->save();

        

        return redirect()->home();
    }
}

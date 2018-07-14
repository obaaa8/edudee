<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dept;
use App\Job;

class UserController extends Controller
{

    public function show_register_form(){
        $jobs = Job::all();
        $depts = Dept::all();
        return view('auth.register')->withJobs($jobs)->withDepts($depts);
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dept_id = $request->dept_id;
        $user->job_id = $request->job_id;
        $user->u_id = 0;
        $user->type = 1;
        $user->semester = 1;
        $user->n_id = 0;
        $user->pay_statue = 0;
        $user->reg_status = 0;
        $user->password = bcrypt($request->password);
        
        $user->save();

        return redirect()->home();
    }
}

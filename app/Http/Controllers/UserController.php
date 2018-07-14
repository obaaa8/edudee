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

        $user_id = 2;// User::count() + 1;
        if(User::find($user_id)){
        //     // dd($data);
        }

        $user = new User(); 
        $user->id = 20;
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
        
        // dd($user);
        $user->save();

        // return redirect()->home();
    }

    public function send_sms($phone, $message){

        $params = urlencode ($message);
        
        $data = array(
            'user' => 'FireBits',
            'pwd' => 'FireBits',
            'sms'=> $params,
            'number'=> $phone
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://185.43.210.23:9090/html/sms/send_sms.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
                 http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);
        curl_close ($ch);
        
    }

}

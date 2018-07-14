<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function users(){
        return view('admin.user');
        
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        dd($user);
        if(!$user){
            return response()->json([
                'success' => false,
                'msg' => 'No user data'
            ]);
        }
        if($user->reg_status == 1){
            return response()->json([
                'success' => false,
                'msg' => 'Already pay'
            ]);
        }
        $job = $user->job;
        if($job){
            $amount = $request->amount;
            $job_amount = $job->amount;
            if($job_amount < $amount){
                $amount = $job_amount;
            }

            $payment = new Payment();
            $payment->amount = $amount;
            $payment->semester = $request->semester;
            $payment->card_id = $request->card_id;
    
            $payment->save();
            // $payment->user_id = $request->user_id;
            // $payment->dept_id = $request->dept_id;
            $user->payments()->save($payment);

            $dept = Dept::where('id', $request->dept_id)->first();
            $user->department()->save($dept);
            
            if($request->amount >= $job_amount){
                $user->reg_status = 1;
                $user->save();
            }
            return response()->json([
                'success' => true,
                'data' => $payment,
            ],200);

        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}

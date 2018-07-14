<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $label = "User";
    protected $fillable = [
        '_id', 'name', 'email', 'password', 'phone', 
        'u_id', 'type', 'reg_status', 'n_id', 'dept_id', 
        'semester', 'job_id', 'pay_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function payments(){
        return $this->hasMany('App/Payment');
    }

    public function department(){
        return $this->belongsTo('App/Dept');
    }

    public function job(){
        return $this->belongsTo('App/Job');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Job extends NeoEloquent
{
    
    protected $label = "Job";
    protected $fillable = ['_id', 'name', 'amount'];

    public function users(){
        return $this->hasMany('App/User');
    }

}

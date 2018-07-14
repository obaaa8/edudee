<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Dept extends NeoEloquent
{
    
    protected $label = "Dept";
    protected $fillable = ['_id', 'name'];

    public function subjects(){
        return $this->hasMany('App\Subject');
    }
}

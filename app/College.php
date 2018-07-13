<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class College extends NeoEloquent
{
    protected $label = "colleges";
    protected $fillable = ['id', 'name'];

    public function depts(){
        return $this->hasMany('App\Dept');
    }
}

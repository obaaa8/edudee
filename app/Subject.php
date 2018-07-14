<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Subject extends NeoEloquent
{
    
    protected $label = "Subject";
    protected $fillable = ['_id', 'name', 'semester'];
}
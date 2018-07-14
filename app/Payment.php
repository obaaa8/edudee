<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Payment extends NeoEloquent
{
    
    protected $label = "Payment";

    protected $fillable = [
        'id', 
        'amount', 
        'semester', 
        'card_id'
    ];

    public function user(){
        return $this->belongsTo('App/User');
    }
}

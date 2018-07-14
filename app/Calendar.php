<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $label = 'Calendar';
    protected $fillable = ['id', 'date', 'start', 'finish'];
}

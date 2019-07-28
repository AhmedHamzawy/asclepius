<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

	protected $fillable = array('title' , 'url' , 'start' , 'end');

    

}
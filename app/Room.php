<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = array('no' , 'floor' , 'department_id');


    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}

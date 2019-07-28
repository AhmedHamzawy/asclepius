<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = array('name' , 'description', 'head');


    public function room()
    {
        return $this->hasOne('App\Room');
    }

    public function doctors()
    {
        return $this->hasMany('App\Doctor');
    }


    public function nurses()
    {
        return $this->hasMany('App\Nurse');
    }
 

 	public function patients()
    {
        return $this->hasMany('App\Patient');
    }


    public function receptionists()
    {
        return $this->hasMany('App\Receptionist');
    }

    public function head()
    {
        return $this->hasOne('App\User' , 'head');
    }
}

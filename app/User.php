<?php


namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'first_name', 'middle_name','last_name', 'gender', 'birthdate', 'age', 'telephone', 'email', 'address' ,
        'street', 'town', 'country', 'other', 'department_id' , 'room_id' , 'doctor_id' , 'appointment' , 'sickness' ,
        'prescription' , 'price' , 'password' 
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department' , 'head');
    }

    public function messagessender()
    {
        return $this->hasMany('App\Message' , 'from' );
    }


    public function messagesreciever()
    {
        return $this->hasMany('App\Message' , 'to' );
    }

    public function reviews()
    {
        return $this->hasMany('App\Review' , 'doctor_id');
    }

}


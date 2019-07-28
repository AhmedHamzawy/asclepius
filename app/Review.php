<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	    protected $fillable = array('patient_id', 'doctor_id' , 'post_id' , 'rating' ,'comment');

		protected $dates = ['created_at', 'updated_at'];

		public function patient()
		{
			return $this->belongsTo('App\User' , 'patient_id');
		}

		public function doctor()
		{
			return $this->belongsTo('App\User' , 'doctor_id');
		}

		public function post()
		{
			return $this->belongsTo('App\Post' , 'post_id');
		}

	
	    
}

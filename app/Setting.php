<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     protected $primaryKey = 'id';
     protected $table = 'settings';
     protected $fillable = array('name' , 'address', 'town' , 'county' , 'post_code' , 'country' , 'telephone' , 'email' , 'website' , 'facebook' , 'twitter' , 
     	'instagram' , 'youtube' , 'vat_rate');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('url', 'title' , 'description' , 'content' , 'blog' , 'date');


    public function reviews()
    {
        return $this->hasMany('App\Review' , 'post_id');
    }

}

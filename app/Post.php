<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Post extends Model
{
    protected $table='post';

    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

     public function comment()
    {
    	return $this->hasMany('App\Comment','post_id','id');
    }

     public function like()
    {
    	return $this->hasMany('App\Like','post_id','id');
    }
}

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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $table='Like';
    public function post()
    {
    	return $this->belongsTo('App\Post','post_id','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Post','user_id','id');
    }
}

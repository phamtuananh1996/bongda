<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberClub extends Model
{
    protected $table='member_club';

    public function club()
    {
    	return $this->belongsTo('App\club','club_id','id');
    }
}

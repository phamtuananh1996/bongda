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

   public function user()
   {
   	return $this->belongsTo('App\user','user_id','id');
   }
}

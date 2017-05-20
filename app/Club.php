<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table='club';

    public function province()
    {
    	return $this->belongsTo('App\province','province_id','provinceid');
    }
    public function district()
    {
    	return $this->belongsTo('App\district','district_id','districtid');
    }
    public function ward()
    {
    	return $this->belongsTo('App\ward','ward_id','wardid');
    }
    public function user()
    {
    	return $this->hasMany('App\user','idclub','id');
    }
}

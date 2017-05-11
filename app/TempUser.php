<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempUser extends Model
{
	protected $primaryKey='email';
    protected $table='temp_user';
}

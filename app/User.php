<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Post()
    {
        return $this->hasMany('App\post','user_id','id');
    }

    public function club()
    {
        return $this->belongsToMany('App\Club','member_club','user_id','club_id');
    }

    public function listClub()
    {
        return $this->hasMany('App\MemberClub','user_id','id');
    }
   
}

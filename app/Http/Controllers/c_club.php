<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_club extends Controller
{
    public function createClub()
    {
    	return view('pages.createmyteam');
    }
}

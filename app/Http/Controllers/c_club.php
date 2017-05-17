<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\District;
use App\Ward;
class c_club extends Controller
{
    public function createClub()
    {
    	$province=Province::all();
    	return view('pages.createmyteam',['province'=>$province]);
    }

    public function ajaxGetDistrict(Request $req)
    {
    	$district=District::where('provinceid',$req->provinceid)->get();

    	return view('ajax.district',['district'=>$district]);
    }

    public function ajaxGetWard(Request $req)
    {
    	$ward=Ward::where('districtid',$req->districtid)->get();

    	return view('ajax.ward',['ward'=>$ward]);
    }
}

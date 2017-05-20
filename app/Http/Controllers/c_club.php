<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Club;
use App\Province;
use App\District;
use App\Ward;
use App\AvatarClub;
use App\User;
use App\MemberClub;
class c_club extends Controller
{
    public function createClub()
    {
        $clubs=MemberClub::where(['user_id'=>Auth::user()->id,'is_creator'=>1])->get();

        if($clubs->count()==0)
        {
    	   $province=Province::all();
            $avatarclub=AvatarClub::all();
    	   return view('clubs.createmyteam',['province'=>$province,'avatar_club'=>$avatarclub]);
        }
        else
        {
            return redirect('404');
        }
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

    public function postCreateClub(Request $req)
    {
        $clubs=MemberClub::where(['user_id'=>Auth::user()->id,'is_creator'=>1])->get();

        if($clubs->count()==0)
        {
             $club=new Club;
             $club->name=$req->name;
             $club->avatar=$req->avatar_club;
             $club->phone=$req->phone;
             $club->province_id=$req->province;
             $club->district_id=$req->district;
             $club->ward_id=$req->ward;
             $club->describe=$req->describe;
             $club->save();

            $memberclub=new MemberClub;
            $memberclub->user_id=Auth::user()->id;
            $memberclub->club_id=$club->id;
            $memberclub->status=1;
            $memberclub->is_creator=1;
            $memberclub->save();

            return redirect('myclub');
        }
        else
        {
             return redirect('404');
        }

    }

    public function myteam()
    {
        
        if(Auth::user()->MemberClub->count())
        {
            return view('clubs.myteam');
        }
        else
        {
            return "Bạn chưa có đội bóng ,tạo đội hoặc gia nhập đội bóng gần bạn";
        }   
    }

}

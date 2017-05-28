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
             $club->longtitude=$req->longtitude;
             $club->latitude=$req->latitude;
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
        
        if(Auth::user()->listClub->count())
        {
            return view('clubs.myteam');
        }
        else
        {
            return "Bạn chưa có đội bóng ,tạo đội hoặc gia nhập đội bóng gần bạn";
        }   
    }


    public function clubDetail($id)
    {
        $club=Club::find($id);
        
        return view('clubs.myclubdetail',compact('club'));
    }

    public function ajaxGetLongLa(Request $req)
    {
        if(!empty($req->province) && !empty($req->district)&& !empty($req->ward)){


             $string=$req->province.' '.$req->district.' '.$req->ward;

             $arr = str_replace( ' ', '+', $string );

            $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$arr.'&key=AIzaSyAWed54z_25kVT_LOabS5IAA8OZhs2FY7w';


            $json =@file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;
            if($status=="OK"){
                $locations=array();
                $locations['lat'] = $data->results[0]->geometry->location->lat;
                $locations['lng'] = $data->results[0]->geometry->location->lng;

            }else{
                return 'false';
            }
    
            
        return response()->json($locations);
           

        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,DB;
use App\User;
use App\TempUser;
class c_user extends Controller
{
    public function login(Request $req)
    {
    	if(Auth::attempt(['email' => $req->email, 'password' => $req->password]))
    	{
    		$user=Auth::user();
    		return response()->json($user);
    	}
    	else
    	{
    		$user=new user;
    		$user->email=$req->email;
    		$user->password=bcrypt($req->password);
    		$user->name=$req->email;
    		$user->save();
    	}
    }

    public function getLogin()
    {
        return view('pages.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function proFile()
    {
        return view('pages.profile');
    }

    public function editProfile()
    {
        return view('pages.editprofile');
    }

    public function myteam()
    {
       return view('pages.myteam');
    }

    public function postEditprofile(Request $req)
    {
       
    }

    public function register(Request $req)
    {
        $temp=new TempUser;
        $temp->email=$req->email;
        $temp->password=$req->password;
        $temp->name=$req->name;
        $temp->code=base64_encode(base64_encode(time()));
        $temp->save();
    }


    public function ajaxGetEmail(Request $req)
    {
        $users = DB::table('users')->where('email', '=', $req->email)->get();
        echo  $users->count();
    }
}

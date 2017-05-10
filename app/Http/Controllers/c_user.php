<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\user;
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
}

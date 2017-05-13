<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,DB;
use App\User;
use App\TempUser;
use Mail;
class c_user extends Controller
{
    public function login(Request $req)
    {
    	if(Auth::attempt(['email' => $req->email, 'password' => $req->password]))
    	{
    		$user=Auth::user();
    		return redirect('home');
    	}
    	else
    	{
    		return redirect('login')->with(['loi'=>'password or email incorrect!']);
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
        $t=TempUser::find($req->email);
        $code='';
        if(isset($t))
        {
            $t->email=$req->email;
            $t->password=$req->password;
            $t->name=$req->name;
            $t->code=base64_encode(base64_encode(time()));
            $t->save();
            $code=$t->code;
        }
        else
        {
            $temp=new TempUser;
            $temp->email=$req->email;
            $temp->password=$req->password;
            $temp->name=$req->name;
            $temp->code=base64_encode(base64_encode(time()));
            $temp->save();
            $code=$temp->code;
        }

        //gửi mail xác nhận
        
        $data=$req->toArray();
        $data['link']=$_SERVER['REDIRECT_URL'].'/comfirm?code='.$code.'&email='.$req->email;
        Mail::send('email.email',$data, function ($message) use ($data){
            $message->from('phamtuananh1110@gmail.com', 'dayday');
          
            $message->to($data['email'],$data['name']);

            $message->replyTo('phamtuananh1110@gmail.com', 'dayday');
        
            $message->subject('kích hoạt tai khoản');
        });


        return redirect('notification');
    }


    public function ajaxGetEmail(Request $req)
    {
        $users = DB::table('users')->where('email', '=', $req->email)->get();
        echo  $users->count();
    }

    public function registerComfirm(Request $req)
    {
        $tempuser=TempUser::find($req->email);
        if(isset($tempuser)&&$tempuser->code===$req->code)
        {
            
            $user=new User;
            $user->name=$tempuser->name;
            $user->email=$req->email;
            $user->password=bcrypt($tempuser->password);
            $user->level=0;
            $user->save();
            $tempuser->delete();
            Auth::login($user);
            return redirect('home');
        }
        else
        {
            return view('pages.404');
        }
    }

    public function forgotpassword(Request $req)
    {
        
    }
}

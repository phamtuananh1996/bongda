<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,DB;
use App\User;
use App\TempUser;
use Mail;
use Hash;
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
        if(Auth::check())
        {
            return redirect('home');
        }
        else
        {
             return view('pages.login');
        }
       
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
       dd($req);
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


        return redirect('notification')->with(['note'=>'đăng ký']);
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
            $user->emailaddress=$req->email;
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
        $user=User::where('email',$req->email);
        if($user->count()>0)
        {
            $u=User::find($user->first()->id);
            $u->codeforgotpassword=md5(base64_encode(time()));
            $u->save();
            $data=$req->toArray();
            $data['link']=$_SERVER['REDIRECT_URL'].'/comfirm?code='. $u->codeforgotpassword.'&email='.$req->email;
            Mail::send('email.forgotpassword', $data, function ($message) use ($data){
                $message->from('phamtuananh1110@gmail.com', 'dayday');
          
                $message->to($data['email']);

                $message->replyTo('phamtuananh1110@gmail.com', 'dayday');
        
                $message->subject('Link change password');
            });

            return redirect('notification')->with(['note'=>'thay đổi mật khẩu']);
        }
        else
        {
            return redirect('404');
        }
    }

    public function forgotpasswordComfirm(Request $req)
    {
        $user=User::where('email',$req->email);
        if($user->count()==0)
        {
            return redirect('404');
        }
        if($req->code===$user->first()->codeforgotpassword&&$user->count()>0)
        {
            return view('pages.changepassword',['email'=>$req->email]);
        }
        else
        {
            return redirect('404');
        }
    }
    public function changePassword(Request $req)
    {
        $user=User::where('email',$req->email);
        if($user->count()==0)
        {
            return redirect('404');
        }
        else
        {
            $u=User::find($user->first()->id);
            $u->password=bcrypt($req->password);
            $u->save();
            return redirect('login');
        }
    }


    public function change_password(Request $req)
    {
        $user=User::find($req->id);
         if(Hash::check($req->oldpassword,$user->password))
        {
            $user->password=bcrypt($req->password);
            $user->save();
            Auth::logout();
             return redirect('login');
        }
        else
        {
            return redirect('404');
        }
    }

    public function ajaxCheckPass(Request $req)
    {
        $user=User::find($req->id);
        if(Hash::check($req->oldpass,$user->password))
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }

    public function ajaxCheckposition(Request $req)
    {
        if(!empty($req->latitude) && !empty($req->longitude)){
    //Send request and receive json data by latitude and longitude
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($req->latitude).','.trim($req->longitude).'&sensor=false';
            $json = @file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;
            if($status=="OK"){
        
                $location = $data->results[0]->formatted_address;
            }else{
                $location =  '';
            }
    
            echo $location;
        }
    }

    public function profile_friend(Request $req)
    {
        if($req->id==Auth::user()->id)
        {
            return redirect('profile'); 
        }
        else
        {
            $friend=User::find($req->id);
            return view('pages.profile_friend',['friend'=>$friend]);
        }
    }
}

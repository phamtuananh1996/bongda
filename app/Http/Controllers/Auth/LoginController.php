<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Socialite,Auth;
use App\User;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
        $us = DB::table('users')->where('provider_id', '=',$user->id )->get();
        
        if($us->count()==1)
        {
            $user=User::find($us->first()->id);
            Auth::login($user);
            return redirect('home');
        }
        else
        {
            $u=new User;
            $u->name=$user->name;
            $u->email=$user->id.'@email.com';
            $u->password=$user->token;
            $u->avatar=$user->avatar;
            $u->level=0;
            $u->provider='facebook';
            $u->provider_id=$user->id;
            $u->save();
             Auth::login($u);
            return redirect('home');
        }
    }
}

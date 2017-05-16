<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class c_post extends Controller
{
    public function post(Request $req)
    {
    	if(!empty($req->content) && !empty($req->phone) &&!empty($req->place))
    	{
    		$post=new Post;
    		$post->content=$req->content;
    		$post->phone=$req->phone;
    		$post->place=$req->place;
    		$post->user_id=Auth::user()->id;
    		$post->phone=$req->phone;
    		$post->latitude=$req->latitude;
    		$post->longtitude=$req->longtitude;
    		$post->save();
    		return redirect('home');
    	}
    	else
    	{
    		return redirect('404');
    	}
    }

    public function ajaxData()
    {
       $post=Post::orderby('id','desc')->paginate(5);
        return view('ajax.newsfeed',['post'=>$post]);
    }
}

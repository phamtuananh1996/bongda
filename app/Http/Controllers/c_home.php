<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class c_home extends Controller
{
    public function home()
    {
    	$post=Post::orderby('id','desc')->get();
    	return view('pages.newsfeed',['post'=>$post]);
    }
}

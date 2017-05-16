<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class c_home extends Controller
{
    public function home()
    {
    	$post=Post::orderby('id','desc')->paginate(5);
    	return view('pages.newsfeed',['post'=>$post]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
class c_comment extends Controller
{
    public function ajaxComment(Request $req)
    {
    	if(!empty($req->content))
    	{
    		$comment=new Comment;
    		$comment->user_id=Auth::user()->id;
    		$comment->post_id=$req->post_id;
    		$comment->content=$req->content;
    		$comment->save();
    		return "true";
    	}
    }
}

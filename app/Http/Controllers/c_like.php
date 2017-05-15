<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
class c_like extends Controller
{
    public function ajaxLike(Request $req)
    {

    	$like=new Like;
    	$like->user_id=Auth::user()->id;
    	$like->post_id=$req->post_id;
    	$like->save();
    	return 'true';
    }

    public function ajaxDislike(Request $req)
    {
    	$like=Like::where(['user_id'=>Auth::user()->id,'post_id'=>$req->post_id])->first();
    	$id=$like->id;
    	$dislike=Like::find($id);
    	$dislike->delete();
    	return 'true';
    }
}

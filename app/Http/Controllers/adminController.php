<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class adminController extends Controller
{
    

    public function postnoApprove()
    {
    	 $posts = Post::all();
    	 //  return view('content.postno','posts' => $posts) );
    	  return view ('content.postno',compact('posts'));
    }

   public function postApprove(Request $request)
   {

   $post=Post::where('id',$request['id'])->first();
      if($post)
       {
        $post->accpet = 1;
        $post->save();
       
      } 
      return view ('content.postno');
  }
}

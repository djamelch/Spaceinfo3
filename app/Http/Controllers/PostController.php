<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostController extends Controller
{
  public function edit($id)
  {
   $post=Post::find($id);
   return view ('content.edit',['post'=>$post]) ; 
  }
   public function update (Request $request , $id)
  {
  	 $post=Post::find($id);
     $post->title=$request->input ("title");
     $post->body = $request ->input("body");
     $post->user_id=Auth::user()->id;
     $post->save();
     return redirect('home');
  } 
   public function destroy(Request $request,$id)
  {
  	$post=Post::find($id);
    $post->delete();
    return redirect('home');
  }
}

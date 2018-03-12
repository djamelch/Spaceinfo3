<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class adminController extends Controller
{
    

    public function postnoApprove()
    {
    	 $posts = Post::all();
    	 //  return view('content.postno','posts' => $posts) );
    	  return view ('content.postno',array('posts' => $posts));
    }


   public function postApprove(Request $request)
   {
    
  // $post = Post::findOrFail($id);
      $post=Post::where('id',$request['id'])->first();
      if($post)
       {
        $post->accpet = 1;
        $post->save();
       
      } 
      return redirect('admin/approve/');
   }


    public function post(Post $post)
    {
     // $post=Post::where('id',$request['id'])->first();
     // $post =DB::table('posts')->find(); 

      $post=Post::where('id',$post['id'])->first();
      return view ('content.post', array('post' => $post));
    }

  public function destroy(Request $request,$id)
  {
    $post=Post::find($id);
    $post->delete();
    return redirect('admin/approve/');
  }
}

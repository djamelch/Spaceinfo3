<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;


//use App\Auth; 

class CommentsController extends Controller
{
    //

   public function store(Post $post,User $user)
   {
     
      // $comment =Comment::create([

       // 'body'   =>request('body'),
       // 'post_id'=>$post->id,
       // 'user_id'=>$user->id ,

      // ]);

        $comment     = new Comment;   
      
         $comment->body = request ("body");
         $comment->post_id=$post->id;
         $comment->user_id=$user->id;
         $comment->save();
         
      return redirect('/home');
   
}
}
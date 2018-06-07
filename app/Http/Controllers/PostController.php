<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\File;

use Auth;
class PostController extends Controller

 {
  public function post($id)
  {
   $post=Post::find($id);
   return view ('content.post',['post'=>$post]) ; 
  }


  public function edit($id)
  {
   $post=Post::find($id);
   return view ('content.edit',['post'=>$post]) ; 
  }

   public function update (Request $request , $id)
  {
  	 $post=Post::find($id);

   //  $post->title=$request->input ("title");
       $post->body =$request ->input("body");
       $post->accpet = "0" ;
         

   
       if ($request->hasFile('images'))
       // dd($request->all());
           
         {
           foreach ($request->images as $photo) 
           
          {
            $image=new Image;
          
            $image->url_image = $photo->store('images');
          
            $image->save();
            }
        }


        if ($request->hasFile('file'))

       {
           foreach ($request->file as $file) 
          {
             $file=new File;
            
         
             
             $filename = time().'.'.$request->file->getClientOriginalExtension();
     
          
             $request->file->move(public_path('storage\files'), $filename);

             $file->url_file=$filename;
             $file->save();
            }
       }

           $post->save(); 
         return redirect('/home');
  } 
  
   public function destroy(Request $request,$id)
  {
  	$post=Post::find($id);
    $post->delete();
    return redirect('home');
  }
}

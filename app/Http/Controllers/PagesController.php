<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post ;
use DB;
class PagesController extends Controller
{
    //

      // tjib kamel les publication

    public function posts ()
    {
       
      $posts = Post::all(); // tjib kamel pub
    	
      return view ('content.posts', compact('posts')); // twajahena l page posts w compact tjibana les donne
    }

      // bach njibo  un sule publication 

    public function post($id)
    {
      $post =DB::table('posts')->find($id); // njibo post men db b id ta3ha 

    return view ('content.post', compact('post'));
    }

      //bach ndakhlo bup jdida 

    public function store()
{   

    $this ->validate(request(),[
     
     'title'=>'required|max:15|min:3',
     'body' => 'min:5',
     


      ]);
    $file_name = time().'.'.request->url->getClienOriginalExtention();

     $post = new Post;    //Model
     $post->title=request ("title");
     $post->body= request ("body");
     $post->url=  request ("url");

     $post -> save();  


    return redirect('/posts'); 
    }
  }

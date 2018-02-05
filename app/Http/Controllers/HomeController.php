<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
     $posts = Post::all(); // tjib kamel pub
        
      return view ('content.home', compact('posts')); // twajahena l page posts w compact tjibana les donne
    }


     public function store(Request $request)
{   

    $this ->validate(request(),[
     
     'title'=>'required|max:15|min:3',
     'body' => 'min:5',
     


      ]);

   

     $post       = new Post;    //Model
     $post->title=request ("title");
     $post->body = request ("body");
     
       


      if ($request->hasFile('url')) {
        $post->url = $request ->url->store('images');
        }


     $post->save();  

     
    
    return redirect('/home'); 
    }


    public function admin ()
    {
      return view ('content.admin');
    }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Role;
use Auth;
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

   
        
          $post       = new Post;   
          $post->title=request ("title");
          $post->body = request ("body");
          $post->user_id=Auth::user()->id;
       
        
        if ($request->hasFile('url')) 
        {
             $post->url = $request ->url->store('images');
        }

           $post->save(); 
         return redirect('/home');
    }




       // page admin
    public function admin ()
    {
        $users=User::all();

        return view ('content.admin',compact('users'));
    }


         //tahdid adwar 
     public function addRole (Request $request)
    {
        $user=User::where('id',$request['id'])->first();//jibli user li id ta3ah hiya id li jaya f request
        $user->roles()->detach();

        if($request['role_user'])
        {
         
        $user->roles()->attach( Role::Where('name','User')->first());
        }
         if($request['role_editor'])
        {

        $user->roles()->attach(Role::Where('name','Editor')->first());
        }

         if($request['role_admin'])
        {

        $user->roles()->attach(Role::Where('name','Admin')->first());
        }
     return view ('content.admin',compact('users'));
    }
}



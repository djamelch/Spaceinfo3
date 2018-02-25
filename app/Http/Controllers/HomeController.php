<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Role;
use App\Image ;
use App\File ;
use Auth;
use App\Comment;
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
            $comments= Comment::all();
           return view ('content.home', compact('posts')); // twajahena l page posts w compact tjibana les donne
    }


     public function store(Request $request)
    {   

       
           $this ->validate(request(),[
     
             'title'=>'min:3',
             'body' => 'min:5',
     
      ]);
           $this->validate($request, [
    
    'images.*' => 'image|mimes:jpeg,png,jpg,gif',
]);

   
        
          $post       = new Post;   
          $post->title=request ("title");
          $post->body = request ("body");
          $post->user_id=Auth::user()->id;
      
          $post->save(); 

   
       if ($request->hasFile('images'))
       // dd($request->all());
           $files = $request->file('images');
         {
           foreach ( $files as $photo) 
           
          {
            $image=new Image;
            $image->post_id=$post->id;
            $image->url_image = $photo->store('images');
          
            $image->save();
            }
        }


        if ($request->hasFile('file'))
       {
           foreach ($request->file as $file) 
          {
             $file=new File;
             $file->post_id=$post->id;
         
             
             $filename = time().'.'.$request->file->getClientOriginalExtension();
     
          
             $request->file->move(public_path('storage\files'), $filename);

             $file->url_file=$filename;
             $file->save();
            }
       }

          
         return redirect('/home');
    }
    public function download($id )
    {
       $file=File::find($id);
       $filename=$file->url_file;
      
    
       //$pathToFile=public_path('storage\files'.$f);
       // return response()->download($pathToFile);
       $file_path= public_path(). "/storage/files/".$filename;

$headers = array(
        'Content-Type: ' . mime_content_type( $file_path ),
    );
    return response()->download($file_path,$filename,$headers);
    }



  
       // if ($request->hasFile('url')) 
       // {
         //    $post->url = $request ->url->store('images');
       // }
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
        //$user->roles()->detach();

        if($request['role_user'])
        {
         
        $user->roles()->attach( Role::Where('name','User')->first());
        $user->save();
        }
         if($request['role_editor'])
        {

        $user->roles()->attach(Role::Where('name','Editor')->first());
        $user->save();
        }

         if($request['role_admin'])
        {

        $user->roles()->attach(Role::Where('name','Admin')->first());
        $user->save();
        }
        $user->save();
      return redirect('/admin');
    }
}



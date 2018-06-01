<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use DB;
use Illuminate\Pagination\Paginator;
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

           $posts = Post::orderBy("updated_at",'desc')->paginate(4);
          
           $comments= Comment::all();
            
           return view ('content.home', compact('posts')); 
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
          $post->public = request ("public");
          $post->user_id=Auth::user()->id;
          $post->for_level = request ("level");
          $post->for_section = request ("section");

          $post->save(); 

   
       if ($request->hasFile('images'))
       // dd($request->all());
          
         {
           foreach ($request->images as $photo) 
           
          {
            $image=new Image;
            $image->post_id=$post->id;
           // $image->url_image = $photo->store('images');
             $image->save();
           $filename=$image->id
                             .'_'
                             .preg_replace('/([^A-Za-z])+/', '-', trim($post->title))
                             .'.'
                             .strtolower($photo->getClientOriginalExtension());
            $photo->move(public_path('storage\images'), $filename); 
             $image->url_image=$filename;               
          
            $image->save();
            }
        }


        if ($request->hasFile('file'))
       {
           
             $files=new File;
             $files->post_id=$post->id;
         
             
             $filename = time().'.'.$request->file->getClientOriginalExtension();
             //$files->url_file =$request->file->store('files');
          
            $request->file->move(public_path('storage\files'), $filename);
            $files->url_file=$filename;
            
             $files->save();
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
        'Content-Type: ' . mime_content_type( $file_path ) ,
    );
    return response()->download($file_path,$filename,$headers);
    }



  
       
    public function admin ()
    {
        $users=User::all();

        return view ('content.admin',compact('users'));
    }


         //tahdid adwar 
     public function addRole (Request $request,$id)
    {
      
       
        $user=User::find($id); 
        $user->roles()->detach();

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



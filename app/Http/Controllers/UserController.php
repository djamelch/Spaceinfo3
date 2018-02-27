<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use Auth;
use App\Post;
class UserController extends Controller
{
    //
    public function profile(){
        $posts = Post::orderBy("updated_at",'desc')->paginate(4);
        return view('content.profile', array('user' => Auth::user(),'posts' => $posts) );

    }

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
             
        // rename image name or file name 
        $getimageName = time().'.'.$request->avatar->getClientOriginalExtension();
     
        $request->avatar->move(public_path('storage\images'), $getimageName);
       

            

            
            $user = Auth::user(); 
            $user->avatar = $getimageName;
            $user->save();
            
    }
            $posts = Post::orderBy("updated_at",'desc')->paginate(4);
          
        
           return view ('content.profile',['posts' => $posts,'user' => $user]);

    // return redirect('/profile');
  
}

}
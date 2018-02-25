<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	  // himayt modkhalat ta3 post
    protected $fillable =[
     
    'title','body','url'

    ]; 

    // rabt comment bi post
    
  
   public function comments(){
        return $this->hasMany(Comment::Class);
    }

  
   public function files(){
        return $this->hasMany(File::Class);
}
  
   public function images(){
        return $this->hasMany(Image::Class);
    }
    //kol post tamlik user wahid
   public function user (){
        return $this->belongsTo(User::Class);

        }

  
}

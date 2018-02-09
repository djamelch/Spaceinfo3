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
    
   public $table = "posts";
   public function comments(){
        return $this->hasMany(Comment::Class);
    }

    //kol post tamlik user wahid
   public function user (){
        return $this->belongsTo(User::Class);

        }
}

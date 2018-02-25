<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	  protected $fillable =[
     
    'url_post','post_id'

    ]; 
   public function post (){
      	
    return $this->belongsTo(Post::Class);

      }
}

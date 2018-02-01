<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	  // himayt modkhalat ta3 post
    protected $fillable =[
     
    'title','body','url'

    ]; 

}

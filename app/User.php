<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Comment;
use App\User;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        //rabt ma3a comments ta3ah
   
    public function comments(){
        return $this->hasMany(Comment::Class);
    }
       //ravt ma3a posts ta3ah
   
    public function posts(){
        return $this->hasMany(Post::Class);
    }

    public function roles(){
      
      return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }



    public function hasAnyRole($roles)
    {
        if (is_array ($roles))
        {
             foreach ($roles as $role) {
                if($this->hasRole($role))
                {
                    return true ;
                }
             }
        }
        else
        {
            if($this->hasRole($roles))
                {
                    return true ;
                }
        }
    }

     public function hasRole($role)
    {
       if($this->roles()->where('name',$role)->first())
       {
        return true;
       }
       return false;
    }
}

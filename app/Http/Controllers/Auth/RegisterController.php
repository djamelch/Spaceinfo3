<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    


    public function __construct()
    {
        $this->middleware('guest');

   }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()) {
            $thisUser = $this->create($input)->toArray();
            return redirect()->back()->with('msg' , '<div role="alert" class="alert alert-success">Well Done. Please wait untile admin to approve your request. </div>');
  
        }

        return redirect()->back()->with('msg' , '<div role="alert" class="alert alert-danger">'.$validator->errors()->first().'</div>');

    }
     
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'first_name' => $data['group'],
            'email' => $data['email'],
            'matricule' => $data['group'],
            'level' => $data['level'],
            'section' => $data['section'],
            'group' => $data['group'],

            'password' => bcrypt($data['password']),
            
        ]);

        

         // ki ysaje tkon role ta3ah User

        $userRole = Role::Where('name','User')->first();

        $user->roles()->attach($userRole);
         
        
        return $user;

    }
}

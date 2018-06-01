@extends('index')



@section('content')

      <div class="container">
        <div class="row">
      
<div class="col-md-12">

               <div >
   <table class="table table-hover">
            <tr>

                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>user</th>
                <th>editor</th>
                <th>admin</th>
             </tr>
         @foreach($users as $user)
           <form method='post' action="{{url('add_role/'.$user->id)}}">
                {{ csrf_field () }}
                

                    <input type="hidden" name="id" value='{{$user->id}}'>
               <tr>

                  <th>{{$user->id}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>

                  <td> 
                     <input type ='checkbox' name='role_user' onchange="this.form.submit()" {{$user->hasRole('User') ? 'checked' : ' '}} >
                  </td>

                  <td>
                    <input type ='checkbox' name='role_editor' onchange="this.form.submit()"{{$user->hasRole('Editor') ? 'checked' : ' '}} > 
                  </td>

                  <td>
                    <input type ='checkbox' name='role_admin' onchange="this.form.submit()" {{$user->hasRole('Admin') ? 'checked' : ' '}} > 
                 </td>
                
                 </form>

                   <!--delete posts -->
                  @if(Auth::user())
                  <td>
                  ------
                  </td>
                  @else
                  
                <td>
                  <form method='POST' action="{{route('users.destroy', $user->id)}}"> 
                     {{ csrf_field () }}
                     {{ method_field ('DELETE') }} 

                      <button type='submit' class="btn btn-danger"><i class="fa fa-file-image-o" aria-hidden="true"></i> suprimmer</button>
                  </form>
                 </td>
                  @endif
               </tr> 
           
             @endforeach
    </table>
                 
                
         

 </div>


 </div></div>
 


 @endsection
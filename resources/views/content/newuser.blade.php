@extends('index')

@section('content')


   <div class="row">
      
    <div class="col-md-12">

               
   <table class="table table-hover">
            <tr>

                <th>id</th>
        
                <th>name</th>
                <th>accpeter_user</th>
                
             </tr>
             @foreach($users as $user)
             @if($user->status===0)
             <tr>

             <th>{{$user->id}}</th>
             <th>{{$user->name}}</th>
             
             <form method='post' action="{{route('users.approve', $user->id)}}">
             {{ csrf_field () }}
             
                <input type="hidden" name="id" value='{{$user->id}}'>

                <td> 
                 <button type="submit" class="btn btn-success">accpte</button>
                </td>

             </tr> 
             </form>
             @endif
             @endforeach
    </table>
                 
                
         

 </div>


 </div></div>
 


 @endsection
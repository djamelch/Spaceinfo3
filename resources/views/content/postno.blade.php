@extends('index')

@section('content')

 <div class="container">
   <div class="row">
      
    <div class="col-md-12">

               
   <table class="table table-hover">
            <tr>

                <th>id</th>
                <th>title</th>
                <th>post</th>
                <th>accpeter_post</th>
                
             </tr>
             @foreach($posts as $post)
             <tr>

             <th>{{$post->id}}</th>
             <th>{{$post->title}}</th>
             <th><a>tses post</a></th>


             <form method='post' action="{{url('admin/postaccpet/'.$post -> id)}}">
             {{ csrf_field () }}
                <input type="hidden" name="id" value='{{$post->id}}'>
                <td> 
                 <button type="submit" class="btn btn-success">accpte_post</button>
                </td>

             </tr> 
             <form>
             @endforeach
    </table>
                 
                
         

 </div>


 </div></div>
 


 @endsection
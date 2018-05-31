@extends('index')

@section('content')


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
             @if($post->accpet===0 && public === null)
             <tr>

             <th>{{$post->id}}</th>
             <th>{{$post->title}}</th>
             <th><a class="btn btn-primary" href="/admin/{{$post->id}}">view post <span class="glyphicon glyphicon-chevron-right"></span></a></th>

      
             <form method='post' action="{{route('posts.approve', $post->id)}}">
             {{ csrf_field () }}
             
                <input type="hidden" name="id" value='{{$post->id}}'>

                <td> 
                 <button type="submit" class="btn btn-success">accpte_post</button>
                </td>

             </tr> 
             </form>
             @endif
             @endforeach
    </table>
                 
                
         

 </div>


 </div></div>
 


 @endsection
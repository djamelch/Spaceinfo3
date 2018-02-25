@extends('master')



@section('content')

<div class="col-md-12">

                <h1 class="page-header">
                    
                    <small>Post</small>
                </h1>


                <!-- First Blog Post   <img class="img-responsive" src="storage/images/{{$image->url_image}}" alt="">-->
                <h2>
                    <a href="/posts/{{$post->id}}">{{$post -> title}}</a>
                </h2>
                 
                <p class="lead">
                    by <a href="index.php">katib</a>
                </p>
                   

                <hr>
                <img class="img-responsive" src="{{asset('storage/'.$post->url)}}" alt="">
                <hr>
                <p>{{$post -> body}}</p>
                <hr>

                  <div class="comments">
               @foreach ($post->comments as $comment)

                 <p>{{$comment-> body}}</p>

               @endforeach
                      
                  </div>


                 <form method="POST" action="/posts/{{$post->id}}/store"  >

                    {{ csrf_field () }}

                    

                    <div class="form-group">
                      <label for="body">add comment:</label>
                       <textarea class="form-control" name="body"  rows="5" placeholder="add posts" ></textarea>
                    </div>

                    
                    <button type="submit" class="btn btn-default">add comment</button>
                </form>
 </div>


 @endsection

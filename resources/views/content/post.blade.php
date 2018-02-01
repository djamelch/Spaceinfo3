@extends('master')



@section('content')

<div class="col-md-12">

                <h1 class="page-header">
                    
                    <small>Post</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="/posts/{{$post->id}}">{{$post -> title}}</a>
                </h2>
                 
                <p class="lead">
                    by <a href="index.php">katib</a>
                </p>
                   

                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{{$post -> body}}</p>
               

                <hr>
 </div>


 @endsection

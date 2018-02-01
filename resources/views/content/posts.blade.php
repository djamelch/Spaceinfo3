@extends('master')



@section('content')

<div class="col-md-12">

                <h1 class="page-header">
                    
                    <small>Posts</small>
                </h1>

                <!-- First Blog Post -->
               
     @foreach($posts as $post)
                <h2>
                    <a href="/posts/{{$post->id}}">{{$post -> title}}</a>
                </h2>
                 
                <p class="lead">
                    by <a href="index.php">katib</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span>

                 Posted on {{$post->created_at ->toDayDateTimeString()}}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{{$post -> body}}</p>
                <a class="btn btn-primary" href="/posts/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
     @endforeach             


                <hr>

                <form method="POST" action="/posts/store">

                    {{ csrf_field () }}

                    <div class="form-group">
                      <label for="title">Title:</label>
                       <input type="text" class="form-control" name="title" placeholder="add titel">
                    </div>

                    <div class="form-group">
                      <label for="body">add post:</label>
                       <textarea class="form-control" name="body"  rows="5" placeholder="add posts" ></textarea>
                    </div>

                    <div class="form-group">
                      <label for="">add file :</label>
                       <input type="file" class="form-control" name="url" id="url"  >
                    </div>
                    <button type="submit" class="btn btn-default">add</button>
                </form>

               <!-- Pager 
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
                 -->
 </div>


 @endsection
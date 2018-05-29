@extends('index')



@section('content')

<div class="col-md-12">

                
            <div class="panel panel-default post">
              <div class="panel-body">
                <div class="row">
     
                  <div class="col-sm-2">
                         <a 
                         class="post-avatar thumbnail" href="/profile"><img src="storage/images/{{$post->user->avatar}}" class="text-center"> {{$post->user->name}}</a>
                
                     <!--col-sm-2 ends -->
                  </div>



                      @if (count($errors) > 0)
                         <div class="alert alert-danger">
                             <strong>Whoops!</strong> There were some problems with your input.<br><br> 
                             <ul>
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                      @endif


                  <div class="col-sm-6">
                          <!-- posts -->
                      <h2>
                          <a href="/posts/{{$post->id}}">{{$post -> title}}</a>
                      </h2>
                 
                      <p><span class="glyphicon glyphicon-time"></span>

                         Posted on {{$post->created_at ->toDayDateTimeString()}}</p>

               
                     <p>{{$post -> body}}</p>


                   </div>
                       
                         <!-- image and file -->

                 <div class="pointer-border"></div>
                  
                   </div> 
  
                         @foreach($post->images as $image)
                            <hr>
                              <img class="img-responsive" src="storage/images/{{$image->url_image}}" alt="">

                            <hr>
                         @endforeach
                         

                         @foreach($post->files as $file)
                         <hr>
                           
                            <a href="{{url('home/'.$file->id.'/download')}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> download file</a>
                         <hr>
                         @endforeach


                  </div>
 
                 <div class="col-md-4">
                     <div class="pointer-border">
  
                        <div class="btn-group" role="group" aria-label="Basic example">
                         <div class="col-md-4">
                           <form class="form-inline" method="POST" action="{{url('admin/'.$post -> id.'/distroy')}}">

                             {{ csrf_field () }}
                             {{ method_field ('DELETE') }}
                       
                   

                             <button type='submit' class="btn btn-danger"><i class="fa fa-file-image-o" aria-hidden="true"></i> suprimmer</button>
                           </form>

                           <form method='post' action="{{route('posts.approve', $post->id)}}">
                              {{ csrf_field () }}
             
                             <input type="hidden" name="id" value='{{$post->id}}'>
                             <button type="submit" class="btn btn-success">accpte_post</button>
         
                           </form>
                         </div>
                       </div>
                     </div>
                  </div>

     </div>
 </div>


 @endsection

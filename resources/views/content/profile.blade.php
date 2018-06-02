@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <img src="storage/images/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                  {{ csrf_field () }}
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form> 
            <hr>
           
            
             
            
             <hr>
           <div class="table table-responsive">
            <table class="table table-bordered" id="table">
              <tr>

                
                <th>name</th>
                <th>first name</th>
                <th>email</th>
                <th>matricule</th>

             @if(Auth::user()->level != null)
                <th>level</th>
                <th>section</th>
                <th>group</th>
             @endif
              </tr>

               <tr>

                  
                  <td>{{Auth::user()->name}}</td>
                  <td>{{Auth::user()->first_name}}</td>
                  <td>{{Auth::user()->email}}</td>
                  <td>{{Auth::user()->matricule}}</td>
                  
               @if(Auth::user()->level != null)
                  <td>{{Auth::user()->level}}</td>
                  <td>{{Auth::user()->section}}</td>
                  <td>{{Auth::user()->group}}</td>
               @endif
                  
                  <td>
           
            <a href="#" class="edit-modal btn btn-warning btn-sm"  data-title="{{Auth::user()->name}}" data-body="{{Auth::user()->first_name}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
          
          </td>
               </tr>

            </table >
               
              <hr>

              <!-- Modal Form Edit and Delete Post -->
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">
        
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="name">Name</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="t">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="first_name">First Name</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="b">
            </div>
          </div>
          </div>
          </div>
          </div></div>
             <hr>



             <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Wall</h3>
              </div>
              <div class="panel-body">
              
                <form method="POST" action="/home/store"  enctype="multipart/form-data">
                      {{ csrf_field () }}
                  <div class="form-group">
                      <label for="title">Title:</label>
                       <input type="text" class="form-control" name="title" placeholder="add titel">
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" name="body"  placeholder="Write on the wall "></textarea>

                  </div>
                    
                     <div class="col-sm-4" style="margin-bottom:20px;">
                      <label class="btn-bs-file btn btn-primary">
                        add image
                       <input type="file" name='images[]' multiple>
                      </label>
                  
                    </div>
                     <div class="col-sm-4" style="margin-bottom:20px;">
                      <label class="btn-bs-file btn btn-primary">
                        add file
                       <input type="file" name='file'>
                      </label>
                  
                    </div>

                  <button type="submit" class="btn btn-success">Submit</button>
                  </form>
                  
                  
                
              </div>
            </div>
             


            @foreach($posts as $post)
                 @if((Auth::user()->id)===($post->user->id))
            <div class="panel panel-default post">
              <div class="panel-body">
                <div class="row">

                     
                  <div class="col-sm-2">
                    <a class="post-avatar thumbnail" href="/profile"><img src="storage/images/{{$post->user->avatar}}" class="text-center"> {{$post->user->name}}</a>
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
                  <div class="col-sm-10">
                          <!-- posts -->

                <h2>
                    <a href="/posts/{{$post->id}}">{{$post -> title}}</a>
                </h2>
                 
               <!-- <p class="lead">
                    by <a href="index.php">katib</a>
                </p>  -->

                <p><span class="glyphicon glyphicon-time"></span>

                    Posted on {{$post->created_at ->toDayDateTimeString()}}</p>

                    <div class="bubble">
                      <div class="pointer">
                        <p>{{$post -> body}}</p>
                      </div>
                       

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




                    <div class="pointer-border">
                    <!-- bubble end -->
                        <div class="form-group">
                         <div class="panel-body">
                      
                     @if(Auth::user()->hasRole('Admin'))
                    
                    <form class="form-inline" method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">

                      {{ csrf_field () }}
                       {{ method_field ('DELETE') }}
                        <a href="{{url('home/'.$post -> id.'/edit')}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> modifer</a>
                   

                      <button type='submit' class="btn btn-danger"><i class="fa fa-file-image-o" aria-hidden="true"></i> suprimmer</button>
                      </form>
                      @else
                     @if((Auth::user()->id)===($post->user->id))
                    
                       <form class="form-inline" method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">

                         {{ csrf_field () }}
                        {{ method_field ('DELETE') }}
                        <a href="{{url('home/'.$post -> id.'/edit')}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> modifer</a>
                     
                      <button type='submit' class="btn btn-danger"><i class="fa fa-file-image-o" aria-hidden="true"></i> suprimmer</button>
                      </form>
                     @endif
                      @endif


                    </div>
                    
                    </div>
                    </div>
                   
                   
                    
                 



                          <!-- add commenters-->
                    <p class="post-actions"><a href="#">Comment</a> - <a href="#">Like</a> - <a href="#">Follow</a> - <a href="#">Share</a></p>
                    <div class="comment-form">

                      <form class="form-inline" method="POST" action="/home/{{$post->id}}/user/{{Auth::user()->id }}/store">
                           {{ csrf_field () }}

                        <div class="form-group">
                          <input type="text"  name="body" class="form-control" id="exampleInputName2" placeholder="Enter Comment">
                        </div>

                        <button type="submit" class="btn btn-default">Add</button>
                      </form>
                    </div><!-- comment form ends -->

                      <!--  --> 

                    <div class="clearfix"></div>

                             @foreach ($post->comments as $comment)
                    <div class="comments"> <a class="comment-avatar pull-left" href=""><img src="storage/images/{{$comment->user->avatar}}">{{$comment->user->name}}</a>
                      <div class="comment">
                       
                        <div class="comment-text">
                          <p>{{$comment-> body}}</p>
                          
                        </div>

                      </div>
                      <p><span class="glyphicon glyphicon-time"></span>

                          {{$comment->created_at ->toDayDateTimeString()}}</p>
                      <div class="clearfix"></div>
                    </div>
                    @endforeach
                  </div>
              </div>
            </div>
          </div>
           @endif
           @endforeach
         
         <div class="raw text-center">
         {!!$posts->render()!!}

         </div>
        </div>
    </div>
</div>

@endsection


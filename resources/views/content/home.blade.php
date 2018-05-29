@extends('index')



@section('content')

 
 <div class="container">
    <div class="row">
       <div class="col-md-12">
          <div class="panel panel-default">
                   <div class="panel-heading">

                      <!--add posts -->

                     <h3 class="panel-title">Wall</h3>
                   </div>

                   <div class="panel-body">
              
                     <form method="POST" action="/home/store"  enctype="multipart/form-data">

                      {{ csrf_field () }}

                      <div class="form-group">
                          <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" placeholder="add title">
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
                       

                       <tr>

                         <td>
                           level 
                         </td>
                         <td>
                           section 
                         </td>
                           
                          <td> 
                          
                           <input type ='checkbox' name'level' value=" {{Auth::user()->level}}">
                          </td>
                       </tr> 
                         <td> 
                           <input type ='checkbox' name'section' value=" {{Auth::user()->section}}">
                          </td>
                       </tr> 

                    

                      <button type="submit" class="btn btn-success">Submit</button>


                    </form>
                 
                  </div>
                </div>




                <!--show posts -->
               
            @foreach($posts as $post)
               @if($post->accpet === 1)
             
               <div class="panel panel-default post">
                 <div class="panel-body">
                   <div class="row">

                     <!--user_post  -->

                  <div class="col-sm-2">
                    <a class="post-avatar thumbnail" href="/profile"><img src="storage/images/{{$post->user->avatar}}" class="text-center"><h4> {{$post->user->name}}</h4></a>
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

                  	      <!-- posts 
                  	       Auth::user()->group
                     Auth::user()->lavel
                     Auth::user()->section -->

                    <h2>
                      <a href="/posts/{{$post->id}}">{{$post -> title}}</a>
                    </h2>
                          <!--date posts -->
                    <p>
                        <span class="glyphicon glyphicon-time"></span>
                        Posted on {{$post->created_at ->toDayDateTimeString()}}
                    </p>
                          <!--body posts -->
                    <div class="bubble">
                      <div class="pointer">
                        <p>{{$post -> body}}</p>
                      </div>
                       
                    </div> 
                           <!--image post -->
                         @foreach($post->images as $image)
                           <hr>
                             <img class="img-responsive" src="storage/images/{{$image->url_image}}" alt="">
                           <hr>
                         @endforeach
                         
                           <!--file posts -->
                         @foreach($post->files as $file)
                         <hr>                           
                            <a href="{{url('home/'.$file->id.'/download')}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> download file</a>
                         <hr>
                         @endforeach




                          <!--edit and delete post -->
                  <div class="form-group">
                     <div class="panel-body">
                                 <!--user is admin -->
                         @if(Auth::user()->hasRole('Admin'))
                    
                           <form class="form-inline" method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">
                             {{ csrf_field () }}
                             {{ method_field ('DELETE') }}
                                  <!--edit posts -->
                             <a href="{{url('home/'.$post -> id.'/edit')}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> modifer</a>
                                  <!--delete posts -->
                              <button type='submit' class="btn btn-danger"><i class="fa fa-file-image-o" aria-hidden="true"></i> suprimmer</button>
                           </form>
                         @else
                                 <!--user is not admin -->
                           @if((Auth::user()->id)===($post->user->id))
                                      
                             <form class="form-inline" method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">
                                {{ csrf_field () }}
                                {{ method_field ('DELETE') }}
                                    <!--edit posts -->
                                <a href="{{url('home/'.$post -> id.'/edit')}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> modifer</a>
                                    <!--delete posts -->
                                <button type='submit' class="btn btn-danger"><i class="fa fa-file-image-o" aria-hidden="true"></i> suprimmer</button>
                             </form>
                          @endif
                       @endif

                    </div>                    
                  </div>
          
                   <!--end posts -->
                   
                    
                 



                          <!-- add commenters-->
                  
                    <div class="comment-form">

                      <form class="form-inline" method="POST" action="/home/{{$post->id}}/user/{{Auth::user()->id }}/store">
                           {{ csrf_field () }}

                        <div class="form-group">
                          <input type="text"  name="body" class="form-control" id="exampleInputName2" placeholder="Enter Comment">
                        </div>

                        <button type="submit" class="btn btn-default">Add</button>
                      </form>
                    </div><!-- comment form ends -->

          
                      <!-- show comment --> 

                <div class="clearfix"></div>
                  @foreach ($post->comments as $comment)

                    <div class="comments">
                            <!-- user comment --> 
                     <a class="comment-avatar pull-left" href=""><img src="storage/images/{{$comment->user->avatar}}">{{$comment->user->name}}
                     </a>

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
  </div> 
         <div class="raw text-center">
         {!!$posts->render()!!}

         </div>

          
          
  </div>
 </div>
</div>


    
@endsection
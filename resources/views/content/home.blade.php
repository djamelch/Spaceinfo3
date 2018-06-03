@extends('index')



@section('content')
               <!-- errors -->
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
                <!--end errors -->

                      <!--add posts -->
     
   <div class="col-md-offset-3 col-md-6 col-xs-12">
      <div class="well well-sm well-social-post">

               <!-- begin form -->

           <form method="POST" action="/home/store"  enctype="multipart/form-data">
                   {{ csrf_field () }}

                       <!-- if user is admin or editor -->
                 @if(( Auth::user()->hasRole('Editor'))||( Auth::user()->hasRole('Admin') ))
                   <input type="hidden" value="1" name="public">
                 @endif  <!-- end if user is admin or editor  -->

                      <!-- ul title and body  -->
                    <ul class="list-inline" id='list_PostActions'>
                    
                        <div class="form-group">
                          <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" placeholder="add title">
                        </div>
                        
                        <div class="form-group">
                           <label for="body">Body:</label>
                             <textarea class="form-control" name="body"  placeholder="Write on the wall "></textarea>
                        </div>
                       
                    </ul>  <!-- end ul title and body  -->
                     
                      <!-- ul image and file  -->
                    <ul class='list-inline post-actions'>
                       
                          <!-- add image -->
                       <div class="upload-btnn-wrapper">
                          <i class="fas fa-camera-retro" style="font-size:20px;"></i>
                           <input type="file" name="images[]" accept="image/*" />
                      </div>
                      &nbsp;
                          <!-- add file -->
                        <div class="upload-btnn-wrapper">
                           <i class="fas fa-paperclip" style="font-size:20px;"></i>
                           <input type="file" name="file" />
                       </div>
                        
                    </ul>  <!-- end ul image and file  -->

                           <!--  ul audience  -->
                    <ul class='list-inline post-actions'>
                      
                      Audience: 
                      <div class="form-check form-check-inline">
                           
                          <label class="form-check-label" for="inlineCheckbox1">{{Auth::user()->level}}
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"  name='level'>
                          </label>
                     
                     
                         
                          <label class="form-check-label" for="inlineCheckbox2">{{Auth::user()->section}}
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name='section'>
                          </label>
                    
                   
                         
                          <label class="form-check-label" for="inlineCheckbox3">{{Auth::user()->group}}
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" checked disabled>
                          </label>
                    </div>

                    </ul>  <!-- end ul Audience  -->


                       <button type="submit"  class="btn btn-primary btn-xs pull-right" value="Submit">Share</button>
                

                 </form>  <!-- end form  -->
                 
                
        </div>
    </div> <!-- End Post editor -->

  <!-- *********************************************************** -->                

        <!--  *********   show posts ***********  -->
               
 @foreach($posts as $post) <!-- begin foreach post  -->
          

        <!-- First Post type form -->
  <div class=" col-md-offset-3 col-md-6 col-xs-12">
      <section class="widget">
               
        <div class="widget-body">
                <div class="widget-top-overflow windget-padding-md clearfix bg-info ">  
                        <!-- h3 show the title of the post -->
                        <a href="/home/posts/{{$post->id}}"><h3 class="mt-sm fw-normal text-white">{{$post -> title}}</h3></a>        
                </div>

                <div class="post-user mt-n-lg">
                    <span class="thumb-lg pull-left mr">

                            <!-- show the avatat of the post owner -->
                        <img class="img-circle" src="storage/images/{{$post->user->avatar}}" class="text-center">
                    </span>

                        <!-- h5 recover the name of the post sharing -->
                        <h5 class="mt-sm fw-normal text-white"> {{$post->user->name}} <small class="text-white text-light">{{$post->user->first_name}}</small></h5>
                        
                        
                </div>
                     <!-- show images -->
                   @foreach($post->images as $image)
                        <div class="widget-top-overflow text-white">
                            <!-- the pic content -->
                            <img src="storage/images/{{$image->url_image}}">    
                        </div>
                   @endforeach

                     <!-- show body -->
                    <div class="pointer">
                       <p class="text-light fs-mini m">
                        {{$post -> body}}
                      </p>
                    </div>
                   
                   <!-- show file -->
                 @foreach($post->files as $file)
                                                 
                      <a href="{{url('home/'.$file->id.'/download')}}" class="btn btn-info">
                        <i class="fa fa-pencil" aria-hidden="true">download file</i></a> 
                      <hr>
                 @endforeach 

                   <!-- show time the post -->
                    <p class="fs-mini text-muted">
                       <time>
                         <span class="glyphicon glyphicon-time"> Posted on {{$post->created_at ->toDayDateTimeString()}}</span>                            
                       </time>
                    </p>
                        <!--form edit and delete posts -->
                   <form class="form-inline" method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">
                       {{ csrf_field () }}
                       {{ method_field ('DELETE') }}
                                <!--edit posts -->
                         <a href="{{url('home/'.$post -> id.'/edit')}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> modifer</a>

                                <!--delete posts -->
                         <button type='submit' class="btn btn-danger"><i class="fa fa-file-image-o" aria-hidden="true"></i> suprimmer</button>
                    </form>
                    
          </div> <!-- end class="widget-body"  -->
            
      <!-- end show  the post  -->
   
         <footer class="bg-body-light">
                    <!--ul class="post-links"> 
                        <-- like and comment footer 
                        <li><a href="#">1 hour</a></li>
                        <li><a href="#"><span class="text-danger"><i class="fa fa-heart"></i> Like</span></a></li>
                        <li><a href="#">Comment</a></li>
                    ul -->


                    <!-- show comments -->
                  @foreach ($post->comments as $comment)
                    <ul class="post-comments mt mb-0">
                        <li> 
                           <!-- avatar user comment -->
                            <span class="thumb-xs avatar pull-left mr-sm">
                                <img class="img-circle" src="storage/images/{{$comment->user->avatar}}" alt="...">
                            </span>
                            <!-- body comments -->
                            <div class="comment-body">
                                <h6 class="author fw-semi-bold">{{$comment->user->name}} <small class="text-white text-light">{{$comment->user->first_name}}</small></h6>
                                <p>{{$comment-> body}}</p>
                            </div>
                            
                        </li>
                            <!-- show time comments -->
                        <p>
                          <span class="glyphicon glyphicon-time"> {{$comment->created_at ->toDayDateTimeString()}}</span>                             
                        </p>

                        @endforeach    <!-- end show comment -->

                           <!-- add comments -->
                        <li>
                             <!-- avatar auth user -->
                            <span class="thumb-xs avatar pull-left mr-sm">
                                <img class="img-circle" src="storage/images/{{Auth::user()->avatar}}" alt="...">
                            </span>

                            
                              <form  method="POST" action="/home/{{$post->id}}/{{Auth::user()->id }}/store">
                                 {{ csrf_field () }}
                                  <div class="comment-body">
                                        <input  name="body" class="form-control input-sm" type="text" placeholder="Write your comment...">
                                   </div>
                               </form>          
                        </li>
                    </ul>
             </footer>
      </section>
</div>


     
            <!--  --> 
            
        @endforeach  


  </div> 
         <div class="raw text-center">
         {!!$posts->render()!!}

         </div>

          
          
  
 


    
@endsection
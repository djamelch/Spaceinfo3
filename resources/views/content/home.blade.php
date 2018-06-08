@extends('index')



@section('content')

 
    <link href="{{asset('assets/css/posts.css')}}" rel="stylesheet">
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

 <!-- Post editor -->
        <div class="col-md-offset-3 col-md-6 col-xs-12">
                <div class="well well-sm well-social-post">
            <form method="POST" action="/home/store"  enctype="multipart/form-data">
                   {{ csrf_field () }}
                    <!-- if user is admin or editor -->
                 @if(( Auth::user()->hasRole('Editor'))||( Auth::user()->hasRole('Admin') ))
                   <input type="hidden" value="1" name="public">
                 @endif  <!-- end if user is admin or editor  -->
                   <!-- ul title and body  -->
                <ul class="list-inline" id="list_PostActions">
                    <li class="active"><a href="#">Update status</a></li>
                </ul>
                <textarea name="body" class="form-control" placeholder="What's in your mind?"></textarea>
                <ul class="list-inline post-actions">
                  
                     <li class="hvr-icon-up">
                      
                        <div class="upload-btnn-wrapper">
                          <i class="far fa-file-image hvr-icon"></i>
                          <input type="file" name="images[]" accept="image/*" />
                        </div>
                    
                     </li>
                        
                    <li class="hvr-icon-rotate">
                        <div class="upload-btnn-wrapper">
                            <i class="fas fa-paperclip hvr-icon"></i>
                            <input type="file" name="file" >
                         </div>
                    </li>

                      @if((Auth::user()->hasRole('User'))&& (Auth::user()->level !=null)&&(Auth::user()->section !=null)&&(Auth::user()->group !==null))
                     <li class='list-inline post-actions'>
                      
                     
                      <div class="form-check form-check-inline">
                           
                          <label class="form-check-label" for="inlineCheckbox1">{{Auth::user()->level}}
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"  name='level'>
                          </label>
                     
                     
                         
                          <label class="form-check-label">{{Auth::user()->section}}
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name='section'>
                          </label>
                    
                   
                         
                          <label class="form-check-label" for="inlineCheckbox3">{{Auth::user()->group}}
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" checked disabled>
                          </label>
                    </div>
                 
                    </li>  <!-- end ul Audience  -->
                    @endif

                   

                   <li class="pull-right" > <button type="submit"  class="btn btn-primary btn-xs" style="background-color:#189995;" value="Submit">Share</button></li>
                </ul>
            </form>
                </div>
            </div>                                                          
        <!-- End Post editor -->

  <!-- *********************************************************** -->                

                <!--show posts -->
               
        @foreach($posts as $post)
          
                  <!--post (Editor and Admin)  -->
               @if($post->public === 1)
                
                      <!-- Second Post type form (post with pic)-->
        <div class="col-md-offset-3 col-md-6 col-xs-12">
                <section class="widget">
                    <div class="widget-controls">
                            
                            <!-- <a href="javascript:void(0)" class="dropbtn" data-widgster="close"> -->
                                    <div class="dropdownpost">
                                       @if((Auth::user()->hasRole('Admin')) && ((Auth::user()->id)!=($post->user->id)))
                                            <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                            <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                            </div>
                                                 @else
                                                  <!--user is not admin -->
                                                @if((Auth::user()->id)===($post->user->id))
                                                 <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                                <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                                <form  method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">
                                                <a href="#">
                                                   
                                                   {{ csrf_field () }}
                                                   {{ method_field ('DELETE') }}
                                                    
                                                    <button type='submit'><i class="fas fa-trash" style="color:red; font-size:11px;"></i></button>
                                                   
                                                </a>
                                              </form>
                                              
                                            </div>
                                             @endif
                                            @endif
                                    </div>
                       
                    </div>
                    <div class="widget-body">
                        <div class="widget-top-overflow text-white">
                           @foreach($post->images as $image)
                            <img  class="cover" src="assets/img/{{$image->url_image}}"style="width:800px;height:400px;">
                            @endforeach
                            <!-- <ul class="tags text-white pull-right">
                                <li><a href="#">design</a></li>
                                <li><a href="#">white</a></li>
                            </ul> -->
                        </div>
                        <div class="post-user mt-sm">
                            <div class="thumb-lg pull-left mr">
                            <!-- show the avatat of the post owner -->
                            <div class="drpdn">
                                    <img src="assets/img/{{$post->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                    <div class="drpdn-content">
                                      <img src="assets/img/{{$post->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                      <div class="desc">
                                         {{$post->user->name}}
                                         {{$post->user->first_name}}
                                      </div>
                                    </div>
                            </div>
                        </div>

                             <h7 class="author "><span class="fw-semi-bold">{{$post->user->name}}</span> {{$post->user->first_name}}</h7>
                            <p class="fs-mini text-muted"><time>{{$post->created_at->diffForHumans()}}</time>
                                 <!-- &nbsp; <i class="fa fa-map-marker"></i> &nbsp; near Amsterdam</p> -->
                       <style>
                      
                       </style>
                         
                          <div class="notepaper">
                            <figure class="quote">
                                <blockquote class="curly-quotes">
                                {{$post -> body}}
                                </blockquote>
    
                            </figure>
                          </div>
                       
                          </div>



                     

                    </div>
                    


                  
                    <footer class="bg-body-light">
                       @foreach($post->files as $file)
                                                 
                      <p>{{$file->url_file}}
        <a href="#">
          <span class="glyphicon glyphicon-download-alt"></span>
        </a>
      </p>
                    @endforeach
                            <ul class="post-links">

                                <!-- like and comment footer -->

                                <li><a href="#">
                                    <i class="far fa-comment-dots"></i>
                                     Comment</a></li>
                            </ul>
                   
                             <!-- show comments -->
                         
                           
                            <ul class="post-comments mt mb-0">
                             @foreach ($post->comments as $comment)
                                <li>
                                    <div class="thumb-xs avatar pull-left mr-sm">
                                            <!-- show the avatat of the post owner -->
                                            <div class="drpdn">
                                                    <img src="assets/img/{{$comment->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                                    <div class="drpdn-content">
                                                      <img src="assets/img/{{$comment->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                                      <div class="desc">
                                                         {{$post->user->name}}<br>
                                                         {{$post->user->first_name}}
                                                      </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="comment-body">
                                        <h6 class="author fw-semi-bold">{{$comment->user->name}} &nbsp; {{$post->user->first_name}} <small>{{$comment->created_at ->diffForHumans()}}</small></h6>
                                        <p>{{$comment-> body}}</p>
                                    </div>
                                </li>
                                 @endforeach    <!-- end show comment -->
                                <li>
                                    <span class="thumb-xs avatar pull-left mr-sm">
                                        <img class="img-circle" src="assets/img/{{Auth::user()->avatar}}" alt="...">
                                    </span>

                                    <div class="comment-body">
                                    <form  method="POST" action="/home/{{$post->id}}/{{Auth::user()->id }}/store">
                                            {{ csrf_field () }}
                                        <input class="form-control input-sm" name="body" type="text" placeholder="Write your comment...">
                                       </form>
                                    </div>
                                </li>
                            </ul>

                        </footer>
                </section>   
            

    </div>


              @endif   <!-- end Post Editor and amdin --> 
         
                 <!--userAuth is User  -->
           @if((Auth::user()->hasRole('User'))&& (Auth::user()->level !=null)&&(Auth::user()->section !=null)&&(Auth::user()->group !=null))

            @if($post->accpet === 1)

                 @if($post->for_level === 1)
                     @if($post->user->level === (Auth::user()->level))
                   
                  <!-- Second Post type form (post with pic)-->
        <div class="col-md-offset-3 col-md-6 col-xs-12">
                <section class="widget">
                    <div class="widget-controls">
                            
                            <!-- <a href="javascript:void(0)" class="dropbtn" data-widgster="close"> -->
                                    <div class="dropdownpost">
                                       @if((Auth::user()->hasRole('Admin')) && ((Auth::user()->id)!=($post->user->id)))
                                            <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                            <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                            </div>
                                                 @else
                                                  <!--user is not admin -->
                                                @if((Auth::user()->id)===($post->user->id))
                                                 <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                                <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                                <form  method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">
                                                <a href="#">
                                                   
                                                   {{ csrf_field () }}
                                                   {{ method_field ('DELETE') }}
                                                    
                                                    <button type='submit'><i class="fas fa-trash" style="color:red; font-size:11px;"></i></button>
                                                   
                                                </a>
                                              </form>
                                              
                                            </div>
                                             @endif
                                            @endif
                                    </div>
                       
                    </div>
                    <div class="widget-body">
                        <div class="widget-top-overflow text-white">
                           @foreach($post->images as $image)
                            <img  class="cover" src="assets/img/{{$image->url_image}}"style="width:800px;height:400px;">
                            @endforeach
                            <!-- <ul class="tags text-white pull-right">
                                <li><a href="#">design</a></li>
                                <li><a href="#">white</a></li>
                            </ul> -->
                        </div>
                        <div class="post-user mt-sm">
                            <div class="thumb-lg pull-left mr">
                            <!-- show the avatat of the post owner -->
                            <div class="drpdn">
                                    <img src="assets/img/{{$post->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                    <div class="drpdn-content">
                                      <img src="assets/img/{{$post->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                      <div class="desc">
                                         {{$post->user->name}}
                                         {{$post->user->first_name}}
                                      </div>
                                    </div>
                            </div>
                        </div>

                             <h7 class="author "><span class="fw-semi-bold">{{$post->user->name}}</span> {{$post->user->first_name}}</h7>
                            <p class="fs-mini text-muted"><time>{{$post->created_at->diffForHumans()}}</time>
                                 <!-- &nbsp; <i class="fa fa-map-marker"></i> &nbsp; near Amsterdam</p> -->
                       <style>
                      
                       </style>
                         
                          <div class="notepaper">
                            <figure class="quote">
                                <blockquote class="curly-quotes">
                                {{$post -> body}}
                                </blockquote>
    
                            </figure>
                          </div>
                       
                          </div>



                     

                    </div>
                    


                  
                    <footer class="bg-body-light">
                       @foreach($post->files as $file)
                                                 
                      <p>{{$file->url_file}}
        <a href="#">
          <span class="glyphicon glyphicon-download-alt"></span>
        </a>
      </p>
                    @endforeach
                            <ul class="post-links">

                                <!-- like and comment footer -->

                                <li><a href="#">
                                    <i class="far fa-comment-dots"></i>
                                     Comment</a></li>
                            </ul>
                   
                             <!-- show comments -->
                         
                           
                            <ul class="post-comments mt mb-0">
                             @foreach ($post->comments as $comment)
                                <li>
                                    <div class="thumb-xs avatar pull-left mr-sm">
                                            <!-- show the avatat of the post owner -->
                                            <div class="drpdn">
                                                    <img src="assets/img/{{$comment->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                                    <div class="drpdn-content">
                                                      <img src="assets/img/{{$comment->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                                      <div class="desc">
                                                         {{$post->user->name}}<br>
                                                         {{$post->user->first_name}}
                                                      </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="comment-body">
                                        <h6 class="author fw-semi-bold">{{$comment->user->name}} &nbsp; {{$post->user->first_name}} <small>{{$comment->created_at ->diffForHumans()}}</small></h6>
                                        <p>{{$comment-> body}}</p>
                                    </div>
                                </li>
                                 @endforeach    <!-- end show comment -->
                                <li>
                                    <span class="thumb-xs avatar pull-left mr-sm">
                                        <img class="img-circle" src="assets/img/{{Auth::user()->avatar}}" alt="...">
                                    </span>

                                    <div class="comment-body">
                                    <form  method="POST" action="/home/{{$post->id}}/{{Auth::user()->id }}/store">
                                            {{ csrf_field () }}
                                        <input class="form-control input-sm" name="body" type="text" placeholder="Write your comment...">
                                       </form>
                                    </div>
                                </li>
                            </ul>

                        </footer>
                </section>   
            

    </div>


               @endif
          @else
                 @if($post->for_section === 1)
                  @if( ($post->user->level === Auth::user()->level) && ($post->user->section === Auth::user()->section) )
                    <!-- show posts-->
  <!-- Second Post type form (post with pic)-->
        <div class="col-md-offset-3 col-md-6 col-xs-12">
                <section class="widget">
                    <div class="widget-controls">
                            
                            <!-- <a href="javascript:void(0)" class="dropbtn" data-widgster="close"> -->
                                    <div class="dropdownpost">
                                       @if((Auth::user()->hasRole('Admin')) && ((Auth::user()->id)!=($post->user->id)))
                                            <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                            <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                            </div>
                                                 @else
                                                  <!--user is not admin -->
                                                @if((Auth::user()->id)===($post->user->id))
                                                 <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                                <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                                <form  method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">
                                                <a href="#">
                                                   
                                                   {{ csrf_field () }}
                                                   {{ method_field ('DELETE') }}
                                                    
                                                    <button type='submit'><i class="fas fa-trash" style="color:red; font-size:11px;"></i></button>
                                                   
                                                </a>
                                              </form>
                                              
                                            </div>
                                             @endif
                                            @endif
                                    </div>
                       
                    </div>
                    <div class="widget-body">
                        <div class="widget-top-overflow text-white">
                           @foreach($post->images as $image)
                            <img  class="cover" src="assets/img/{{$image->url_image}}"style="width:800px;height:400px;">
                            @endforeach
                            <!-- <ul class="tags text-white pull-right">
                                <li><a href="#">design</a></li>
                                <li><a href="#">white</a></li>
                            </ul> -->
                        </div>
                        <div class="post-user mt-sm">
                            <div class="thumb-lg pull-left mr">
                            <!-- show the avatat of the post owner -->
                            <div class="drpdn">
                                    <img src="assets/img/{{$post->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                    <div class="drpdn-content">
                                      <img src="assets/img/{{$post->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                      <div class="desc">
                                         {{$post->user->name}}
                                         {{$post->user->first_name}}
                                      </div>
                                    </div>
                            </div>
                        </div>

                             <h7 class="author "><span class="fw-semi-bold">{{$post->user->name}}</span> {{$post->user->first_name}}</h7>
                            <p class="fs-mini text-muted"><time>{{$post->created_at->diffForHumans()}}</time>
                                 <!-- &nbsp; <i class="fa fa-map-marker"></i> &nbsp; near Amsterdam</p> -->
                       <style>
                      
                       </style>
                         
                          <div class="notepaper">
                            <figure class="quote">
                                <blockquote class="curly-quotes">
                                {{$post -> body}}
                                </blockquote>
    
                            </figure>
                          </div>
                       
                          </div>



                     

                    </div>
                    


                  
                    <footer class="bg-body-light">
                       @foreach($post->files as $file)
                                                 
                      <p>{{$file->url_file}}
        <a href="#">
          <span class="glyphicon glyphicon-download-alt"></span>
        </a>
      </p>
                    @endforeach
                            <ul class="post-links">

                                <!-- like and comment footer -->

                                <li><a href="#">
                                    <i class="far fa-comment-dots"></i>
                                     Comment</a></li>
                            </ul>
                   
                             <!-- show comments -->
                         
                           
                            <ul class="post-comments mt mb-0">
                             @foreach ($post->comments as $comment)
                                <li>
                                    <div class="thumb-xs avatar pull-left mr-sm">
                                            <!-- show the avatat of the post owner -->
                                            <div class="drpdn">
                                                    <img src="assets/img/{{$comment->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                                    <div class="drpdn-content">
                                                      <img src="assets/img/{{$comment->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                                      <div class="desc">
                                                         {{$post->user->name}}<br>
                                                         {{$post->user->first_name}}
                                                      </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="comment-body">
                                        <h6 class="author fw-semi-bold">{{$comment->user->name}} &nbsp; {{$post->user->first_name}} <small>{{$comment->created_at ->diffForHumans()}}</small></h6>
                                        <p>{{$comment-> body}}</p>
                                    </div>
                                </li>
                                 @endforeach    <!-- end show comment -->
                                <li>
                                    <span class="thumb-xs avatar pull-left mr-sm">
                                        <img class="img-circle" src="assets/img/{{Auth::user()->avatar}}" alt="...">
                                    </span>

                                    <div class="comment-body">
                                    <form  method="POST" action="/home/{{$post->id}}/{{Auth::user()->id }}/store">
                                            {{ csrf_field () }}
                                        <input class="form-control input-sm" name="body" type="text" placeholder="Write your comment...">
                                       </form>
                                    </div>
                                </li>
                            </ul>

                        </footer>
                </section>   
            

    </div>



            @endif
          @endif
          @if($post->for_section != 1)
            @if (($post->user->level === Auth::user()->level)&&($post->user->section === Auth::user()->section)&&($post->user->group === Auth::user()->group))
 <!-- Second Post type form (post with pic)-->
        <div class="col-md-offset-3 col-md-6 col-xs-12">
                <section class="widget">
                    <div class="widget-controls">
                            
                            <!-- <a href="javascript:void(0)" class="dropbtn" data-widgster="close"> -->
                                    <div class="dropdownpost">
                                       @if((Auth::user()->hasRole('Admin')) && ((Auth::user()->id)!=($post->user->id)))
                                            <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                            <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                            </div>
                                                 @else
                                                  <!--user is not admin -->
                                                @if((Auth::user()->id)===($post->user->id))
                                                 <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                                <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                                <form  method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">
                                                <a href="#">
                                                   
                                                   {{ csrf_field () }}
                                                   {{ method_field ('DELETE') }}
                                                    
                                                    <button type='submit'><i class="fas fa-trash" style="color:red; font-size:11px;"></i></button>
                                                   
                                                </a>
                                              </form>
                                              
                                            </div>
                                             @endif
                                            @endif
                                    </div>
                       
                    </div>
                    <div class="widget-body">
                        <div class="widget-top-overflow text-white">
                           @foreach($post->images as $image)
                            <img  class="cover" src="assets/img/{{$image->url_image}}"style="width:800px;height:400px;">
                            @endforeach
                            <!-- <ul class="tags text-white pull-right">
                                <li><a href="#">design</a></li>
                                <li><a href="#">white</a></li>
                            </ul> -->
                        </div>
                        <div class="post-user mt-sm">
                            <div class="thumb-lg pull-left mr">
                            <!-- show the avatat of the post owner -->
                            <div class="drpdn">
                                    <img src="assets/img/{{$post->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                    <div class="drpdn-content">
                                      <img src="assets/img/{{$post->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                      <div class="desc">
                                         {{$post->user->name}}
                                         {{$post->user->first_name}}
                                      </div>
                                    </div>
                            </div>
                        </div>

                             <h7 class="author "><span class="fw-semi-bold">{{$post->user->name}}</span> {{$post->user->first_name}}</h7>
                            <p class="fs-mini text-muted"><time>{{$post->created_at->diffForHumans()}}</time>
                                 <!-- &nbsp; <i class="fa fa-map-marker"></i> &nbsp; near Amsterdam</p> -->
                       <style>
                      
                       </style>
                         
                          <div class="notepaper">
                            <figure class="quote">
                                <blockquote class="curly-quotes">
                                {{$post -> body}}
                                </blockquote>
    
                            </figure>
                          </div>
                       
                          </div>



                     

                    </div>
                    


                  
                    <footer class="bg-body-light">
                       @foreach($post->files as $file)
                                                 
                      <p>{{$file->url_file}}
        <a href="#">
          <span class="glyphicon glyphicon-download-alt"></span>
        </a>
      </p>
                    @endforeach
                            <ul class="post-links">

                                <!-- like and comment footer -->

                                <li><a href="#">
                                    <i class="far fa-comment-dots"></i>
                                     Comment</a></li>
                            </ul>
                   
                             <!-- show comments -->
                         
                           
                            <ul class="post-comments mt mb-0">
                             @foreach ($post->comments as $comment)
                                <li>
                                    <div class="thumb-xs avatar pull-left mr-sm">
                                            <!-- show the avatat of the post owner -->
                                            <div class="drpdn">
                                                    <img src="assets/img/{{$comment->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                                    <div class="drpdn-content">
                                                      <img src="assets/img/{{$comment->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                                      <div class="desc">
                                                         {{$post->user->name}}<br>
                                                         {{$post->user->first_name}}
                                                      </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="comment-body">
                                        <h6 class="author fw-semi-bold">{{$comment->user->name}} &nbsp; {{$post->user->first_name}} <small>{{$comment->created_at ->diffForHumans()}}</small></h6>
                                        <p>{{$comment-> body}}</p>
                                    </div>
                                </li>
                                 @endforeach    <!-- end show comment -->
                                <li>
                                    <span class="thumb-xs avatar pull-left mr-sm">
                                        <img class="img-circle" src="assets/img/{{Auth::user()->avatar}}" alt="...">
                                    </span>

                                    <div class="comment-body">
                                    <form  method="POST" action="/home/{{$post->id}}/{{Auth::user()->id }}/store">
                                            {{ csrf_field () }}
                                        <input class="form-control input-sm" name="body" type="text" placeholder="Write your comment...">
                                       </form>
                                    </div>
                                </li>
                            </ul>

                        </footer>
                </section>   
            

    </div>



            @endif
          @endif    
                       
          
         
        

         @endif

         @endif   <!-- end accpet -->
          
         @else
              @if($post->public !== 1)

             <!-- userAuth is admin or editor-->
              
     <!-- Second Post type form (post with pic)-->
        <div class="col-md-offset-3 col-md-6 col-xs-12">
                <section class="widget">
                    <div class="widget-controls">
                            
                            <!-- <a href="javascript:void(0)" class="dropbtn" data-widgster="close"> -->
                                    <div class="dropdownpost">
                                       @if((Auth::user()->hasRole('Admin')) && ((Auth::user()->id)!=($post->user->id)))
                                            <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                            <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                            </div>
                                                 @else
                                                  <!--user is not admin -->
                                                @if((Auth::user()->id)===($post->user->id))
                                                 <i class="fas fa-ellipsis-h" style="color:#123445; font-size:15px;"></i>
                                                <div class="dropdown-contentpost">
                                                <a href="{{url('home/'.$post -> id.'/edit')}}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                </a>
                                                <form  method="POST" action="{{url('home/'.$post -> id.'/distroy')}}">
                                                <a href="#">
                                                   
                                                   {{ csrf_field () }}
                                                   {{ method_field ('DELETE') }}
                                                    
                                                    <button type='submit'><i class="fas fa-trash" style="color:red; font-size:11px;"></i></button>
                                                   
                                                </a>
                                              </form>
                                              
                                            </div>
                                             @endif
                                            @endif
                                    </div>
                       
                    </div>
                    <div class="widget-body">
                        <div class="widget-top-overflow text-white">
                           @foreach($post->images as $image)
                            <img  class="cover" src="assets/img/{{$image->url_image}}"style="width:800px;height:400px;">
                            @endforeach
                            <!-- <ul class="tags text-white pull-right">
                                <li><a href="#">design</a></li>
                                <li><a href="#">white</a></li>
                            </ul> -->
                        </div>
                        <div class="post-user mt-sm">
                            <div class="thumb-lg pull-left mr">
                            <!-- show the avatat of the post owner -->
                            <div class="drpdn">
                                    <img src="assets/img/{{$post->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                    <div class="drpdn-content">
                                      <img src="assets/img/{{$post->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                      <div class="desc">
                                         {{$post->user->name}}
                                         {{$post->user->first_name}}
                                      </div>
                                    </div>
                            </div>
                        </div>

                             <h7 class="author "><span class="fw-semi-bold">{{$post->user->name}}</span> {{$post->user->first_name}}</h7>
                            <p class="fs-mini text-muted"><time>{{$post->created_at->diffForHumans()}}</time>
                                 <!-- &nbsp; <i class="fa fa-map-marker"></i> &nbsp; near Amsterdam</p> -->
                       <style>
                      
                       </style>
                         
                          <div class="notepaper">
                            <figure class="quote">
                                <blockquote class="curly-quotes">
                                {{$post -> body}}
                                </blockquote>
    
                            </figure>
                          </div>
                       
                          </div>



                     

                    </div>
                    


                  
                    <footer class="bg-body-light">
                       @foreach($post->files as $file)
                                                 
                      <p>{{$file->url_file}}
        <a href="#">
          <span class="glyphicon glyphicon-download-alt"></span>
        </a>
      </p>
                    @endforeach
                            <ul class="post-links">

                                <!-- like and comment footer -->

                                <li><a href="#">
                                    <i class="far fa-comment-dots"></i>
                                     Comment</a></li>
                            </ul>
                   
                             <!-- show comments -->
                         
                           
                            <ul class="post-comments mt mb-0">
                             @foreach ($post->comments as $comment)
                                <li>
                                    <div class="thumb-xs avatar pull-left mr-sm">
                                            <!-- show the avatat of the post owner -->
                                            <div class="drpdn">
                                                    <img src="assets/img/{{$comment->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                                    <div class="drpdn-content">
                                                      <img src="assets/img/{{$comment->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
                                                      <div class="desc">
                                                         {{$post->user->name}}<br>
                                                         {{$post->user->first_name}}
                                                      </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="comment-body">
                                        <h6 class="author fw-semi-bold">{{$comment->user->name}} &nbsp; {{$post->user->first_name}} <small>{{$comment->created_at ->diffForHumans()}}</small></h6>
                                        <p>{{$comment-> body}}</p>
                                    </div>
                                </li>
                                 @endforeach    <!-- end show comment -->
                                <li>
                                    <span class="thumb-xs avatar pull-left mr-sm">
                                        <img class="img-circle" src="assets/img/{{Auth::user()->avatar}}" alt="...">
                                    </span>

                                    <div class="comment-body">
                                    <form  method="POST" action="/home/{{$post->id}}/{{Auth::user()->id }}/store">
                                            {{ csrf_field () }}
                                        <input class="form-control input-sm" name="body" type="text" placeholder="Write your comment...">
                                       </form>
                                    </div>
                                </li>
                            </ul>

                        </footer>
                </section>   
            

    </div>



         @endif   <!--  --> 
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
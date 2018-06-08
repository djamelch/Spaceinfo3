@extends('index')



@section('content')

 
    <link href="{{asset('assets/css/posts.css')}}" rel="stylesheet">

    @foreach($posts as $post) <!-- begin foreach post  -->  

      @if((Auth::user()->hasRole('User'))&& (Auth::user()->level !=null)&&(Auth::user()->section !=null)&&(Auth::user()->group !=null))
       @if($post->accpet === 1)
          @if($post->for_level === 1)
                     @if($post->user->level === (Auth::user()->level))
                      <!--  *********   show posts ***********  -->
               
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
                            <img  class="cover" src="storage/images/{{$image->url_image}}"style="width:800px;height:400px;">
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
                                    <img src="storage/images/{{$post->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                    <div class="drpdn-content">
                                      <img src="storage/images/{{$post->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
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
                                                    <img src="storage/images/{{$comment->user->avatar}}" class="img-circle" alt="Trolltunga Norway" width="100" height="50">
                                                    <div class="drpdn-content">
                                                      <img src="storage/images/{{$comment->user->avatar}}" alt="Trolltunga Norway" width="300" height="200">
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
                                        <img class="img-circle" src="storage/images/{{Auth::user()->avatar}}" alt="...">
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
      @endif
     @endforeach  

 <div class="col-md-offset-3 col-md-6 col-xs-12">
   
         <div class="raw text-center">
         {!!$posts->render()!!}

         </div>
 </div>
          

@endsection
 



@extends('index')

@section('content')
   
<div class="col-md-offset-3 col-md-6 col-xs-12">
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
 <figure class="fir-image-figure">
                
               
                    <div class="dropdownpost">
                                      
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                                        {{ csrf_field () }}
                                                       
                        <div class="dropdown-contentpost">
                                <div class="upload-btnn-wrapper">

                                  
                                     <input type="file" name="avatar" accept="image/*" />

                                     
                                 
                                </div>
                       </div>

                    <div class="widget-body">
                        <div class="widget-top-overflow text-white">
                         
                          
                             <img  class="fir-author-image fir-clickcircle" src="storage/images/{{Auth::user()->avatar}}" alt="David East - Author" style="width:200px; height:200px; float:left; border-radius:70%; margin-right:30px;">

                           
                        </div>
                    <button type="submit"  class="btn btn-primary btn-xs pull-right" value="Submit">Share</button>
                 </div>
                  </form>
               </div>  
              
                <figcaption>
                  <div class="fig-author-figure-title">{{Auth::user()->name}} {{Auth::user()->first_name}}</div>
                  <div class="fig-author-figure-title">{{Auth::user()->email}}</div>
                  <div class="fig-author-figure-title"</div>
                  @if(Auth::user()->level != null)
                    
                     
                        {{Auth::user()->level}}&nbsp;
                        {{Auth::user()->section}}&nbsp;
                        {{Auth::user()->group}}
                 @endif
                </div></div>
                </figcaption>
        </figure>
    </div>
 @endsection
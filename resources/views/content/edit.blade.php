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

 <!-- Post editor -->
        <div class="col-md-offset-3 col-md-6 col-xs-12">
                <div class="well well-sm well-social-post">
            <form method="POST" action="/home/store"  enctype="multipart/form-data">
                   {{ csrf_field () }}
                    <input type="hidden" name="_method" value="PUT">
                    <!-- if user is admin or editor -->
                 @if(( Auth::user()->hasRole('Editor'))||( Auth::user()->hasRole('Admin') ))
                   <input type="hidden" value="1" name="public">
                 @endif  <!-- end if user is admin or editor  -->
                   <!-- ul title and body  -->
                <ul class="list-inline" id="list_PostActions">
                    <li class="active"><a href="#">Update status</a></li>
                </ul>
                <textarea name="body" class="form-control" placeholder="{{$post -> body}}"></textarea>
                <ul class="list-inline post-actions">
                  
                     <li class="hvr-icon-up">
                      
                        <div class="upload-btnn-wrapper">
                          <i class="far fa-file-image hvr-icon"></i>
                          <input type="file" name="images[]" accept="image/*" >
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
        @endsection
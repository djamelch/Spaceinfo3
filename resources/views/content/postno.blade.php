@extends('index')

@section('content')


   
             @foreach($posts as $post)

               @if(($post->accpet===0) && ($post->user->public != 1))

               

              
 
 <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" >
                
                    <!-- PRICE ITEM -->
                    <div class="panel price panel-blue" >
                        <div class="panel-heading arrow_box text-center">
                        <h3>{{$post->title}}</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p class="lead" style="font-size:20px"><strong>{{$post->body}}</strong></p>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><i class="icon-ok text-info"></i> {{$post->user->name}}</li>
                            <li class="list-group-item"><i class="icon-ok text-info"></i>{{$post->user->first_name }}</li>
                            <li class="list-group-item"><i class="icon-ok text-info"></i>{{$post->user->level}} &nbsp; &nbsp;{{$post->user->group}} &nbsp; &nbsp;{{$post->user->group}}</li>
                        </ul>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block btn-info" href="/admin/{{$post->id}}"">View Post</a>
                        </div>
                    </div>
                    <!-- /PRICE ITEM -->
                    
                    
                </div>
                  @endif
             @endforeach
               

 @endsection
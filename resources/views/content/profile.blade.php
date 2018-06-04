@extends('index')

@section('content')
     

    <div class="col-md-offset-3 col-md-6 col-xs-12"style="margin-top:-10px;">
        <div class="well well-sm well-social-post" >
            <div class="card hovercard">

              <form enctype="multipart/form-data" action="/profile" method="POST">
                  {{ csrf_field () }}

                <div class="cardheader" style="background: url('storage/images/{{$user->couvert}}');">

                </div>
                
                <div class="avatar">
                    <img alt="" src="storage/images/{{$user->avatar}}">
                </div>
                <div class="info">
                    <div class="title">
                        <h1 target="_blank">{{Auth::user()->name}}</h1>
                    </div>
                    <div class="desc"><h4 target="_blank">{{Auth::user()->first_name}}</h4></div>
                    <div class="desc"></h6><a  href="https://{{Auth::user()->email}}" target="_blank" >{{Auth::user()->email}}</a></h6></div>
                  @if(Auth::user()->level != null)
                    <div class="desc"><h5> Audience:</h5>
                     
                        {{Auth::user()->level}}&nbsp;
                        {{Auth::user()->section}}&nbsp;
                        {{Auth::user()->group}}
                     
                   </div>
                  @endif
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="https://plus.google.com/+ahmshahnuralam">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>
          </div>
        </div>

  

@endsection


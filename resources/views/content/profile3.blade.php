@extends('index')

@section('content')
     

    <div class="col-md-offset-3 col-md-6 col-xs-12"style="margin-top:5px;">
  
        <div class="well well-sm well-social-post" >
            <div class="card hovercard">

              

                <div class="cardheader" style="background: url('storage/images/{{$user->couvert}}');">

                </div>
                
                <div class="avatar">
                    <img alt="" src="storage/images/{{$user->avatar}}">
                </div>
                <div class="info">
                    <div class="title">
                        <h1 target="_blank">{{Auth::user()->name}}</h1>
                    </div>
                    <div class="desc"><h4 target="_blank">{{Auth::user()->first_name}}</h4>
                    </div>
                    <div class="desc"></h6><a  href="https://{{Auth::user()->email}}" target="_blank" >{{Auth::user()->email}}</a></h6>
                    </div>
                  @if(Auth::user()->level != null)
                    
                     
                        {{Auth::user()->level}}&nbsp;
                        {{Auth::user()->section}}&nbsp;
                        {{Auth::user()->group}}
                 @endif
                </div>
                 
            </div>
               
        </div>
          </div>
        </div>

  

@endsection


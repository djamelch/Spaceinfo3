@extends('index')

@section('content')

     
      @foreach($users as $user)
            
<div class="pricingdiv" >
    <ul class="theplan">
        <li class="title"><b>{{$user->name}}</b></li>
        <li><b>First Name:</b> {{$user->first_name}}</li>
        <li><b>Email:</b>{{$user->email}}</li>
        <li><b>Matricule</b> {{$user->matricule}}</li>
       
        <li class="pricebutton" href="http://ergonomictrends.com/best-ergonomic-office-chairs-2017-reviews-buyers-guide/" target="_blank" rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
    </ul>
    <ul class="theplan">
        <li class="title"><span class="icon-trophy" style="color:yellow"></span> <b>Plan 2</b></li>
        <li><b>Dimensions:</b> 24.8W x 47.3H</li>
        <li><b>Material:</b> Nylon w/ Breathable Glass Fiber</li>
        <li><b>Weight:</b> 55 lbs</li>
        <li><b>Max Weight:</b> 330 lbs</li>
        <li><b>Head Rest:</b> Yes</li>
        <li><b>Arm Rest:</b> <span class="icon-check"></span></li>
        <li><b>Lumbar Support:</b> <span class="icon-check"></span></li>
        <li><b>Warranty:</b> 30 Days Money Back</li>
        <li><a class="pricebutton" href="http://ergonomictrends.com/best-ergonomic-office-chairs-2017-reviews-buyers-guide/" target="_blank" rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
        </ul>
    <ul class="theplan">
        <li class="title"><b>Plan 3</b></li>
        <li class="ethighlight"><b>Dimensions:</b> 24.8W x 47.3H</li>
        <li><b>Material:</b> Nylon w/ Breathable Glass Fiber</li>
        <li><b>Weight:</b> 55 lbs</li>
        <li><b>Max Weight:</b> 330 lbs</li>
        <li><b>Head Rest:</b> Yes</li>
        <li><b>Arm Rest:</b> <span class="icon-close"></span></li>
        <li><b>Lumbar Support:</b> <span class="icon-check"></span></li>
        <li><b>Warranty:</b> 30 Days Money Back</li>
        <li><a class="pricebutton" href="http://ergonomictrends.com/best-ergonomic-office-chairs-2017-reviews-buyers-guide/" target="_blank" rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
    </ul>
</div>

    
 @endforeach  
 @endsection
 @extends('index')

@section('content')


				 @foreach($users as $user)
				  @if($user->status===0)
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				
					<!-- PRICE ITEM -->
					<div class="panel price panel-grey">
						<div class="panel-heading arrow_box text-center">
						<h3>{{$user->name}}</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:20px"><strong>{{$user->first_name}}</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><i class="icon-ok text-success"></i> {{$user->email}}</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i> {{$user->matricule}}</li>

							  @if(($user->level != null)&&($user->section != null)&&($user->group != null))
							<li class="list-group-item"><i class="icon-ok text-success"></i>{{$user->level}}</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i>{{$user->section}}</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i>{{$user->group}}</li>
							@endif

						</ul>

						<div class="panel-footer">
							 <form method='post' action="{{route('users.approve', $user->id)}}">
                               {{ csrf_field () }}
             
                                 <input type="hidden" name="id" value='{{$user->id}}'>

                
                                  <button type="submit" class=" btn btn-lg btn-block btn-primary">accpte</button>          
                                </form>
							
						</div>
					</div>
					<!-- /PRICE ITEM -->
					
					
				</div>

				 @endif
				@endforeach
				
				
					

 @endsection
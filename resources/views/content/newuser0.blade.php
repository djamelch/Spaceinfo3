@extends('index')

@section('content')

     
     
           <div class="container bootstrap snippet">
    
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr class="success">
                                <th><span>User</span></th>
                                <th><span>Created</span></th>
                               
                                <th><span>Email</span></th>
                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                  @if($user->status===0)
                                <tr >
                                    <td>
                                        <img src="storage/images/{{$user->avatar}}" alt="">
                                        {{$user->name}}&nbsp; {{$user->first_name}} </br>
                                      <br>
                                      @if($user->level != null)
                                    
                                        <i> {{$user->level}} </i>
                                        <br>
                                        <i> {{$user->section}} </i>
                                        <br>
                                        <i> {{$user->group}} </i>
                                    
                                      @endif
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                   
                                    <td>
                                        <a href="#">{{$user->email}}</a>
                                    </td>
                                    
                              
                                    <td style="width: 15%;">
                                        
                                         <form method='POST' action="{{route('users.destroy', $user->id)}}">
                                          {{ csrf_field () }}
                                        {{ method_field ('DELETE') }} <button onclick="this.form.submit()" class="btn btn-danger"  class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Delete this user">
                                        
                                     
                            
                                          <i class="fas fa-trash-alt"></i>
                                      </button> 
                                         </form>   
                                        
                                  <form method='post' action="{{route('users.approve',$user->id)}}">
                                            <button onclick="this.form.submit();"   class="btn btn-success" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Approve">
                                              {{ csrf_field () }}
             
                                            <input type="hidden" name="id" value='{{$user->id}}'>
                                           
                                          <i class="fa fa-check-circle" aria-hidden="true"></i>
                                           </button>
                                         </form>  
                                         
                                        
                                     
                                      

                                    </td>
                                </tr>
                                @endif
                               @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
                                     
        
 @endsection
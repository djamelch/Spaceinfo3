
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
                                <th><span><center>User</center></span></th>
                                <th><span><center>Created</center></span></th>
                                <th class="text-center"><span><center>Status</center></span></th>
                                <th><span><center>Email</center></span></th>
                                <th><span><center>Delete And Edite</center></span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr >
                                    <td>

                                        <img src="storage/images/{{$user->avatar}}" alt="">
                                        {{$user->name}}&nbsp; {{$user->first_name}} </br>
                                        <span class="user-subhead">
                                       @if( $user->hasRole('Admin'))
                                         <b>Admin </b>
                                        @else
                                          @if( $user->hasRole('Editor'))
                                             <b>Editor </b>
                                              @else
                                               
                                             <b>User </b>
                                           @endif 
                                       @endif
                                     </span><br>
                                      @if($user->level != null)
                                    
                                        <i> {{$user->level}} </i>
                                        <br>
                                        <i> {{$user->section}} </i>
                                        <br>
                                        <i> {{$user->group}} </i>
                                    
                                      @endif
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td class="text-center">

                                      @if($user->status === 1)
                                        <span class="label label-success">Active</span>
                                       @else
                                           <span class="label label-danger">inactive</span>
                                      @endif     
                                    </td>
                                    <td>
                                      <center>
                                        <a href="#">{{$user->email}}</a>
                                      </center>
                                    </td>
                                    
                              <div class="btn-group">
                                
                                    <td style="width:20%;">
                                       <center>
                                        
                                        <form method='POST' class="form-inline" action="{{route('users.destroy', $user->id)}}">
                                         <button onclick="this.form.submit()"  class="btn btn-danger"  class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Delete this user"> 
                                         {{ csrf_field () }}
                                        {{ method_field ('DELETE') }}
                                     <div class="btn-group">
                                          
                                          <i class="fas fa-trash-alt"></i>
                                       </button>
                                      
                                         </form>   @if($user->status===0) 
                                          <form method='post' action="{{route('users.approve',$user->id)}}">
                                            <button onclick="this.form.submit();"   class="btn btn-success"  class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Approve">
                                              {{ csrf_field () }}
             
                                            <input type="hidden" name="id" value='{{$user->id}}'>
                                           
                                          <i class="fa fa-check-circle" aria-hidden="true"></i>
                                           </button>
                                         </form>
                                     @endif
                                       <div class="dropdown">
                                        <button  class="btn btn-primary" type="button" class="dropbtn"   class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Has Role" >
                                           <i class="fas fa-user-edit"></i>
                                        </button>


                                       <div class="dropdown-content">
                                          
                

                                              
                                              <form method='post' action="{{url('add_role/'.$user->id)}}">
                                              {{ csrf_field () }}
                                              <button onclick="this.form.submit()"  class="btn btn-success" style="width: 130px;" type="button">
                                              <input type="hidden" name="role_admin" value='1' > Admin
                                               </button></form>
                                                <form method='post' action="{{url('add_role/'.$user->id)}}">
                                              {{ csrf_field () }}
                                              <button onclick="this.form.submit()"  class="btn btn-info" style="width: 130px; type="button">
                                              <input type="hidden" name="role_editor" value='1'> Editor
                                               </button>
                                            </form>
                                            <form method='post' action="{{url('add_role/'.$user->id)}}">
                                              {{ csrf_field () }}
                                              <button onclick="this.form.submit()"  class="btn btn-warning" style="width: 130px; type="button">
                                              <input type="hidden" name="role_user" value='1'> User
                                               </button>
                                             </form>
                                               
                                          
                                         
                                            
                                       </div> 

                                    </div>
                                     </center>
                                    </td>

                                 </div>
                                </tr>
                               @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


 @endsection
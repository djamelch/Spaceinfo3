  
@extends('index')

@section('content')
<link href="{{asset('assets/css/drop.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/tab.css')}}" rel="stylesheet">
<section style=' background:  #3ebbb7;'>
  <h1>Liste new Users</h1>
        </br>

                <div class="tbl-header">
                  <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                      <tr>
                        <th>User Identfier</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Decision</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="tbl-content">
                  <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                 @foreach($users as $user)
                    @if($user->status===0)
                      <tr>
                        <td>{{$user->matricule}}</td>
                        <td>{{$user->name}} {{$user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->status === 1)
                               <span class="label label-success">Active</span>
                            @else
                               <span class="label label-danger">inactive</span>
                            @endif
                            <span class="label label-warning"> @if( $user->hasRole('Admin'))
                                  <b>Admin </b>
                                 @else
                                   @if( $user->hasRole('Editor'))
                                      <b>Editor </b>
                                   @else
                                      <b>User </b>
                                   @endif 
                                 @endif</span>
                        </td>
                        <td>
                         <div class="btn-group">
                          <div class="pull-left">
                          <form method='POST' class="form-inline" action="{{route('users.destroy', $user->id)}}" >
                                  <button onclick="this.form.submit()"  class="btn btn-danger"  class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Delete this user" class="btn btn-danger btn-xs"> 
                                         {{ csrf_field () }}
                                        {{ method_field ('DELETE') }}
                                       
                                        <i class="fas fa-trash-alt"></i>
                                  </button>
                                      
                                </form> 
                             </div>
                             <div class="pull-right">
                            @if($user->status===0) 
                                 <form method='post' action="{{route('users.approve',$user->id)}}">
                                  <button onclick="this.form.submit();"   class="btn btn-success"  class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Activation">
                                          {{ csrf_field () }}
             
                                    <input type="hidden" name="id" value='{{$user->id}}'>
                                           
                                      <i class="fa fa-check-circle" aria-hidden="true"></i>
                                   </button>
                               </form>
                                     @endif
                               </div>
                                <style>
                                    .dropdown {
                                         position: relative;
                                         display: inline-block;
                                                  }

                                    .dropdown-content {
                                         display: none;
                                        position: absolute;
                                        background-color: #f9f9f9;
                                        min-width: 160px;
                                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                         padding: 12px 16px;
                                         z-index: 1;
                                                     }

                                  .dropdown:hover .dropdown-content {
                                       display: block;
                                          }
                                </style>
                                <div class="dropdown">
                                    <button  class="btn btn-primary" type="button" class="dropbtn"   class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Has Role" >
                                      <i class="fas fa-user-edit"></i>
                                    </button>


                              <div class="dropdown-content">
                                     
                                  <form method='post' action="{{url('add_role/'.$user->id)}}">
                                      {{ csrf_field () }}
                                    <button onclick="this.form.submit()"  class="btn btn-success" style="width: 130px;" type="button">
                                       <input type="hidden" name="role_admin" value='1' > Admin
                                    </button>
                                  </form>
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
                              </div>      
                          </div>
                      </tr>
                      @endif
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </section>
              
@endsection
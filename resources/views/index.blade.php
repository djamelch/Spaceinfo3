<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spaceinfo ENS</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/bootstrap3.3.1.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style_nav.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>

<body>
    <header>
      
        <div class="cd-logo"><a href="/home"><img src="{{asset('assets/img/logo.png')}}" width="60%" alt="Logo"></a></div>
        <!-- Nav bar -->
       

            <nav class="cd-main-nav-wrapper">
                    <ul class="cd-main-nav">
                        <li></i><a href="/home">Home</a></li>
                        <li><a href="/profile">Profile</a></li>
                       
                        <li><a href="#0">Contact</a></li> 
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        <li>
                            <a href="#0" class="cd-subnav-trigger"><span>Menu</span></a>
        
                            <ul>
                                <li class="go-back"><a href="#0">Menu</a></li>
                                <li><a href="#0">Category 1</a></li>
                                <li><a href="#0">Category 2</a></li>
                                @if(Auth::user()->hasRole('Admin'))
                                <li><a href="/admin">Users</a></li>
                                <li><a href="/admin/approve">Publication</a></li>
                                <li><a href="/admin/approve/user">New User</a></li>
                                @endif
                                <li><a href="#0" class="placeholder">Placeholder</a></li>
                            </ul>
                        </li>
                    </ul> <!-- .cd-main-nav -->
            </nav> <!-- .cd-main-nav-wrapper -->
                <a href="#0" class="cd-nav-trigger">Menu<span></span></a>


        <!-- End nav bar    -->
            </header>           

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
             
    <div class="row">
        
          @yield('content')                                                       
        </div>  
    
</div>


         

<script src="{{asset('assets/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script> <!-- Resource jQuery -->
<script src="{{asset('assets/js/modernizr.js')}}"></script>
<script type="text/javascript">
            
    $(function(){
        var postActions   = $( '#list_PostActions' );
        var currentAction = $( '#list_PostActions li.active' );
        if ( currentAction.length === 0 ) {
            postActions.find( 'li:first' ).addClass( 'active' );
        }
        postActions.find( 'li' ).on( 'click', function( e ) {
            e.preventDefault();
            var self = $( this );
            if ( self === currentAction ) {return;}
            // else
            currentAction.removeClass( 'active' );
            self.addClass( 'active' );
            currentAction = self;
        });
    });
</script>
    

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spaceinfo</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">

    </head>

    <body>
         <header>
      <div class="container">
        <img src="" class="logo">
        
      </div>
    </header>
      <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Branding Image -->
                    

        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
    <img src="storage/images/{{ Auth::user()->avatar }}" style="width:35px; height: 40px; position:absolute; top:10px; left:10px; border-radius:70%">
    {{ Auth::user()->name }} <span class="caret"></span>
        </a>
                         <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/home">Home</a></li>
            
            <li class="active"><a href="groups.html">Group</a></li>
            <li class="active"><a href="photos.html">section</a></li>
            <li class="active"><a href='/profile'>Profile</a></li>
              @if(Auth::user()->hasRole('Admin'))
     <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Admin minu
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="/admin">Users</a></li>
    <li><a href="admin/approve/">poblication</a></li>
    <li><a href="#">exp</a></li>
  </ul>
</div>
              @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
            
     @yield('content')


    <footer>
      <div class="container">
        <p>Copyright by groupe Spaceinfo &copy; <?php echo date("Y"); ?></p>
      </div>
    </footer>


    <script src="{{ asset('js/app.js') }}"></script>
      <!-- jQuery -->
    <script src="{{ asset ('assets/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
     
    <script src="{{ asset ('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('assets/js/bootstrap.js')}}"></script>
    
    <script src="{{ asset ('assets/js/ekko-lightbox.js')}}"></script>

</body>

</html>
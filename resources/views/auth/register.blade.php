<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Spaceinfo ENS</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/cover.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/floating-labels.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  </head>

  <body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">
            <i class="fas fa-tv"></i>
          ENS SpaceInfo</h3>          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link" href="/contact">Contact</a>
            <a class="nav-link" href="/about">About</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
                    @if (session('msg'))
                        {!! session('msg') !!}
                    @endif
    <form class="form-signin" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}
      <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal"><strong>Register</strong></h1>
        <p>Fill the registration form with your truth informations, Or Go To Sign Up <a href="/login">Here</a> </p>
      </div>

      <!-- form -->
      <div class="form-label-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <input  id="name" name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Enter Your" required autofocus>
          @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
             </span>
          @endif
        <label for="name">Name</label>
      </div>

       <div class="form-label-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <input  id="first_name" name="first_name" value="{{ old('first_name') }}" type="text" class="form-control" placeholder="Enter Your" required autofocus>
          @if ($errors->has('first_name'))
              <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
             </span>
          @endif
        <label for="first_name">first_name</label>
      </div>

       
     

        

      <div class="form-label-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control" placeholder="Email address" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        <label for="email">Email address</label>
      </div>

      <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        <label for="password">Password</label>
      </div>
      
      <div class="form-label-group">
        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm Password" required>
        <label for="password-confirm">Confirm Password</label>
      </div>


      <div class="form-label-group">
         Student <input type ='radio' id='1' name='1'  onclick="check()" value='student'>
          No Student <input type ='radio' id='2' name='1'  onclick="nocheck()" >
      </div>          
         
           <div id="3">

          </div>


       <script  >
        function nocheck()
        {
          document.getElementById("3").innerHTML ='<div id="2"></div>';

          
        }
       
       function check()
        {
          document.getElementById("3").innerHTML ='<div class="form-label-group{{ $errors->has("matricule") ? " has-error" : "" }}"><input  id="matricule" name="matricule" value="0" type="text" class="form-control" placeholder="Enter Your" required autofocus>@if ($errors->has("matricule")) <span class="help-block"><strong>{{ $errors->first("matricule") }}</strong></span>@endif<label for="matricule"> Matricule</label></div><div class="form-label-group"><select class="custom-select d-block w-100" id="levelclass" name="level"> <option value="">Choose Your Level Class</option><option>1st Class</option><option>2nd Class</option><option>3rd Class</option> <option>4th Class</option> <option>5th Class</option> </select> </div> <div class="form-label-group"><select class="custom-select d-block w-100" id="section"  name="section"><option value="">Choose Your Section</option><option>Section A</option> <option>Section B</option> <option>Section C</option></select> </div><div class="form-label-group">  <select class="custom-select d-block w-100" id="group"   name="group"> <option value="">Choose Your Group</option> <option>1st Group</option>  <option>2nd Group</option><option>3rd Group</option> <option>4th Group</option></select></div> ';
       }
        </script>


      <button class="btn btn-lg btn-primary btn-block btn-outline-primary" type="submit">
          <i class="fas fa-user-plus"></i>
          Register
      </button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Cover template for <a href="/">ENS SpaceInfo Website</a>.</p>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>

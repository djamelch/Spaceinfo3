<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cover Template for Bootstrap</title>

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
    <form class="form-signin" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal"><strong>Login</strong></h1>
        <p>Use Your Email And Password To Sign Up, Otherwise Go To Regiser <a href="/register">Here</a> </p>
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

      <button class="btn btn-lg btn-primary btn-block btn-outline-primary" type="submit">
          Login
          <i class="fas fa-sign-in-alt"></i>
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

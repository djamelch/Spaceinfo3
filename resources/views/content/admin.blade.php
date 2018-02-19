@extends('index')



@section('content')

      <div class="container">
        <div class="row">
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
                     <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/all_poste"> Publications</a></li>
            <li class="active"><a href="/members">Members</a></li>
            <li class="active"><a href="/groups">groups</a></li>
            <li class="active"><a href="/">page</a> </li>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="col-md-12">

                <h1 class="page-header">
                    
                    <small>is admin</small>
                </h1>

@yield('content')

 </div>
 </div></div>


 @endsection
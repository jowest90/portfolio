<!DOCTYPE html>
<<<<<<< HEAD
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portfolio forum</title>

    <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
      @include('layouts.inc.navbar')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
=======
<html>
  <head>
    <meta charset="utf-8">
    <title>Tools Of The Trade</title>
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel="stylesheet" href="/public/css/nav.css">
    <link rel="stylesheet" href="/public/css/user.css">
  </head>
  <body>
<div class ="topbanner" id="banner">
    <h1>Dental Training</h1>
    </div>
        <div id="wrapper" class="active">
      <!-- TOP NAVIGATION BAR -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-top:90px;">
    <div class="container-fluid">
      <div id="navbar" class="collapse navbar-collapse">
       <ul class="nav navbar-nav">
         <li><a href="{{ url('/admin') }}">Admin Home</a></li>
         @if (Auth::guard('admin')->check())
         <li><a href="{{ url('/admin/createUser') }}">Create User</a></li>
         <li><a href="{{ url('/admin/createAdmin') }}">Create Admin</a></li>
         <li><a href="{{ url('/admin/usersview') }}">Users</a></li>
         @else

         @endif
       </ul>
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guard('admin')->check())
            <li>
           <a href="{{ url('/admin/logout') }}">
               Logout
           </a>

           <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
           </form>
         </li>
         </ul>
            @else
            @endif
        </ul>
      </div>
    </div>
  </nav> <!-- /OP NAVIGATION BAR -->

    <!-- Page content -->
    <div id="page-content-wrapper" style="margin-top:90px;">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content') <!-- ALL USER PAGES WILL GENERATE HERE -->
                </div>
            </div>
        </div>
    </div><!-- Page content -->

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script>
  $(document).ready(function(){
    $("#sidebar-btn").click(function(e) {
           e.preventDefault();
           $("#wrapper").toggleClass();
           $('#sidebar').toggleClass('visible');
          //  alert(1);
       });

    $('.start-scenario').click(function(){
      var form = $(this).parent().parent().children()[0];
      form.submit();
    });
  });
  </script>


  </body>
>>>>>>> parent of 0fbe177... run back
</html>

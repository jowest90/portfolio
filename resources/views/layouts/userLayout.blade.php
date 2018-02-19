<!DOCTYPE html>
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-top:80px;">
		<div class="container-fluid">
			<div class="navbar-header">
        @if (Auth::guest())
        @else
        <div id="sidebar-btn">
      			<span></span>
      			<span></span>
      			<span></span>
      		</div>
           @endif
			</div>
      <div id="navbar" class="collapse navbar-collapse">
      @if (Auth::guest())
      @else
        <a href="#" class="navbar-brand" id="sidebar-title-btn">Scenarios</a>
       @endif
       <ul class="nav navbar-nav">
         @if (Auth::guest())
         @else
         <li><a href="{{ url('/home') }}">Home</a></li>
         <li><a href="{{ url('/help') }}">FAQ</a></li>
         <li><a href="{{ url('/extra') }}">Extra Material</a></li>
         @endif
       </ul>
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else

               <li>
              <a href="{{ url('/logout') }}">
                  Logout
              </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>              @endif
        </ul>
      </div>
		</div>
	</nav> <!-- /OP NAVIGATION BAR -->

    <!-- SIDEBAR -->
      @if (Auth::guest())
      @else
    <div id="sidebar-wrapper" style="margin-top:80px;">
      <ul>
        <?php
          $scenarios = App\models\Scenario::getScenarios();
          foreach ($scenarios as $scenario){
            echo '<div>';
            $scenario->createStartForm();
            echo "<li><a href='#' id='$scenario->id' class='start-scenario'>$scenario->name</a></li>";
            echo '</div>';
          }
         ?>
      </ul>
    </div>
    @endif<!-- SIDEBAR -->

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
var optionSelected = false;
$(document).ready(function(){
  $("#sidebar-btn").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass();
         $('#sidebar').toggleClass('visible');
        //  alert(1);
     });
  $("#sidebar-title-btn").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass();
         $('#sidebar').toggleClass('visible');
        //  alert(1);
     });
  $('.start-scenario').click(function(){
    var form = $(this).parent().parent().children()[0];
    form.submit();
  });
  $("#submit-btn").attr("disabled", "disabled");
  $("#submit-btn").addClass('disabled');
  function activateButton(){
    if (optionSelected == true){
      $("#submit-btn").removeAttr("disabled");
      $("#submit-btn").removeClass('disabled');
    }
  }
  $(".options").click(function(){
    optionSelected = true;
    activateButton();
  });
});
</script>
  </body>
</html>

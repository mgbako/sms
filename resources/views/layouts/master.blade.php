<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AddTen</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.4 -->
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="icon" href="{{ asset('/img/logoo3.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('/img/logoo3.png') }}" type="image/png" />
  <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
  @yield('scripts')

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
@if(!Auth::guest())
  <body class="skin-blue sidebar-mini">
  <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>10</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="{{ asset('/img/logo.png') }}" alt="Add Ten" /><b>Add</b>Ten</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if (Auth::user()->profile)
                    <img src="/{{Auth::user()->profile->image}}" class="user-image" alt="User Image">
                  @else
                    <img src="/" class="user-image" alt="User Image">
                  @endif
                  <span class="hidden-xs">{{ Auth::user()->username }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    @if (Auth::user()->profile)
                      <img src="/{{Auth::user()->profile->image}}" class="user-image" alt="User Image">
                    @else
                      <img src="/" class="user-image" alt="User Image">
                    @endif
                    <p>
                      {{ Auth::user()->username }}
                      <small>School Admin</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{ url('/account/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
                
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
  
      @yield('content')
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015 
          <a href="http://www.pottersmedia.com">
            Pottersmedia Support Services
          </a>.
        </strong> All rights reserved.
      </footer>

   </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/plugins/knob/jquery.knob.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Bootstrap 3.3.4 -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- jQuery Knob -->
    <script src="{{ asset('/plugins/knob/jquery.knob.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- page script -->
    <script src="{{ asset('js/scores.js')}}"></script>
  
    <script src="{{ asset('/js/page.js')}}"></script>
    <script src="{{ asset('js/paginate2.js')}}"></script>
  
    <script src="{{ asset('/js/progressBar.js')}}"></script>
    <script src="{{ asset('/js/countdown.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
    
  </body>
@endif
</html>

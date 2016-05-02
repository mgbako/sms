<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@if (School::first())
    <title>{{ucfirst(School::first()->name)}}</title>
  @else
    <title>AddTen</title>
  @endif

	<link href="/css/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	  <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="/css/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('/css/fullcalendar.print.css') }}" media="print">

    <link rel="stylesheet" href="/css/square/blue.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/_all-skins.min.css">
    <link rel="stylesheet" href="/css/skin-blue.min.css" >
    <link href="/css/custom.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logoo3.png') }}" type="image/x-icon">
	<link rel="shortcut icon" href="{{ asset('/img/logoo3.png') }}" type="image/png" />
  @yield('scripts')

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
@if(!Auth::guest())
  <body class="skin-blue sidebar-mini" data-spy="scroll" data-target=".sidebar-menu">
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
                      <small>{{ Auth::user()->type }}</small>
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
        <strong>Copyright &copy; {{date('Y')}} 
          <a href="http://www.pottersmedia.com">
            Pottersmedia Support Services
          </a>.
        </strong> All rights reserved.
      </footer>

   </div><!-- ./wrapper -->
  <!-- Scripts -->
   @yield('myscript')
  <script src="{{ asset('/js/jquery.js')}}"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('/js/fastclick.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/js/app.min.js') }}"></script>
  <script src="{{ asset('/js/dropzone.js') }}"></script>
  <script src="{{ asset('/js/icheck.min.js') }}"></script>
  <script src="{{ asset('/js/select2.min.js') }}"></script>
  <script src="{{ asset('/js/countdown.jquery.js')}}"></script>
  <script src="{{ asset('/js/paginate.js')}}"></script>
   <!-- DataTables -->
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{ asset('/js/tables.js')}}"></script>
  <script src="{{ asset('/js/custom.js')}}"></script>
  <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
@endif
</html>

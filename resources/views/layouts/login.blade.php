<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ucfirst(School::first()->name)}}</title>

	<link href="/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/square/blue.css">
  <link rel="stylesheet" href="/css/custom.css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

  
	<link rel="icon" href="{{ asset('/img/logoo3.png') }}" type="image/x-icon">
	<link rel="shortcut icon" href="{{ asset('/img/logoo3.png') }}" type="image/png" />

</head>
<body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="/"><img src="{{ asset('/img/logo.png') }}" alt="Add Ten" /><b>Add</b>Ten</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
          @yield('content')

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	<script src="{{ asset('/js/jquery.js') }}"></script>

	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	  <script src="{{ asset('/js/icheck.min.js') }}"></script>	    
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
</html>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scholr</title>
	<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">	
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Scholr</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						{{-- <li><a href="{{ url('/auth/login') }}" class="dropdown-toggle" data-toggle="dropdown" role="button">Login</a></li> --}}
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->firstname }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Profile</a></li>
								<li><a href="{{ url('/auth/logout') }}">Edit Profile</a></li>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@if(Session::has('message'))
		{!! Session::get('message') !!}
	@endif


	<div class="container-fluid">
		<div class="row">
			@unless(Auth::guest())
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						{!! Html::image('/img/users/profile.jpg', 'Responsive image', ['class'=>'img-responsive img-circle']) !!}
					</div>
					<div class="panel-body">
					  <ul class="nav nav-pills nav-stacked">
					    <li><a href="/">Dashboard</a></li>
					    <li>{!! link_to_route('exams.index', 'Exam') !!}</li>
					    @if(Auth::user()->type == "Admin")
						    <li>{!! link_to_route('classes.index', 'Classes') !!}</li>
						    <li>{!! link_to_route('questions.index', 'Questions') !!}</li>
						    <li>{!! link_to_route('subjects.index', 'Subjects') !!}</li>
						    <li>{!! link_to_route('students.index', 'Students') !!}</li>
						    <li>{!! link_to_route('teachers.index', 'Teachers') !!}</li>
						@endif
					  </ul>
					</div>
				</div>
			</div>
			@endunless
			<div class="col-lg-10">
				@yield('content') 
			</div>
		</div>
	</div>
	
		

	<!-- Scripts -->
	<script src="{{ asset('/js/jquery.js')}}"></script>
	<script src="{{ asset('/js/jquery-ui.js')}}"></script>
	<script src="{{ asset('/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('/js/countdown.jquery.js')}}"></script>
	<script src="{{ asset('/js/custom.js')}}"></script>
</body>
</html>

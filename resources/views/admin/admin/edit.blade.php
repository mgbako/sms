@extends('layouts.admin')
@section('content')
	@include('partials.adminDashboard')
	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit
			<small>admin Updating Process</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">admin</a></li>
			<li class="active">Edit</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				@include('errors.formError')
			</div>

			<div class="col-xs-12">            
	          <div class="box box-info">
	            <div class="box-body">
					<div class="row">
						{!! Form::model($admin, ['method'=>'patch', 'route'=>['admins.update', $admin->id], 'files' => true])!!}
						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::text('staffId', null, ['class'=>'form-control', 'placeholder'=>'Enter admin ID', 'disabled']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>	
								{!! Form::text('firstname', null, ['class'=>'form-control', 'placeholder'=>'Enter First Name']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'Enter Last Name']) !!}
							</div>
							</div>

							<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								{!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'example@gmail.com']) !!}
							</div>
						</div>
						
						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::select('gender', [''=>'Select Gender', 'Male'=>'Male', 'Female'=>'Female'], $admin->gender, ['class'=>'form-control guiSelect'])!!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::input('date', 'dob', $admin->dob, ['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::input('tel', 'phone', null, ['class'=>'form-control', 'placeholder'=>'Enter Phone Number']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::text('state', null, ['class'=>'form-control', 'placeholder'=>'Enter State of Origin']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::text('nationality', null, ['class'=>'form-control', 'placeholder'=>'Enter Nationality']) !!}
							</div>
						</div>

						<div class="col-md-6"><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
								{!! Form::file('image', ['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="col-md-6">	<br>						<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								{!! Form::textarea('address', null, ['class'=>'form-control', 'placeholder'=>'Enter Home Address', 'rows'=>3]) !!}
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="box-footer">
								{!! Form::submit('Update admin', ['class'=>'btn btn-success pull-left']) !!}
								<a href="{{ route('admins.index') }}" class="btn btn-default pull-right">Cancel</a>
							</div>
						</div>

						{!!Form::close()!!}
					</div>{{-- End of Row --}}
		   		</div>{{-- End of box body --}}
		  	  </div>{{-- End of box info --}}
			</div>{{-- End of col-12 --}}
		</div>{{-- End of Row --}}
	</section><!-- End of Content -->
</div><!-- /.content-wrapper -->	
@stop
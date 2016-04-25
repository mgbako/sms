@extends('layouts.admin')
@section('content')
@include('partials.profileDashboard')
	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	@include('flash::message ')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Creation
      <small>Profile Creation Process</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/students">Student</a></li>
      <li class="active">Registration</li>
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
          {!! Form::model($profile, ['method'=>'patch', 'route'=>['profile.update', $profile->slug], 'files' => true])!!}

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
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {!! Form::select('gender', [''=>'Select Gender', 'Male'=>'Male', 'Female'=>'Female'], $profile->gender, ['class'=>'form-control'])!!}
              </div>
            </div>

            <div class="col-md-6"><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-time"></i></span>
                {!! Form::input('date', 'dob', $profile->dob, ['class'=>'form-control']) !!}
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
            
            <div class="col-md-6">  <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {!! Form::textarea('address', null, ['class'=>'form-control', 'placeholder'=>'Enter Home Address', 'rows'=>3]) !!}
              </div>
            </div>

            <div class="col-md-6">  <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {!! Form::textarea('bio', null, ['class'=>'form-control', 'placeholder'=>'Describe yourself a little', 'rows'=>3]) !!}
              </div>
            </div>
            <div class="col-md-6"><br>
              
            </div>
            <div class="col-md-12">
              <div class="box-footer">
                {!! Form::submit('Save', ['class'=>'btn btn-success pull-left']) !!}
                <a href="{{ route('profile.show', [$profile->slug]) }}" class="btn btn-default pull-right">Cancel</a>

              </div>
            </div>

            {!!Form::close()!!}
          </div>{{-- End of Row --}}
          </div>{{-- End of box body --}}
          </div>{{-- End of box info --}}
      </div>{{-- End of col-12 --}}
    </div>{{-- End of Row --}}
  </section><!-- End of Content -->
</div>
@stop
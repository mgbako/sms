@extends('layouts.admin')
@include('partials.adminDashboard')
@section('content')
@include('flash::message ')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Create A New Admin Record</div>
        <div class="panel-body">
            @include('errors.formError')


            	{!! Form::open(['route'=>'admins.store'])!!}
				 				
							{!!Form::close()!!}
          </div>
      </div>
    </div>
  </div>
</div>
@stop
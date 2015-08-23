@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
			  <div class="panel-heading text-center"><h1>Add New Class</h1></div>
			  <div class="panel-body">
				{!! Form::open(['route'=>'classes.store'])!!}
				@include('classes.form', ['submitButton'=>'Add New Class'])
				{!!Form::close()!!}
			  </div>
			</div>
		</div>

		<div class="col-lg-4">
			@include('errors.list')
		</div>
	</div>
	
@stop
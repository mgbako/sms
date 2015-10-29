@extends('layouts.staff')

@section('content')
@include('errors.formError')
	<div class="">
		<div class="col-lg-12">
		<h1 class="alignCenter">Add New Class</h1>
			{!! Form::open(['route'=>'classes.store'])!!}
			@include('partials.classForm', ['submitButton'=>'Add New Class'])
			{!!Form::close()!!}
		</div>

		<div class="col-lg-4">
			@include('errors.list')
		</div>
	</div>
	
@stop
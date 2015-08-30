@extends('layouts.teacher')

@section('content')
@include('flash::message ')
	<div class="">
		<div class="col-lg-12">
		<h1 class="alignCenter">Add New Subject</h1>
			{!! Form::open(['route'=>'subjects.store'])!!}
			@include('partials.subjectForm', ['submitButton'=>'Add New Subject'])
			{!!Form::close()!!}
		</div>

		<div class="col-lg-4">
			@include('errors.list')
		</div>
	</div>
	
@stop
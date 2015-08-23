@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading"><h1 class="alignCenter">Edit: {!! $class->name !!} </h1></div>
				<div class="panel-body">
					{!! Form::model($class, ['method'=>'patch','route'=>['classes.update', $class->id]])!!}
					@include('subjects.form', ['submitButton'=>'Update Class'])
					{!!Form::close()!!}
				</div>
			</div>			
		</div>

		<div class="col-lg-4">
			@include('errors.list')
		</div>
	</div>
	
@stop
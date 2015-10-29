@extends('layouts.staff')

@section('content')
@include('flash::message ')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Create A New Student Record</div>
        <div class="panel-body">
            @include('errors.formError')


            	{!! Form::open(['route'=>'admins.store'])!!}
				 				@include('partials.staffForm', ['submitButtonText'=>'Create New Admin Staff'])
							{!!Form::close()!!}
          </div>
      </div>
    </div>
  </div>
</div>
@stop
@extends('layouts.app')
@section('content')
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Admin Users Login Area</div>
        <div class="panel-body">
            @include('errors.formError')
            {!! Form::open(['class'=>'form-horizontal', 'role'=>'form']) !!}
              @include('partials.loginForm')

            {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>
</div>
@stop
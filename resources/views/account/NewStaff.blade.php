@extends('layouts.login')
@section('content')
  <p class="login-box-msg">Create an Admin User Account</p>
    <div class="container-fluid">
      @include('errors.formError')
      {!! Form::open(['class'=>'form-horizontal', 'role'=>'form']) !!}
        @include('partials.newAccountForm', [ 'name'=>'Staff ID'])
      {!! Form::close() !!}
@stop
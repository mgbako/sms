@extends('layouts.login')
@section('content')
    <div class="container-fluid">
      <p class="login-box-msg">
        Admin Users Login Area, Sign in to start your session
      </p>
      @include('errors.formError')
      {!! Form::open(['class'=>'form-horizontal', 'role'=>'form']) !!}
        @include('partials.loginForm')

      {!! Form::close() !!}
      <a href="/account/newadmin" class="text-center">
     Register a as new member
   </a><br>
    <a href="/">This is not your login page? Go Back</a>
@stop
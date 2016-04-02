@extends('layouts.login')
@section('content')
     <div class="row">
      <div class="col-lg-12">
        <p class="login-box-msg">Sign in to start your session</p>
        @include('errors.formError')
        </div>
      </div>
      {!! Form::open(['class'=>'form-horizontal', 'role'=>'form']) !!}
        @include('partials.loginForm')

      {!! Form::close() !!}
    <div class="row">
      <div class="col-lg-12">
        <a href="/account/newstudent" class="text-center">
          Register a as new member
        </a>
        </div>
        <div class="col-lg-12">
          <a href="/">This is not your login page? Go Back</a>
        </div>
    </div>
@stop
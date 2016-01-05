@extends('layouts.login')
@section('content')
  <p class="login-box-msg">Create A Student Account</p>
  @include('errors.formError')
  {!! Form::open(['class'=>'form-horizontal', 'role'=>'form']) !!}
    @include('partials.newAccountForm')
  {!! Form::close() !!}
  <a href="/">Head back Home</a>
  <span class="glyphicon glyphicon-lock form-control-feedback"></span> 
@stop
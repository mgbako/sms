@extends('layouts.app')
@section('content')
	<p class="login-box-msg">Who are you?<br>
		<small>- Choose your login screen -</small>
	</p>
 <div class="box-footer">
  <a href="account/teacherlogin">
  <button type="submit"  onClick=""class="btn btn-info pull-left">
      <i class="fa fa-group"></i> Staff</button>
  </a>
  <a href="account/studentlogin">
  <button type="submit" class="btn btn-info pull-right">
      <i class="fa fa-user"></i> Student
  </button>
  </a>
</div><!-- /.box-footer -->
@stop
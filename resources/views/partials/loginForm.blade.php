
<div class="form-group">
  {!! Form::label('email', 'E-Mail Address', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'example@gmail.com']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
      {!! Form::input('password', 'password', null, ['class'=>'form-control']) !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember"> Remember Me
      </label>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
    {!! Form::submit('Login', ['class'=>'btn btn-primary']) !!}

    {!! Html::link('/password/email', 'Forgot Your Password?') !!}
  </div>
</div>

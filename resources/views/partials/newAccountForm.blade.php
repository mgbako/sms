<section class="form-group">
  {!! Form::label('loginId', $name, ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('loginId', null, ['class'=>'form-control', 'placeholder'=>'Enter Your Student Id']) !!}
  </div>
</section>
<section class="form-group">
  {!! Form::label('username', 'Username', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'chose a username']) !!}
  </div>
</section>

<section class="form-group">
  {!! Form::label('email', 'Email Address', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
   {!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'example@gmail.com']) !!}
  </div>
</section>

<section class="form-group">
  {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
     {!! Form::input('password','password', null, ['class'=>'form-control', 'placeholder'=>'Choose a Password']) !!}  
  </div>
</section>

<section class="form-group">
  {!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
     {!! Form::input('password','password_confirmation', null, ['class'=>'form-control', 'placeholder'=>'Type Password Again']) !!}  
  </div>
</section>

<section class="form-group">
  <div class="col-md-6 col-md-offset-4">
    {!! Form::submit('Create Account', ['class'=>'btn btn-primary']) !!}
  </div>
</section>

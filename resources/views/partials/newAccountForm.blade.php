<section class="form-group has-feedback">
    {!! Form::text('loginId', null, ['class'=>'form-control', 'placeholder'=>'Enter Your Student Id']) !!}
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
</section>

<section class="form-group has-feedback">
    {!! Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'chose a username']) !!}
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
</section>

<section class="form-group has-feedback">
   {!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'example@gmail.com']) !!}
   <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</section>

<section class="form-group has-feedback">
     {!! Form::input('password','password', null, ['class'=>'form-control', 'placeholder'=>'Choose a Password']) !!}
     <span class="glyphicon glyphicon-lock form-control-feedback"></span>  
</section>

<section class="form-group has-feedback">
     {!! Form::input('password','password_confirmation', null, ['class'=>'form-control', 'placeholder'=>'Type Password Again']) !!}
     <span class="glyphicon glyphicon-lock form-control-feedback"></span>  
</section>

<section class="form-group has-feedback">
    {!! Form::submit('Create Account', ['class'=>'btn btn-primary btn-block btn-flat']) !!}
</section>

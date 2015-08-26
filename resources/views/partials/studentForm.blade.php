
<div class="form-group">
{!!  Form::label('firstname', 'First Name', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
      {!! Form::text('firstname', null, ['class'=>'form-control', 'placeholder'=>'Enter Student First Name']) !!}
  </div>
</div>

<div class="form-group">
{!!  Form::label('lastname', 'Last Name', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
      {!! Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'Enter Student Last Name']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('student_id', 'Student ID', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('student_id', null, ['class'=>'form-control', 'placeholder'=>'Enter Student Student Id']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('email', 'Email Address', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
   {!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'example@gmail.com']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('phone', 'Phone Number', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::input('number', 'phone', null, ['class'=>'form-control', 'placeholder'=>'Enter Student Phone Number']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('dob', 'Date Of Birth', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::input('date', 'dob', date('Y-m-d'), ['class'=>'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('gender', 'Sex', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::select('gender', ['male'=>'male', 'female'=>'female'], null, ['class'=>'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('address', 'Adress', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Student Address ']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('', 'State', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('state', null, ['class'=>'form-control', 'placeholder'=>'State of Origin ']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('nationality', 'Country', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('nationality', null, ['class'=>'form-control', 'placeholder'=>'Country Of Origin ']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('class', 'Class', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('class', null, ['class'=>'form-control', 'placeholder'=>'Class Student Begins At']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('end_date', 'Graduation Year', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::input('date', 'end_date', date('Y-m-d'), ['class'=>'form-control']) !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
  </div>
</div>

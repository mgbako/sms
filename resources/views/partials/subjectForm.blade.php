<section class="form-group">
  {!! Form::label('name', 'Name', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-10">
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter a Class Name']) !!}
  </div>
</section>

<section class="form-group">
  <div class="col-md-10 col-md-offset-2">
    {!! Form::submit($submitButton, ['class'=>'btn btn-primary']) !!}
  </div>
</section>
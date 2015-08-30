          <div class="form-group">
              {!! Form::hidden('term', $term) !!}
            </div>

            <div class="form-group">
              {!! Form::hidden('class_id', $classe_id) !!}
            </div>

            <div class="form-group">
              {!! Form::hidden('subject_id', $subject_id) !!}
            </div>

            <div class="form-group">  
              {!! Form::textarea('question', null, ['class'=>'form-control', 'placeholder'=>'Enter Question']) !!}
            </div>

            <div class="form-group">
              <p>{!! Form::radio('answer', 'option1') !!} Answer</p>
              {!! Form::text('option1', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 1']) !!}
            </div>

            <div class="form-group">
              <p>{!! Form::radio('answer', 'option2') !!} Answer</p>
              {!! Form::text('option2', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 2']) !!}
            </div>

            <div class="form-group">
              <p>{!! Form::radio('answer', 'option3') !!} Answer</p>
              {!! Form::text('option3', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 3']) !!}
            </div>

            <div class="form-group">
              <p>{!! Form::radio('answer', 'option4') !!} Answer</p>
              {!! Form::text('option4', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 4']) !!}
            </div>


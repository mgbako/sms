@extends('layouts.teacher')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><h1>All Questions In Exam</h1></div>
		<div class="panel-body">
			@include('flash::message ')
			@include('errors.list')
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			  Add New Question For This Exam
			</button>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Question</th>
						<th>Answer</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				@foreach($questions as $question)
					<tbody>
						<td>{!! $count++ !!}</td>
						<td>{!! link_to_route('questions.show', $question->question, $question->id) !!}</td>
						<td>{!! $question->answer['answer'] !!}</td>
						<td>{!! link_to_route('questions.index', 'Edit', $question->id, ['class'=>'btn btn-info btn-xs', 'data-toggle'=>'modal', 'data-target'=>'#updateModal']) !!}</td>
						<td>{!! link_to_route('questions.delete', 'Delete', $question->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
					</tbody>
				@endforeach
			</table>
		</div>
	</div>
	<section id="question-modal">
  <!-- Modal -->
  <article class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <article class="modal-content">
          <section class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
              Select The Class and Term This exam is for
            </h4>
          </section><!-- end model-header -->
	        	{!! Form::open(['url'=>'questions']) !!}
	            <section class="modal-body">
	            		@include('partials.newExamForm', [$term, $classe_id, $subject_id])
	            </section><!-- end modal-body -->
            <section class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">
              	Close
              </button>
              {!! Form::submit('Save Changes', ['class'=>'btn btn-primary']) !!}
            </section><!-- end modal-footer -->
          {!! Form::close() !!}
        </article><!-- end modal-content -->
      </div><!-- end modal-dialog -->
  </article><!-- end modal -->
</section><!-- end question-modal -->
	
@stop

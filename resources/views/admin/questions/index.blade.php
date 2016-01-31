@extends('layouts.admin')
@section('scripts')
  <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({
        selector: "#question",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
  </script>
@stop
@section('content')
@include('partials.teachersDashboard')
	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
@include('flash::message ')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Subject Question
			<small>Staff against Subject Question of a particular Cass</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="/profile">Profile</a></li>
			<li class="active">Subject Question</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				@if($questionCount < $school->number)
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					Add New Question
					</button>
				@else
				<span class="alert alert-success">You Have Added The Maximum Numbers Of Question - {{$school->number}}</span>
				@endif
				<p>&nbsp;</p>
				<!-- /.box -->

				<div class="box">
					<div class="box-header">

					</div><!-- /.box-header -->
					<div class="box-body">
						<div align="center">

							<table class="table table-bordered table-responsive" id="questions">

								<thead>
									<tr>
										<th>#</th>
										<th>Question</th>
										<th>Answer</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
								@foreach($questions as $question)
								<tr>
									<td>{!! $count++ !!}</td>
									<td>
										<a href="{{ route('classes.subjects.questions.show', [$classe_id, $subject_id, $question->id]) }}">{!! $question->question !!}</a>
									</td>
									<td>{!! $question->answer['answer'] !!}</td>
									<td>
										{!! link_to_route('classes.subjects.questions.edit', 'Edit', 
										[$classe_id, $subject_id, $question->id], 
										['class'=>'btn btn-info btn-xs']) !!}

										<a href="/classes/{{$classe_id}}/subjects/{{$subject_id}}/questions/edits?page=1"></a>
									</td>
										
									<td>
										{!! link_to_route('classes.subjects.questions.delete', 'Delete', 
										[$classe_id, $subject_id, $question->id], 
										['class'=>'btn btn-danger btn-xs']) !!}
									</td>
								</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add New Question</h4>
	      </div>
	      <div class="modal-body">
	      	@include('errors.formError')
	        {!! Form::open(['route'=> ['classes.subjects.questions.store', $classe_id, $subject_id] ]) !!}
				<div class="row">
					<div class="form-group">
						{!! Form::hidden('term', $school->term) !!}
					</div>

					<div class="form-group">
						{!! Form::hidden('classe_id', $classe_id) !!}
					</div>

					<div class="form-group">
						{!! Form::hidden('subject_id', $subject_id) !!}
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label><i class="fa fa-list-alt"></i> Question</label>
							<div class="form-group">
								{!! Form::textarea('question', null, ['class'=>'form-control', 'placeholder'=>'Enter Question', 'rows'=>6, 'id'=>'question']) !!}
							</div>
						</div><!-- /.form-group -->
					</div><!-- /.col -->

					<div class="col-md-12">
						<br>
					</div>
					<div class="col-md-12">
						<dt>Answers</dt>
					<br>
				</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="input-group">
								<span class="input-group-addon">
									{!! Form::radio('answer', 'option1') !!}
								</span>
								{!! Form::text('option1', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 1']) !!}
							</div><!-- /input-group --><br>
						</div>

						<div class="col-lg-12">
							<div class="input-group">
								<span class="input-group-addon">
									{!! Form::radio('answer', 'option2') !!}
								</span>
								{!! Form::text('option2', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 2']) !!}
							</div><!-- /input-group --><br>
						</div>

						<div class="col-lg-12">
							<div class="input-group">
								<span class="input-group-addon">
									{!! Form::radio('answer', 'option3') !!}
								</span>
								{!! Form::text('option3', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 3']) !!}
							</div><!-- /input-group --><br>
						</div>

						<div class="col-lg-12">
							<div class="input-group">
								<span class="input-group-addon">
									{!! Form::radio('answer', 'option4') !!}
								</span>
								{!! Form::text('option4', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 4']) !!}
							</div><!-- /input-group --><br>
						</div>
					</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      {!!Form::close()!!}
	    </div>
	  </div>
	</div>
	<!-- End of Modal -->
@stop

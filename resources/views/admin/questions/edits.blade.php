@extends('layouts.admin')
@section('myscript')
  <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
     CKEDITOR.replace( 'question', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
        });
  </script>
@stop
@section('content')
@include('partials.adminDashboard')
	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Subject Question
			<small>Staff against Subject Question of a particular Class</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#">Subject</a></li>
			<li class="active">Subject Question</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- SELECT2 EXAMPLE -->
		<div class="box box-default">
			@foreach($questions as $question)
			{!! Form::model($question, ['method'=>'patch', 'route'=>['classes.subjects.questions.update', $id, $subjectId, $question->id]])!!}
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						@include('errors.formError')
					</div>
					<div class="col-md-12" style="opacity: .9; pointer-events: none;">
						<div class="form-group">
							<label><i class="fa fa-list-alt"></i>Question</label>
							<div class="form-group">
								{!! Form::textarea('question', null, ['class'=>'form-control', 'disabled', 'placeholder'=>'Enter Question', 'rows'=>6, 'id'=>'question']) !!}
							</div>
						</div><!-- /.form-group -->
					</div><!-- /.col -->
					
					<div class="col-md-12">
						<dt>Answers</dt>
						<br>
					<div class="row" style="opacity: .9; pointer-events: none;">
						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">
									{!! Form::radio('answer', 'option1') !!}
								</span>
								{!! Form::text('option1', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 1', 'disabled']) !!}
							</div><!-- /input-group -->
						</div>

						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">
									{!! Form::radio('answer', 'option2') !!}
								</span>
								{!! Form::text('option2', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 2', 'disabled']) !!}
							</div><!-- /input-group -->
						</div>

						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">
									{!! Form::radio('answer', 'option3') !!}
								</span>
								{!! Form::text('option3', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 3', 'disabled']) !!}
							</div><!-- /input-group -->
						</div>

						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">
									{!! Form::radio('answer', 'option4') !!}
								</span>
								{!! Form::text('option4', null, ['class'=>'form-control', 'placeholder'=>'Enter Option 4', 'disabled']) !!}
							</div><!-- /input-group -->
						</div>
					</div>

					<div class="modal-footer">
						<p><span class="badge">{{$totalPer}}% Complete</span></p>
						<div class="progress progress-sm active">
							<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="1" aria-valuemax="{{$totalquestion}}" style="width: {{$totalPer}}%">
								<span class="sr-only">{{$totalPer}}% Complete</span>
							</div>
						</div>                   
						
						{!! $questions->render()  !!}
					</div>

					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.box-body -->
			<div class="box-footer">
				<a class="btn btn-default" href="{{ route('subjectAnalysis.index')}}">
					<i class="fa fa-arrow-left"></i> Back
				</a>
			</div>
			{!!Form::close()!!}

			@endforeach
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop
@extends('layouts.master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><h1>All Questions</h1></div>
		<div class="panel-body">
			{!! link_to_route('questions.create', 'Add New Question', '', ['class'=>'btn btn-primary']) !!}
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
						<td>{!!$question->answer!!}</td>
						<td>{!! link_to_route('questions.edit', 'Edit', $question->id, ['class'=>'btn btn-info btn-xs']) !!}</td>
						<td>{!! link_to_route('questions.delete', 'Delete', $question->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
					</tbody>
				@endforeach
			</table>
		</div>
	</div>
	<div class="col-lg-8">
		
	</div>
	
@stop
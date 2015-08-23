@extends('layouts.master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><h1>All Subject</h1></div>
		<div class="panel-body">
			{!! link_to_route('subjects.create', 'Add New Subjects', '', ['class'=>'btn btn-primary']) !!}
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Subjects</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				@foreach($subjects as $subject)
					<tbody>
						<td>{!! $count++ !!}</td>
						<td>{!! $subject->name !!}</td>
						<td>{!! link_to_route('subjects.edit', 'Edit', $subject->id, ['class'=>'btn btn-info btn-xs']) !!}</td>
						<td>{!! link_to_route('subjects.delete', 'Delete', $subject->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
					</tbody>
				@endforeach
			</table>
		</div>
	</div>
@stop
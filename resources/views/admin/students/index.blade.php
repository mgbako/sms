@extends('layouts.staff')

@section('content')
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h1>All Students</h1></div>
			<div class="panel-body">
				{!! link_to_route('students.create', 'Add New Student', '', ['class'=>'btn btn-primary']) !!}
				<table class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Student ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone</th>
							<th>Gender</th>
							<th>Home Address</th>
							<th>Class</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					
					@foreach($students as $student)
						<tbody>
							<td>{!! $count++ !!}</td>
							<td>{!! $student->studentId !!}</td>
							<td>{!! $student->firstname !!}</td>
							<td>{!! $student->lastname !!}</td>
							<td>{!! $student->phone !!}</td>
							<td>{!! $student->gender!!}</td>
							<td>{!! $student->address !!}</td>
							<td>{!! $student->class !!}</td>
							<td>{!! link_to_route('students.edit', 'Edit', $student->id, ['class'=>'btn btn-info btn-xs']) !!}</td>
							<td>{!! link_to_route('students.delete', 'Delete', $student->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
						</tbody>
					@endforeach
			
				</table>
			</div>
		</div>{{-- end of --}}

	
@stop
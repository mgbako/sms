@extends('layouts.staff')

@section('content')
@include('flash::message ')
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h1>All Teachers</h1></div>
			<div class="panel-body">
				{!! link_to_route('admins.create', 'Add New Admin Staff', '', ['class'=>'btn btn-primary']) !!}
				<table class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Staff ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone</th>
							<th>Gender</th>
							<th>Home Address</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					
					@foreach($admins as $admin)
						<tbody>
							<td>{!! $count++ !!}</td>
							<td>{!! $admin->staffId !!}</td>
							<td>{!! $admin->firstname !!}</td>
							<td>{!! $admin->lastname !!}</td>
							<td>{!! $admin->phone !!}</td>
							<td>{!! $admin->gender!!}</td>
							<td>{!! $admin->address !!}</td>
							<td>{!! link_to_route('teachers.edit', 'Edit', $admin->id, ['class'=>'btn btn-info btn-xs']) !!}</td>
							<td>{!! link_to_route('teachers.delete', 'Delete', $admin->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
						</tbody>
					@endforeach
				</table>
			</div>
		</div>{{-- end of --}}
@stop
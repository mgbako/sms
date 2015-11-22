@extends('layouts.admin')
@section('content')
@include('partials.adminDashboard')
	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Delete
			<small>Staff Deleting Process</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="/teachers">Staffs</a></li>
			<li class="active">Delete</li>
		</ol>
	</section>
	<section class="content">
		<div class="col-xs-12">            
			<div class="box box-info">	
				<div class="box-body">
					<div class="panel panel-danger">
						<div class="panel-heading text-center">
							<h2>Are You sure You want to Delete the Teacher:</h2>
							<h2> {!! ucwords($teacher->firstname) !!} {!! ucwords($teacher->lastname) !!}</h2>
						</div>
						<div class="panel-body">
							{!!Form::open(['method'=>'delete', 'route' => ['teachers.destroy', $teacher->id]]) !!}
								<div class="form-group">{!! Form::radio('agree', 0, true)!!} {!!Form::label('agree', 'No') !!}</div>
								<div class="form-group">{!! Form::radio('agree', 1) !!} {!!Form::label('agree', 'Yes') !!}</div>

								<div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger pull-right')) !!}</div>
							{!!Form::close()!!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@stop

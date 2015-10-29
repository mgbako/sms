@extends('layouts.staff')


@section('content')
		<div class="col-lg-12 columns">
			<div class="panel panel-danger">
				<div class="panel-heading text-center"><h2>Are You sure You want to Delete the Student:</h2></div>
				<div class="panel-body">
						<h3>{{$student->firstname}}</h3><hr>
						{!!Form::open(['method'=>'delete', 'route' => ['students.destroy', $student->id]]) !!}
						<div class="form-group">{!! Form::radio('agree', 0, true)!!} {!!Form::label('agree', 'No') !!}</div>
						<div class="form-group">{!! Form::radio('agree', 1) !!} {!!Form::label('agree', 'Yes') !!}</div>

						<div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger pull-right')) !!}</div>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
@stop

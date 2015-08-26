@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Scholr</div>

				<div class="panel-body">
					You are logged in!
					<br>
					{!! link_to_route('questions.index', 'Questions', '', ['class'=>'btn btn-primary btn-lg'])!!}

					{!! link_to_route('subjects.index', 'Subjects', '', ['class'=>'btn btn-primary btn-lg'])!!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@extends('layouts.master')
 
@section('content')
	<div class="container">
			
		<div class="panel panel-default">
			<div class="panel-heading"><h1><span id="counter"></span></h1>
				
			</div>
			<div class="panel-body">
				<p>{!! $student !!}</p>
			</div>
		</div>
	</div>	
@stop
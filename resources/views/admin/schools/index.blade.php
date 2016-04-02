@extends('layouts.admin')
@section('content')
@include('partials.adminDashboard')
	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @include('flash::message ')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            School
            <small>Set Up school</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Schoo Settings</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            @if(!$myschool)
             <div class="col-xs-12">
              {!! link_to_route('schools.create', "Add School Details", '', ['class'=>'btn btn-success']) !!}
              <p>&nbsp;</p>
            @endif

              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                  <div align="center">
                    <table align="center" class="table table-bordered table-striped" id="example1">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Term</th>
                          <th>Number of questions for the term</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($schools as $school)
                      	<tr>
            							<td>{!! $school->name !!}</td>
            							<td>{!! $school->term !!}</td>
            							<td>{!! $school->number !!}</td>
            							<td>
                            {!! link_to_route('schools.edit', 'Edit', $school->id, ['class'=>'btn btn-info btn-xs']) !!}
                          </td>
            						</tr>
            						@endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                         <th>Name</th>
                          <th>Term</th>
                          <th>Number of questions for the term</th>
                          <th>Edit</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@stop

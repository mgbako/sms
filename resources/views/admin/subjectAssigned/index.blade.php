@extends('layouts.admin')
@include('partials.adminDashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('flash::message ')
    <!-- Content Header (Page header) -->
            <section class="content-header">
      <h1>
        Assign Subject
        <small>Staff against Subject of a particular Class</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/teachers">Staff</a></li>
        <li class="active">Subject Assigned</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        {!! Form::open(['route'=>'subjectAssigned.store'])!!}
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="teacher_id"><i class="fa fa-building"></i> Staff </label>
                <select class="form-control" data-placeholder="Select Staff" style="width: 100%;" name="teacher_id">
                  @foreach($staff as $staffs)
                    <option value="{{ $staffs->id }}">{{ $staffs->lastname}} {{ $staffs->firstname }}</option>
                  @endforeach
                </select>
              </div><!-- /.form-group -->
            </div><!-- /.col -->

            <div class="col-md-4">
              <div class="form-group">
                <i class="fa fa-list-alt"></i> {!! Form::label('classe_id', 'Class') !!}
                {!! Form::select('classe_id', $classList, null, ['class'=>'form-control', 'data-placeholder'=>'Select Class', 'style'=>'width: 100%']) !!}
              </div><!-- /.form-group -->
            </div><!-- /.col -->

            <div class="col-md-4">
              <div class="form-group">
                <i class="fa fa-list-alt"></i> {!! Form::label('subject_id', 'Subjects') !!}
                {!! Form::select('subject_id', $subjectList, null, ['id'=>'selected3', 'class'=>'form-control', 'multiple', 'data-placeholder'=>'Select Subject', 'style'=>'width: 100%']) !!}
              </div><!-- /.form-group -->
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-list-alt"></i> Assign</button>
        </div>
        {!! Form::close() !!}
      </div><!-- /.box -->

      <div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              
            </div><!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-responsive" id="assigned">
                <thead>
                  <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Stubject Assigned</th>
                    <th>Class Assigned</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($subjectAssigned as $subjectAssigned)
                
                  <tr>
                    {!!Form::open(['method'=>'delete', 'route' => ['subjectAssigned.destroy', $subjectAssigned->teacher_id, $subjectAssigned->classe_id, $subjectAssigned->subject_id ] ]) !!}
                    <td>{{ Scholr\Teacher::whereId($subjectAssigned->teacher_id)->first()->staffId }}</td>
                    <td>{{ Scholr\Teacher::whereId($subjectAssigned->teacher_id)->first()->lastname }} {{ Scholr\Teacher::whereId($subjectAssigned->teacher_id)->first()->firstname }}</td>
                    <td>{{ Scholr\Subject::whereId($subjectAssigned->subject_id)->first()->name }}</td>
                     <td>{{ Scholr\Classe::whereId($subjectAssigned->classe_id)->first()->name }}</td>
                    <td>
                      <div class="form-group">{!! Form::submit('Delete', array('class'=>'btn btn-danger btn-xs', 'onclick'=>"return confirm('You are about to delete a record. This cannot be undone. Are you sure?');")) !!}</div>
                    </td>
                    {!!Form::close()!!}
                  </tr>
                
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Stubject Assigned</th>
                    <th>Class Assigned</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- /.box-body -->
            
          </div><!-- /.box --><!-- /.box -->

        </div><!-- /.col (left) -->
        
      </div><!-- /.row -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
@stop
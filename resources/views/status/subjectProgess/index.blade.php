@extends('layouts.admin')
@section('content')
  @include('partials.adminDashboard')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @include('flash::message ')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Subject Progress
        <small>preview of each subject list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
        <li class="active">Subject Progress</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12"><!-- /.box --><!-- /.box -->
        </div><!-- /.col --><!-- /.col -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div><!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-responsive table-hover" id="progress">
                <thead>
                  <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Stubject</th>
                    <th>Class</th>
                    <th>Progress</th>
                    <th>Status</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                
                <tbody>
                @foreach($subjectProgess as $subjectProgess)
                <tr>
                  <td>{{ Scholr\Teacher::whereId($subjectProgess->teacher_id)->first()->staffId }}</td>
                  <td>{{ Scholr\Teacher::whereId($subjectProgess->teacher_id)->first()->lastname }} {{ Scholr\Teacher::whereId($subjectProgess->teacher_id)->first()->firstname }}</td>
                  <td>{{ Scholr\Subject::where('id', $subjectProgess->subject_id)->first()->name}}</td>
                  <td>{{ Scholr\Classe::where('id', $subjectProgess->classe_id)->first()->name}}</td>
                  <td>
                    @if(Scholr\Question::Percentage($subjectProgess->classe_id, $subjectProgess->subject_id)->get()->count() >= $totalQuestion)
                      <span class="label label-success">Approved</span></td>
                    @elseif(Scholr\Question::Percentage($subjectProgess->classe_id, $subjectProgess->subject_id)->get()->count() <= 0)
                      <span class="label label-danger">No Question Added</span>
                    @else
                      <span class="label label-warning">Processing</span>
                    @endif
                  </td>
                  <td>
                    <div class="progress progress-xs progress-striped">
                      <input type="hidden" id="percentage" value="{{ Scholr\Question::Percentage($subjectProgess->classe_id, $subjectProgess->subject_id)->get()->count() }}">
                      <div class="progress-bar" style="width:{{ Scholr\Question::Percentage($subjectProgess->classe_id, $subjectProgess->subject_id)->get()->count() }}%"></div>
                    </div>
                  </td>
                  <td id="remarks{{$count++}}">
                   @if(Scholr\Question::Percentage($subjectProgess->classe_id, $subjectProgess->subject_id)->get()->count() >= $totalQuestion)
                      Done
                    @elseif(Scholr\Question::Percentage($subjectProgess->classe_id, $subjectProgess->subject_id)->get()->count() <= 0)
                      Not Done
                    @else
                      Processing
                    @endif
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Stubject</th>
                    <th>Class</th>
                    <th>Progress</th>
                    <th>Status</th>
                    <th>Remarks</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
          </div><!-- /.box -->
        </div>
      </div>
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
@stop
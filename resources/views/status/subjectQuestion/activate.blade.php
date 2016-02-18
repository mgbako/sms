@extends('layouts.admin')
@section('content')
  @include('partials.adminDashboard')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('flash::message')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Subject  Reception
      <small>Ready for Permission to write Exam</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="/subjects">Subject</a></li>
      <li class="active">Subject Reception</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Stubject</th>
                  <th>Class</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($subjectquestionstatus as $subjectquestionstatu)
                  <tr>
                    <td>{{ Scholr\Subject::where('id', $subjectquestionstatu->subject_id)->first()->name}}</td>
                    <td>{{ Scholr\Classe::where('id', $subjectquestionstatu->classe_id)->first()->name}}</td>
                    <td>{{ $subjectquestionstatu->time }} minutes</td>
                    <td>
                    @if($subjectquestionstatu->write == 0)
                      <a href="{{ route('exam.write', [$subjectquestionstatu->classe_id, $subjectquestionstatu->subject_id])}}" class="btn btn-success">Write</a>
                    @else
                      <a href="{{ route('exam.delete', [$subjectquestionstatu->classe_id, $subjectquestionstatu->subject_id])}}" class="btn btn-danger">Delete</a>
                    @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Stubject</th>
                  <th>Class</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box --><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop
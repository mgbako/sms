@extends('layouts.admin')
@section('content')
  @include('partials.adminDashboard')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('flash::message ')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Subject Analysis
      <small>preview of each subject list</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/">Dashboard</a></li>
      <li class="active">Subject Analysis</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6"><!-- /.box --><!-- /.box -->
      </div><!-- /.col --><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Table</h3>
            <div class="box-tools">
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table width="100%" class="table table-hover text-center">
              <tr>
                <th>Stubject</th>
                <th>Class</th>
                <th>Action</th>
                <th>Time</th>
                <!-- <th>Progress</th> -->
                <th>Remarks</th>
              </tr>
              @foreach($subjectAnalysis as $subjectAnalysis)
                @if($subjectAnalysis->progress !=0 )
                  <tr>
                    <td>{{ Scholr\Subject::where('id', $subjectAnalysis->subject_id)->first()->name}}</td>
                    <td>{{ Scholr\Classe::where('id', $subjectAnalysis->classe_id)->first()->name}}</td>
                    <td>

                          <a href="{{ route('questions.edits', [$subjectAnalysis->classe_id, $subjectAnalysis->subject_id, Scholr\SubjectAssigned::where('subject_id', $subjectAnalysis->subject_id)->first()->teacher_id]) }}">
                            <i class="fa fa-eye"></i> View
                          </a> |
                          @if($subjectAnalysis->progress == 2 )
                            <a href="{{ route('subjectQuestions.deleteApprove', [$subjectAnalysis->classe_id, $subjectAnalysis->subject_id]) }}"><i class="fa fa-remove"></i> Delete</a>
                          @endif
                          @if($subjectAnalysis->progress != 2 )
                            <a href="{{ route('subjectQuestions.approve', [$subjectAnalysis->classe_id, $subjectAnalysis->subject_id]) }}"><i class="fa fa-database"></i> Approve</a>
                          @endif
                    </td>
                    <td>{{ $subjectAnalysis->time }} minutes</td>
            <!--         <td><span class="progressStatus label"></span></td> -->
                    <td class="remarks">
                      @if($subjectAnalysis->progress == 2 )
                        <span class="label label-success">Approved</span>
                      
                      @elseif( Scholr\SubjectQuestionstatus::where('classe_id', $subjectAnalysis->classe_id)->where('subject_id', $subjectAnalysis->subject_id)->where('progress', 1) )
                        <span class="label label-primary">Wating for Approval</span>
                      @endif
                    </td>
                  </tr>
                @endif
              @endforeach
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
@inject('student', 'Scholr\Student')
@inject('class', 'Scholr\Classe')
@inject('subject', 'Scholr\Subject')
@extends('layouts.admin')
@section('content')
	@include('partials.adminDashboard')
	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @include ('flash::message')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            All Results
            <small>The Subject Broad Sheet</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="dashboard.html">Dashboard</a></li>
            <li class="active">Results</li>
          </ol>        
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row"><!-- /.col -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="col-xs-12">
              <!-- /.box -->

                <div class="box-body">
                  <div align="center">
                    <table align="center" class="table table-bordered table-striped" id="example1">
                      <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>ID No.</th>
                          <th>Class</th>
                          <th>Subject</th>
                          <th>Score (%)</th>
                          <th>Approve/Disapprove</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($grades as $grade)
                        <tr>
                          <td>
                              {{ $student::whereId($grade->student_id)->first()->firstname.' '.$student::whereId($grade->student_id)->first()->lastname}}
                          </td>
                          <td>
                            <a 
                              href="/results/student/{{ $grade->student_id }}">
                              {{ $student::whereId($grade->student_id)->first()->studentId }}
                            </a>
                          </td>
                          <td>
                            <a 
                              href="/results/classes/{{ $grade->classe_id }}">
                              {{ $class::whereId($grade->classe_id)->first()->name }}
                            </a>
                          </td>
                           <td>
                            <a 
                              href="/results/subjects/{{ $grade->subject_id }}">
                              {{ $subject::whereId($grade->subject_id)->first()->name }}
                            </a>
                          </td>
                          <td>
                            {{ $grade->total }}
                          </td>
                          <td>
                            @if($grade->approve < 1)
                              <a href="{{ route('result.approve', [$grade->classe_id, $grade->subject_id, $grade->student_id])}}" class="btn btn-success btn-xs"><i class="fa fa-check-square-o"></i></a>
                            @else
                              <a href="{{ route('result.disapprove', [$grade->classe_id, $grade->subject_id, $grade->student_id])}}" class="btn btn-danger btn-xs" onclick="confirm('Are sure you want to do disapprove this result', 'djdj')"><i class="fa fa-trash"></i></a>
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Student Name</th>
                          <th>ID No.</th>
                          <th>Class</th>
                          <th>Subject</th>
                          <th>Score (%)</th>
                          <th>Approve/Disapprove</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <a href="/print/allresults" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    </div>
                    <br><br>
                  </div>
                </div><!-- /.box-body -->
            </div>
           
            <div class="box-footer no-padding">
            </div>
          </div><!-- /. box -->
          </div><!-- /.col -->
          </div><!-- /.row -->
       </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@stop

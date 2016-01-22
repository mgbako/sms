@inject('student', 'Scholr\Student')
@inject('class', 'Scholr\Classe')
@inject('subject', 'Scholr\Subject')
@extends('layouts.admin')
@section('content')
	 @include('partials.profileDashboard')
	<div class="content-wrapper">
		@include ('flash::message')
		 <!-- Content Wrapper. Contains page content -->
          <section class="content-header">
          <h1>
            {{ $class_name->name}} Results
            <small>The Class Broad Sheet</small>
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
                          <th>Subject</th>
                          <th>Score (%)</th>
                        </tr>
                      </thead>
                     @foreach ($grades as $grade)
                        <tbody>
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
                              href="/results/subjects/{{ $grade->subject_id }}">
                              {{ $subject::whereId($grade->subject_id)->first()->name }}
                            </a>
                          </td>
                          <td>
                            {{ $grade->total }}
                          </td>
                        </tr>
                      </tbody>
                     @endforeach
                      <tfoot>
                        <tr>
                           <th>Student Name</th>
                          <th>ID No.</th>
                          <th>Subject</th>
                          <th>Score (%)</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <a href="/print/classresults/{{ $class_name->id }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
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
  
	</div>
@stop
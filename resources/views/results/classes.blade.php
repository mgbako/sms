@extends('layouts.result')
@section('content')
	 @include('partials.teachersDashboard')
	<div class="content-wrapper">
		@include ('flash::message')

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{$subject->name($subjectId)}} Results
            <small>The Subject Broad Sheet</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="dashboard.html">Dashboard</a></li>
            <li class="active">Results</li>
          </ol>        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row"><!-- /.col -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="col-xs-12">
              <!-- /.box -->

                <div class="box-body">
                  <div align="center">
                    @if($grades)
                    <table align="center" class="table table-bordered table-striped" id="example1">
                      <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>Class</th>
                          <th>ID No.</th>
                          <th>Score (%)</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($grades as $classGrade)
                      <tr>
                        <td><a href="results2.html">{{$student->name($classGrade->student_id)}}</a></td>
                        <td><a href="results3.html">{{$class->name($classGrade->classe_id)}}</a></td>
                        <td><a href="bio.html">{{$student->id($classGrade->student_id)}}</a></td>
                        <td>{{$classGrade->total}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Student Name</th>
                          <th>Class</th>
                          <th>ID No.</th>
                          <th>Score (%)</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div><!-- /.box-body -->
            </div>
                <!-- /.box-header -->
                
<div class="col-xs-12 table-responsive">
  <div class="row">
    <!-- accepted payments column -->
<div class="col-xs-8 pull-right">
              <p class="lead">Summary</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Total Grades:</th>
                    <td>{{$totalGrades}}</td>
                  </tr>
                  <tr>
                    <th>Total Questions:</th>
                    <td>{{$school->number}}</td>
                  </tr>
                  <tr>
                    <th>Average:</th>
                    <td>{{$average}}</td>
                  </tr>
                  <tr>
                    <th>Remarks:</th>
                    <td>{{$remark}}</td>
                  </tr>
                </table>
                @endif
              </div>
            </div>    <!-- /.col --><!-- /.col -->
    <!-- /.col -->
  </div><!-- /.row -->
              
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="exam-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            </div>
            <br><br>
          </div>
              
            </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  
	</div>
@stop
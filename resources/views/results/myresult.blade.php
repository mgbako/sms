@extends('layouts.admin')
@section('content')
	@include('partials.studentDashboard')
	<div class="content-wrapper">
		@include ('flash::message')
		      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Welcome, <span>Admin</span>
          </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="results1.html">Results</a></li>
                <li class="active">Student Results</li>
            </ol>        
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row"><!-- /.col -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="col-xs-12">
                  <h1 class="page-header">
                      <img src="img/photo.jpg" alt="Add Ten" /> 
                        Potasfield College  
                    </h1>
                    <div class="col-xs-12 table-responsive">
                        <h1>
                            Objective Exam Results
                            (OER)
                        </h1>
                        <hr>   
                        <h4>
                            Candidate Details
                        </h4>
                    </div>                                   
                  
                    <div class="col-sm-3 invoice-col">
                        <div class="pull-left image">
                          <img src="/{{ $student->image }}" alt="User Image" width="82" height="82" class="img-circle">
                        </div>
                    </div>
                    <div class="col-sm-6 invoice-col">
                      <b>Full Name:</b> {{ $student->lastname.' '.$student->firstname }}<br>
                      <b>Student ID:</b> {{ $student->studentId }}<br>
                      <br>
                    </div>                
                    <div class="col-sm-3 invoice-col">
                      <b>Session:</b> 2015/2016<br>
                      <b>Present Term:</b> 1st Term<br>
                      <b>Present Class:</b> {{ $student->class}}

                    </div>
                    <div class="col-xs-12 table-responsive">
                        <h3>Results</h3>
                        <hr>          
                    </div>                                   
                </div>
                <!-- /.box-header -->
                
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="7%">S/N</th>
                    <th width="62%">Subject</th>
                    <th width="19%">Grades</th>
                    <th width="12%">Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>English</td>
                    <td>25</td>
                    <td>AVG</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Mathematics</td>
                    <td>30</td>
                    <td>GOOD</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Chemistry</td>
                    <td>20</td>
                    <td>PASS</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Biology</td>
                    <td>45</td>
                    <td>V GOOD</td>
                  </tr>
                </tbody>
              </table>
                    <div class="row">
            <!-- accepted payments column --><!-- /.col -->
            <div class="col-xs-8 pull-right">
              <p class="lead">Summary</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Total Grades:</th>
                    <td>120</td>
                  </tr>
                  <tr>
                    <th>Total Questions:</th>
                    <td>200</td>
                  </tr>
                  <tr>
                    <th>Average:</th>
                    <td>60/100</td>
                  </tr>
                  <tr>
                    <th>Remarks:</th>
                    <td>V Good</td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
            <!-- /.col -->
          </div><!-- /.row -->
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
            <div class="col-xs-12">
              <a href="exam-print.html" target="_blank" class="btn btn-default">
                  <i class="fa fa-print"></i> Print
                </a>
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
	</div>
@stop
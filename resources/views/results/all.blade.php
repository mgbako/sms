@extends('layouts.admin')
@section('content')
	@include('partials.adminDashboard')
	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @include ('flash::message')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            General Mathematics Results
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
                          <th>Class</th>
                          <th>ID No.</th>
                          <th>Score (%)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="results2.html">Alex Pierce</a></td>
                          <td><a href="results3.html">JSS3</a></td>
                          <td><a href="bio.html">Pfc119</a></td>
                          <td>60</td>
                        </tr>
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
@stop

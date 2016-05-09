@extends('layouts.admin')
@section('content')
@include('partials.teachersDashboard')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @include('flash::message ')
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Dashboard
              <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Home</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>{{ $class_number }}</h3>
                    <p>Class Assigned</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-document-text"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{ count($approvedCount) }}</h3>
                    <p>Approved Exams</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>{{ count($submitCount) }}</h3>
                    <p>Completed Exams</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{ $inCount }}</h3>
                    <p>Uncompleted Exams</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
            </div><!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->         
  <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-5 connectedSortable">

                <!-- Map box -->
                <!-- /.box -->

                <!-- solid sales graph --><!-- /.box -->

               
                </div><!-- /.box -->

              </section><!-- right col -->
            </div><!-- /.row (main row) -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@stop
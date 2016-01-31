@inject('class', 'Scholr\Classe')
@inject('subject', 'Scholr\Subject')
@inject('teacher', 'Scholr\Teacher')
@inject('student', 'Scholr\Student')
@extends('layouts.admin')
@section('content')
@include('partials.adminDashboard')
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
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
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
                    <h3>{{ $subject::all()->count() }}</h3>
                    <p>Registered Subjects</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-document-text"></i>
                  </div>
                  <a href="{{ route('subjects.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">

                    <h3>{{ $term_average_score }}<sup style="font-size: 20px"></sup></h3>
                    <p>School Average for the current term</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="/results/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>{{ $teacher::all()->count() }}</h3>
                    <p>Registered Teachers</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person"></i>
                  </div>
                  <a href="{{ route('teachers.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{ $student::all()->count() }}</h3>
                    <p>Registered Students</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                  <a href="{{ route('students.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div><!-- ./col -->
            </div><!-- /.row -->
            <!-- Main row -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@stop
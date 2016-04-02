@extends('layouts.master')
@section('content')
  @include('partials.studentDashboard')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         @include('flash::message ')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Welcome, <span>Admin</span>
          </h1>
<ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/classes/{{$classe_id}}/exams">Exam Hall</a></li>
            <li class="active">Exam Hall</li>
          </ol>        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary"><!-- /.box-header -->
                <div class="box-header with-border">
                
<div class="alert alert-success alert-dismissable">
              <h4><i class="icon fa fa-check"></i> Success</h4>
                    <p><strong><u>Please Note</u></strong></p>
                    <p>Make sure you log out after this exam.<br>
                      Thank you.
                    </p>
</div>
                  
                
        <div class="col-md-12">
               
              <div class="box-header with-border">
              
                  <h3 class="box-title">{{ $user->subjectName($score->subject_id) }}</h3>
                </div><!-- /.box-header --><!-- ./col -->


                
                <div class="box-body">
                  <!-- <dl>
                    
                    <div class="col-md-3 col-sm-6 col-xs-6 text-center">
                      <input type="text" class="knob" value="{{ $score->total}}" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" data-height="120" data-fgColor="#00c0ef" data-readonly="true">
                      <div class="knob-label">
                    <h3>Your Score</h3>
                      </div>
                    </div>./col
                    
                    <dt>
                    </dt>
                  </dl> -->
                  <div class="form-group pull-left">
                    <div class="item col-lg-12">
                      <p class="message" id="compose-textarea" style="height: 120px">
                      Dear <strong>{{ $user->username }}</strong>, <br>Thank you for your time<br>
                      And Congratulations.<br><a href="/classes/{{$classe_id}}/exams">Exit</a>
                 </p>
                    </div>                    
                  </div>                    
              </div>
                    
                </div></div>
                  </div>
                <div class="box-footer no-padding">
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      @stop
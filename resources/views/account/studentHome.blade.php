@extends('layouts.admin')
@section('content')
  @include('partials.studentDashboard')
   <div class="content-wrapper">
      @include('flash::message ')
        <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        Welcome, <span>{{ $records->lastname }}</span>
      </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="dashboard.html">Dashboard</a></li>
          <li class="active">Profile</li>
        </ol>        
      </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              @if($records)
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Biodata</h3>
                  <div class="box-tools pull-right"></div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  
                  <div class="alert alert-info alert-dismissable">
                    <h4><i class="icon fa fa-check"></i> Note!</h4>
                    Please go through and check if correct. <br> 
                    Any correction?<br>Just print, highlight changes  and send copy to the Administrator as soon as possible. <br>
                    Thank you.
                  </div>
                  
                  <div class="col-xs-12 table-responsive">
                    <h1>
                      Candidate Details
                    </h1>
                    <hr>   
                  </div> 
                  <div class="col-md-12">
                    <div class="col-sm-2 invoice-col">
                      <div class="pull-left image">
                        <img src="/{{ $records->image }}" alt="User Image" width="82" height="82" class="img-circle">
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <dl class="dl-horizontal">
                        <dt>Surname</dt>
                                  <dd>{{ $records->lastname }}</dd>
                                  <dt>First Name</dt>
                                  <dd>{{ $records->firstname }}</dd>
                                  <br><br>
                        <dt>Student Id</dt>
                            <dd>{{ $records->studentId }}</dd>
                            <dt>Gender</dt>
                            <dd>{{ $records->gender }}</dd>
                            <dt>Date of Birth</dt>
                            <dd>{{ $records->dob }}</dd>
                            <dt>Country</dt>
                            <dd>{{ $records->nationality }}</dd>
                            <br><br>
                            <dt>Telephone</dt>
                            <dd>{{ $records->phone }}</dd>
                            <dt>Adress</dt>
                            <dd>{{ $records->address }}</dd>
                            <dt>Email Address</dt>
                            <dd>{{ $records->email }}</dd>
                      </dl>
                    </div>
                    <div class="col-md-4">
                    <h3>Offered Subjects</h3>
                      <ul>
                        @foreach($student_subjects as $subjects)
                          <li>{{ Scholr\Subject::where('id', $subjects->subject_id)->first()->name}}</li>
                        @endforeach
                      </ul>
                    </div>
                    <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">

                          <a href="/print/mydetails/{{ $student->slug }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                      </div>
                    </div>
                  <br><br>               
                </div>
                  <div class="table-responsive mailbox-messages"><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                </div>
              </div><!-- /. box -->
              @else 
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Biodata</h3>
                    <div class="box-tools pull-right"></div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    
                    <div class="alert alert-info alert-dismissable">
                      <h4><i class="icon fa fa-check"></i> Note!</h4>
                      It's not real but there is no record of you. <br> 
                      in our database
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              @endif
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@stop
@extends('layouts.admin')
@section('content')
@include('partials.adminDashboard')
	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
            School
            <small>School App settings</small>
          </h1>
                <ol class="breadcrumb">
                  <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">School Settings</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">School Summary</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> Alert!</h4> Info alert please note that this area is very sensitive apply with caution.
                                </div>
                                <div class="col-md-6">
                                    <label>School Logo</label>
                                    <br>
                                    <div class="pull-left image">
                                        <img src="/{{ $myschool->logo }}" alt="User Image" width="82" height="82" class="img-circle">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>School Name</label>
                                        <p class="lead">
                                            {{ $myschool->name }}
                                        </p>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>School Session</label>
                                        <p class="lead">
                                            {{ $myschool->session }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>School Term</label>
                                        <br>
                                        <p class="lead">{{ $myschool->term }}</p>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>School ID Format</label>
                                        <p class="lead">
                                            {{ $myschool->id_format }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{ route('schools.edit', [$myschool->id]) }}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                        </div>
                        <!-- <div class="box-footer">
                            <h3 class="box-title">Archive</h3>
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat"><i class="fa fa-list-alt"></i> Archive Term</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat"><i class="fa fa-list-alt"></i> Archive History</a>
                            </div>
                        </div> -->
                    </div>
                    <!-- /.box -->

            </section>
            <!-- /.content -->
            </div><!-- /.content-wrapper -->
@stop

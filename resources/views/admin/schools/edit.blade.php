@extends('layouts.admin')
@section('content')
@include('partials.adminDashboard')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
          <h1>
            School Settings
            <small>App settings</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li class="active">School</li>
          </ol>
     </section>
      {!! Form::model($school, ['method'=>'patch', 'route'=>['schools.update', $school->id], 'files' => true])!!}
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Main Setup</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Type of System</label>
                    <select name="institution" class="form-control select2" style="width: 100%;">
                      <option selected="selected">{{$school->institution}}</option>
                      <option>Primary Institution</option>
                      <option>Secondary Institution</option>
                      <option>Tetiary Institution</option>
                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">School Setup</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label>School Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter ..." value="{{$school->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>School Session</label>
                      <input type="text" name="session" class="form-control" placeholder="Enter ..." value="{{$school->session}}">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>School Term</label>
                    <select name="term" class="form-control select2" style="width: 100%;">
                      <option selected="selected">{{$school->term}}</option>
                      <option>1st Term</option>
                      <option>2nd Term</option>
                      <option>3rd Term</option>
                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                      <label>School ID Format</label>
                      <input type="text" name="id_format" class="form-control" placeholder="Enter ..." value="{{$school->id_format}}">
                    </div>
                </div>
                <div class="col-md-6">
                      <label>School Logo</label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-camera"></i></span>
                    <input type="file" name="logo" class="form-control" value="{{$school->logo}}">
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <div class="box box-default">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Set number of question for the current term</label>
                    <input type="text" name="number" class="form-control" placeholder="Enter number of questions" value="{{$school->number}}">
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->
           <div class="box-footer">
            <button type="submit" class="btn btn-default">
              <i class="fa fa-server"> Save</i>
            </button>
          </div>
        </div><!-- /.box -->
        </section><!-- /.content -->    
      {!!Form::close()!!}
</div><!-- /.content-wrapper -->
@stop
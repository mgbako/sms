@extends('layouts.admin')
@section('content')
@include('partials.adminDashboard')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   @include ('flash::message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload
        <small>Importing teachers from a csv file</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/teachers">Staff</a></li>
        <li class="active">Upload Data</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          @include('errors.formError')
        </div>

        <div class="col-xs-12">            
              <div class="box box-info">
                <div class="box-body">
            <div class="row">
              {!! Form::open(['route'=>'teachers.csvupload', 'files' => true])!!}
                <div class="col-md-6"><br>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-genderless"></i>
                    </span>
                    {!! Form::file('file', ['class'=>'form-control']) !!}
                  </div>
                </div>

                <div class="col-md-6"><br>
                    {!! Form::submit('+ Add', ['class'=>'btn btn-success']) !!}
                </div>

              {!!Form::close()!!}
            </div>{{-- End of Row --}}
            </div>{{-- End of box body --}}
            </div>{{-- End of box info --}}
        </div>{{-- End of col-12 --}}
      </div>{{-- End of Row --}}
    </section><!-- End of Content -->
</div><!-- /.content-wrapper -->
@stop
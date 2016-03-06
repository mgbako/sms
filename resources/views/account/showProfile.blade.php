@extends('layouts.admin')
@section('content')
@include('partials.profileDashboard')
	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	@include('flash::message ')
	    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome, to <span>{{ ucwords($profile->firstname) }}'s Profile</span>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/students">Students</a></li>
        <li class="active">{{ ucwords($profile->firstname) }}'s Biodata</li>
      </ol>        
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
            <br>
            <div class="box-body no-padding">
              
            <div class="alert alert-info alert-dismissable">
                <h1>
                    profile's Detail
                  </h1>
            </div>
           
        <div class="col-md-1">
      <div class="col-sm-2 invoice-col">
              <div class="pull-left image">
                <img src="/{{$profile->image}}" alt="User Image" width="82" height="82" class="img-circle">
              </div>
                
      </div> 
      </div>            
        <div class="col-md-11">
              <dl class="dl-horizontal">
         
                <dt>Surname</dt>
                <dd>{{$profile->firstname}}</dd>
                <dt>First Name</dt>
                <dd>{{$profile->lastname}}</dd>
                <br><br>
                <dt>Username</dt>
                <dd>{{$profile->user->username}}</dd>
                <dt>Gender</dt>
                <dd>{{$profile->gender}}</dd>
                <dt>Date of Birth</dt>
                <dd>{{$profile->dob}}</dd>
                <dt>Country</dt>
                <dd>{{$profile->nationality}}</dd>
                <br><br>
                <dt>Telephone</dt>
                <dd>{{$profile->phone}}</dd>
                <dt>Adress</dt>
                <dd>{{$profile->address}}</dd>
                
                <dt>Role</dt>
                <dd>{{ $profile->user->type }}</dd>
            </dl>
            
          
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="{{ route('profile.edit', $profile->slug) }}" class="btn btn-xs btn-primary"><i class="fa fa-print"></i> Edit</a>
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
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
</div>
@stop
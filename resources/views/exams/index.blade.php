@extends('layouts.admin')
@section('content')
  @include('partials.studentDashboard')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Welcome, <span>{{$records->firstname}}</span>
		</h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/profile">Profile</a></li>
            <li class="active">Exam Hall</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-header with-border">

                       <div class="alert alert-warning alert-dismissable">
                            <h4><i class="icon fa fa-warning"></i> Note!</h4>
                            You have entered the Exam Hall. <br> 
                            Please observe <b><u>ALL</u></b> Exam Rules and Regulations.<br>
                            Thank you.
                       </div>
                         
                        @foreach($subjects as $subject)
                          @if(Scholr\SubjectQuestionstatus::canwrite($classe_id, $subject->id, 1))

                            @if( Scholr\Grade::where(['student_id'=> $records->id, 'classe_id'=> $classe_id, 'subject_id'=> $subject->id])->first() )  
                              <div class="box box-warning box-solid" style="opacity: .5;">
                            @else
                              <div class="box box-warning box-solid" style="opacity: 1;">
                            @endif
                            <div class="box-header with-border">
                              <h3 class="box-title">{{ $subject->name }}</h3>
                              <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                              The exam scripts of this exam is ready. click on the link to continue. <br> 
                              @if( !Scholr\Grade::where(['student_id'=> $records->id, 'classe_id'=> $classe_id, 'subject_id'=> $subject->id])->first()  )
                                <a href="{{ route('classes.subjects.exams.show', [$classe_id, $subject->id])}}">Start</a>
                              @else
                                <h1 class="label label-success">You Have taken this Exam</h1>
                              @endif

                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                          @endif
                        @endforeach

                    </div>
                </div>
                <!-- /. box -->
                <div class="box-footer no-padding">
                	
                </div>
            </div>
            <!-- /.col 9-->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@stop
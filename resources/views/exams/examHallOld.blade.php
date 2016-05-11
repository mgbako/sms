@extends('layouts.master')
@section('content')
  @include('partials.studentDashboard')
   <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><span>Exam Hall</span></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li><a href="Profile.html">Profile</a></li>
                    <li class="active">Exam Hall</li>
                </ol>
            </section>

            <section class="content">
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="panel panel-default">

                                <div class="alert alert-danger alert-dismissable">
                                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                    <p><strong><u>DO NOT REFRESH THIS PAGE...</u></strong> Follow ALL Exam Insturctions while seated in the examination hall. Remember you are TIMED. Any question? Ask the exam invegilator for help.
                                        <br> Thank you.
                                    </p>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-6 text-center pull-right">
                                    <input type="text" class="knob" value="30" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#3c8dbc" data-readonly="true">
                                    <div class="knob-label">
                                        <h3>Count Down</h3></div>
                                </div>
                                <!-- ./col -->

                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>

                                <div class="panel-heading">
                                    <h1>Question 5</h1></div>
                                <div class="panel-body">
                                    <h3><p>Which of these is the fastest way to send a mail?</p></h3>
                                    <hr>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"> Post Office
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Email
                                        </label>
                                    </div>

                                    <hr>
                                    <div class="radio">
                                        <h5><label>
                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                          Messenger
                        </label></h5>
                                    </div>
                                    <hr>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4"> Talking Drum
                                        </label>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <p><code>.exam progress</code></p>
                                    <div class="progress progress-sm active">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 42%">
                                            <span class="sr-only">42% Complete</span>
                                        </div>
                                    </div>
                                    <a href="examsetv.html" class="btn btn-primary">Previous</a> &nbsp;&nbsp; <a href="examsetv.html" class="btn btn-primary">Next</a> &nbsp;&nbsp; <a href="examsetv.html" class="btn btn-success pull-left">Submit</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->

                        </div>
                    </div>
                </div>
            </section>

        </div>
    <!-- /.content-wrapper -->

@stop
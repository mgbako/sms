@inject('subject', 'Scholr\Subject')
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Student Result</title>
		<!-- Bootstrap CSS -->
		<style>
     @include('style.pdfstyles')
    </style>
  
	</head>
	<body>
		<section class="content">
          <div class="row"><!-- /.col -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="col-xs-12">
                  <h1 class="page-header">
                      <img src="http://addten.newgenesisdesign.com/img/logo.png" alt="Add Ten" /> 
                        {{ $school->name }} 
                    </h1>
                    <div class="col-xs-12 table-responsive">
                        <h1>
                            Objective Exam Results
                            (OER)
                        </h1>
                        <hr>   
                        <h4>
                            Candidate Details
                        </h4>
                    </div>                                   
                  
                    <div class="col-sm-3 invoice-col">
                        <div class="pull-left image">
                          <img src="http://addten.newgenesisdesign.com/img/logo.png" alt="User Image" width="82" height="82" class="img-circle">
                        </div>
                    </div>
                    <div class="col-sm-6 invoice-col">
                      <b>Full Name:</b> {{ $student->lastname.' '.$student->firstname }}<br>
                      <b>Student ID:</b> {{ $student->studentId }}<br>
                      <br>
                    </div>                
                    <div class="col-sm-3 invoice-col">
                      <b>Session:</b> 2015/2016<br>
                      <b>Present Term:</b> {{ $school->term }}<br>
                      <b>Present Class:</b> {{ $student->class }}

                    </div>
                    <div class="col-xs-12 table-responsive">
                        <h3>Results</h3>
                        <hr>          
                    </div>                                   
                </div>
                <!-- /.box-header -->
                
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="7%">S/N</th>
                    <th width="62%">Subject</th>
                    <th width="19%">Grades</th>
                    <th width="12%">Remarks</th>
                  </tr>
                </thead>
                @foreach ($grades as $grade)
                  <tbody>
                    <tr>
                      <td>{{ $count++ }}</td>
                      <td>
                        {{ $subject::where('id', $grade->subject_id)->first()->name}}
                      </td>
                      <td>{{ $grade->total }}</td>
                      <td>{{ $grade->remark }}</td>
                    </tr>
                  </tbody>
                @endforeach
              </table>
                    <div class="row">
            <!-- accepted payments column --><!-- /.col -->
            <div class="col-xs-8 pull-right">
              <p class="lead">Summary</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Total Grades:</th>
                    <td</td>
                  </tr>
                  <tr>
                    <th>Total Questions:</th>
                    <td</td>
                  </tr>
                  <tr>
                    <th>Average:</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Remarks:</th>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
            <!-- /.col -->
          </div><!-- /.row -->
                    <!-- this row will not appear when printing -->
    
              
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

	</body>
</html>
@inject('student', 'Scholr\Student')
@inject('class', 'Scholr\Classe')
@inject('subject', 'Scholr\Subject')
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>All Result</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://addten.newgenesisdesign.com/css/AdminLTE.min.css">
	</head>
	<body>
		<section class="content">
      <div class="row"><!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="col-xs-12">
          <!-- /.box -->

            <div class="box-body">
              <div align="center">
                <table align="center" class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                      <th>Student Name</th>
                      <th>ID No.</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Score (%)</th>
                    </tr>
                  </thead>
                 @foreach ($grades as $grade)
                    <tbody>
                    <tr>
                      <td>
                          {{ $student::whereId($grade->student_id)->first()->firstname.' '.$student::whereId($grade->student_id)->first()->lastname}}
                      </td>
                      <td>
                        <a 
                          href="/results/student/{{ $grade->student_id }}">
                          {{ $student::whereId($grade->student_id)->first()->studentId }}
                        </a>
                      </td>
                      <td>
                        <a 
                          href="/results/classes/{{ $grade->classe_id }}">
                          {{ $class::whereId($grade->classe_id)->first()->name }}
                        </a>
                      </td>
                       <td>
                        <a 
                          href="/results/subjects/{{ $grade->subject_id }}">
                          {{ $subject::whereId($grade->subject_id)->first()->name }}
                        </a>
                      </td>
                      <td>
                        {{ $grade->total }}
                      </td>
                    </tr>
                  </tbody>
                 @endforeach
                  <tfoot>
                    <tr>
                       <th>Student Name</th>
                      <th>ID No.</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Score (%)</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              
            </div><!-- /.box-body -->
        </div>
       
        <div class="box-footer no-padding">
        </div>
      </div><!-- /. box -->
      </div><!-- /.col -->
      </div><!-- /.row -->
   </section><!-- /.content -->

	</body>
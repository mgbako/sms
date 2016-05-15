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
          <div class="row">
            <div class="col-md-12">
              @if($records)
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Biodata</h3>
                  <div class="box-tools pull-right"></div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  
                  <div class="col-xs-12 table-responsive">
                    <h1>
                      Candidate Details
                    </h1>
                    <hr>   
                  </div> 
                  <div class="col-md-1">
                    <div class="col-sm-2 invoice-col">
                      <div class="pull-left image">
                        <img src="http://addten.newgenesisdesign.com/img/logo.png" alt="User Image" width="82" height="82" class="img-circle">
                      </div>
                      </div> 
                    </div>            
                  <div class="col-md-4 col-md-offset-8 table-responsive">
                   
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

	</body>
</html>
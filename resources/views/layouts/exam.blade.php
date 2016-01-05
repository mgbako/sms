<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AddTen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <link rel="icon" href="{{ asset('/img/logoo3.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('/img/logoo3.png') }}" type="image/png" />
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="pages/mailbox/dashboard.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>10</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="img/logo.png" alt="Add Ten" /><b>Add</b>Ten</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/avatar04.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">John Doer</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
                    <p>
                      John Doer
                      <small>School Admin</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="pages/examples/login.html" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="dashboard.html">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            
            <li class="active">
              <a href="profile.html">
              <i class="fa fa-user"></i> <span>Profile</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-group"></i> <span>Staffs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="staff.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="sub.html"><i class="fa fa-circle-o"></i> Subject</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>Students</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="student.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="assign2.html"><i class="fa fa-circle-o"></i> Subject </a></li>
                <li><a href="class.html"><i class="fa fa-circle-o"></i> Classes</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list-alt"></i> <span>Subject</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="analysis.html"><i class="fa fa-circle-o"></i> Subject Analysis</a></li>
                <li><a href="assign.html"><i class="fa fa-circle-o"></i> Subject Assigned</a></li>
                <li><a href="bank.html"><i class="fa fa-circle-o"></i> Subject Bank</a></li>
                <li><a href="sublist.html"><i class="fa fa-circle-o"></i> Subject List</a></li>
                <li><a href="subjectpro.html"><i class="fa fa-circle-o"></i> Subject Progress</a></li>
                <li><a href="subques1.html"><i class="fa fa-circle-o"></i> Subject Question</a></li>
                <li><a href="reception.html"><i class="fa fa-circle-o"></i> Subject Reception</a></li>
              </ul>
            </li>
            <li>
              <a href="dashboard.html">
              <i class="fa fa-pie-chart"></i> <span>Results</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
              <i class="fa fa-gears"></i> <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="school.html"><i class="fa fa-circle-o"></i> School</a></li>
                <li><a href="exam.html"><i class="fa fa-circle-o"></i> Exam</a></li>
                <li><a href="password.html"><i class="fa fa-circle-o"></i> Password</a></li>
                <li><a href="question.html"><i class="fa fa-circle-o"></i> Questions</a></li>
                <li><a href="role.html"><i class="fa fa-circle-o"></i> Role</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Others</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Welcome, <span>Admin</span>
          </h1>
<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="Profile.html">Profile</a></li>
            <li class="active">Exam Hall</li>
          </ol>        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Activities</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="profile.html"><i class="fa fa-user"></i> Bio Data</a></li>
                    <li><a href="subjectev.html"><i class="fa fa-list-alt"></i> Subjects Offered</a></li>
                    <li class="active"><a href="examev.html"><i class="fa fa-file-text-o"></i> Exam Hall <span class="label label-primary pull-right">3</span></a></li>
                    <li><a href="results.html"><i class="fa fa-pie-chart"></i> Results</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary"><!-- /.box-header -->
                <div class="box-header with-border">
                
<div class="alert alert-success alert-dismissable">
              <h4><i class="icon fa fa-check"></i> Success</h4>
                    <p><strong><u>Please Note</u></strong></p>
                    <p>Make sure you log out after this exam.<br>
                      Thank you.
                    </p>
</div>
                  
                
        <div class="col-md-12">
               
              <div class="box-header with-border">
              
                  <h3 class="box-title">Subject Name</h3>
                </div><!-- /.box-header --><!-- ./col -->


                
                <div class="box-body">
                  <dl>
                    
                    <div class="col-md-3 col-sm-6 col-xs-6 text-center">
                      <input type="text" class="knob" value="90" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" data-height="120" data-fgColor="#00c0ef" data-readonly="true">
                      <div class="knob-label">
                    <h3>Your Score</h3>
                      </div>
                    </div><!-- ./col -->
                    
                    <dt>
                    </dt>
                  </dl>
                  <div class="form-group pull-left">
                    <div class="item col-lg-12">
                      <p class="message" id="compose-textarea" style="height: 120px">
                      Dear <strong>Admin</strong>, <br>Thank you for your time<br>
                      And Congratulations.<br><a href="examev.html">Exit</a>
                 </p>
                    </div>                    
                  </div>                    
              </div>
                    
                </div></div>
                  </div>
                <div class="box-footer no-padding">
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015 <a href="http://www.pottersmedia.com">Pottersmedia Support Services</a>.</strong> All rights reserved.
      </footer>


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/plugins/knob/jquery.knob.js')}}"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- jQuery Knob -->
    <script src="{{ asset('/plugins/knob/jquery.knob.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- page script -->
    <script src="{{ asset('js/scores.js')}}"></script>
  
    <script src="{{ asset('/js/page.js')}}"></script>
    <script>
      
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    
  </body>
</html>

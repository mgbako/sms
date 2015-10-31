@if(!Auth::guest())
  <div class="container-fluid">
    <div class="row">
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="profile.html"><i class="fa fa-user"></i>
                  <span>Bio Data</span> 
                </a>
            </li>
            <li class="treeview">
                <a href="subjectev.html">
                  <i class="fa fa-list-alt"></i>
                    <span>Subjects Offered</span> 
                </a>
            </li>
            <li class="treeview">
                <a href="examev.html">
                  <i class="fa fa-file-text-o"></i>
                    <span>
                       Exam Hall 
                      <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="results.html">
                <i class="fa fa-pie-chart"></i> 
                  <span>Results</span>
                </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
    </div>
  </div>
@endif
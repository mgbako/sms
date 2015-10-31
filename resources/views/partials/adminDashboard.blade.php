<div class="container-fluid">
		<div class="row">
			@unless(Auth::guest())
			 <!-- Left side column. contains the logo and sidebar -->
		      <aside class="main-sidebar">
		        <!-- sidebar: style can be found in sidebar.less -->
		        <section class="sidebar">
		          <!-- sidebar menu: : style can be found in sidebar.less -->
		          <ul class="sidebar-menu">
		            <li class="header">MAIN NAVIGATION</li>
		            <li>
		              <a href="">
		                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		              </a>
		            </li>
		            
		            <li>
		              <a href="">
		              <i class="fa fa-user"></i> <span>Profile ( {{Auth::user()->type }} )</span>
		              </a>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-group"></i> <span>Staffs</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href=""><i class="fa fa-circle-o"></i> Profile</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i>All Staffs</a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-graduation-cap"></i> <span>Students</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
		                <li><a href="{{ route('students.index') }}"><i class="fa fa-circle-o"></i> All Students </a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-graduation-cap"></i> <span>Classes</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
		                <li><a href="{{ route('classes.index') }}"><i class="fa fa-circle-o"></i> All Classes </a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-list-alt"></i> <span>Subject</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Subject Analysis</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Subject Assigned</a></li>
		                <li><a href="{{ route('subjects.index') }}"><i class="fa fa-circle-o"></i> Subject List</a></li>
		                <li><a href="{{ route('subjects.index') }}"><i class="fa fa-circle-o"></i> Subject Progress</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Subject Question</a></li>
		              </ul>
		            </li>
		            <li>
		              <a href="{{ route('teachers.index') }}">
		              <i class="fa fa-pie-chart"></i> <span>Results</span>
		              </a>
		            </li>
		            <li class="treeview active">
		              <a href="#">
		              <i class="fa fa-gears"></i> <span>Settings</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> School</a></li>
		                <li><a href="{{ route('exams.index') }}"><i class="fa fa-circle-o"></i> Exam</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Password</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Questions</a></li>
		                <li class="active"><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Role</a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-folder"></i> <span>Others</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Login</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Register</a></li>
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
		              </ul>
		            </li>
		          </ul>
		        </section>
		        <!-- /.sidebar -->
		      </aside>
			@endunless
		</div>
</div>

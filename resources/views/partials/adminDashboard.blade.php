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
		              <a href="/account/admin/{{ Auth::user()->slug }}">
		                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		              </a>
		            </li>
		            <li>
		              @if (!Auth::user()->profile)
		              	<a href="{{ route('profile.create') }}">
		              		<i class="fa fa-user"></i> <span>Create Profile ( {{Auth::user()->type }} )</span>
		              </a>
		              @else
		              	<a href="{{ route('profile.show', [Auth::user()->profile->slug]) }}">
		              		<i class="fa fa-user"></i> <span>Profile ( {{Auth::user()->type }} )</span>
		              	</a>
		              @endif
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-group"></i> <span>Teachers</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i>All Teachers</a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-graduation-cap"></i> <span>Students</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('students.index') }}"><i class="fa fa-circle-o"></i> All Students </a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-graduation-cap"></i> <span>Classes</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('classes.index') }}"><i class="fa fa-circle-o"></i> All Classes </a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="">
		                <i class="fa fa-list-alt"></i> <span>Subject</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		               <ul class="treeview-menu">
		               	<li><a href="{{ route('subjects.index') }}"><i class="fa fa-circle-o"></i> Subject List</a></li>
		               	<li><a href="{{ route('subjectAssigned.index') }}"><i class="fa fa-circle-o"></i> Assign Subjects </a></li>
		              </ul>
		            </li>
		            <li class="treeview">
		              <a href="">
		                <i class="fa fa-list-alt"></i> <span>Exams</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		               <ul class="treeview-menu">
		               	<li><a href="{{ route('subjectProgess.index') }}"><i class="fa fa-circle-o"></i> Question Progress</a></li>
									  <li><a href="{{ route('subjectAnalysis.index') }}"><i class="fa fa-circle-o"></i> Exam Analysis</a></li>
									  <li><a href="{{ route('exams.activate') }}"><i class="fa fa-circle-o"></i>Activate Exams</a></li>
									</ul>
		            </li>
								<li>
									<a href="{{ route('results.all') }}">
										<i class="fa fa-pie-chart"></i> 
										<span>All Results</span>
									</a>
								</li>
		            <li class="treeview">
		              <a href="#">
		              <i class="fa fa-gears"></i> <span>Settings</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('schools.index') }}"><i class="fa fa-circle-o"></i> School</a></li>
		              </ul>
		            </li>
		          </ul>
		        </section>
		        <!-- /.sidebar -->
		      </aside>
			@endunless
		</div>
</div>

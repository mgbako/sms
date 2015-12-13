@inject('class', 'Scholr\Classe')
<div class="container-fluid">
	<div class="row">
		@if(!Auth::guest())
			@if(Auth::user()->type == 'admin')
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
		              <i class="fa fa-pie-chart"></i> <span>Results</span>
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
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-folder"></i> <span>Others</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
		              </ul>
		            </li>
		          </ul>
		        </section>
		        <!-- /.sidebar -->
		      </aside>
			@elseif(Auth::user()->type == 'teacher')
				 <aside class="main-sidebar">
		        <!-- sidebar: style can be found in sidebar.less -->
		        <section class="sidebar">
		          <!-- sidebar menu: : style can be found in sidebar.less -->
		          <ul class="sidebar-menu">
		            <li class="header">MAIN NAVIGATION</li>
		            <li>
		              <a href="/account/teacher/{{ Auth::user()->slug }}">
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
		                <i class="fa fa-files-o"></i> <span>Create Exam Questions</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu" style="display: none;">
		                @foreach($assigned as $class)
		                      <li class="treeview">
		                      	<a href="#">
		                      		<i class="fa fa-list-alt"></i> {{ \Scholr\Classe::whereId($class->classe_id)->distinct()->first()->name }}
		                      		<i class="fa fa-angle-left pull-right"></i>
		                      	</a>
		                        <ul class="treeview-menu">
		                          <li>
		                          	<a href="{{ route('classes.subjects.questions.index', [$class->classe_id, $class->subject_id]) }}">
		                          		<i class="fa fa-list-alt"></i>{{ \Scholr\Subject::whereId($class->subject_id)->first()->name }}
		                          	</a>
		                          </li>
		                        </ul>
		                      </li>
		                  @endforeach
		              </ul>
	            	</li>
		            <li class="treeview">
		              <a href="#">
		                <i class="fa fa-list-alt"></i> <span>Subject</span>
		                <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="{{ route('subjectQuestions.index') }}"><i class="fa fa-circle-o"></i> Assigne Time</a></li>
		              </ul>
		            </li>
		          </ul>
		        </section>
		        <!-- /.sidebar -->
		      </aside>
			@elseif(Auth::user()->type == 'student')
				<aside class="main-sidebar">
        	<!-- sidebar: style can be found in sidebar.less -->
        	<section class="sidebar">
	          <!-- sidebar menu: : style can be found in sidebar.less -->
	          <ul class="sidebar-menu">
	            <li class="header">MAIN NAVIGATION</li>
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
	            <li class="active treeview">
	                <a href="/">
	                <i class="fa fa-user"></i>
	                  <span>Bio Data</span> 
	                </a>
	            </li>
	            <li class="treeview">
	                <a href="">
	                  <i class="fa fa-list-alt"></i>
	                    <span>Subjects Offered</span> 
	                </a>
	            </li>
	            <li class="treeview">
                <a href="">
                  <i class="fa fa-file-text-o"></i>
                    <span>
                       Exam Hall 
                      <span class="label label-primary pull-right">3</span>
                    </span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                  <li>
                    <a href="{{ route('classes.exams.index', [$class::whereId($student->class)->first()->id]) }}">
                      <i class="fa fa-graduation-cap">
                        {{ $class::whereId($student->class)->first()->name }}
                      </i>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ route('results.myresult', [$student->slug]) }}">
                <i class="fa fa-pie-chart"></i> 
                  <span>Results</span>
                </a>
                
            </li>
          </ul>
        	</section>
      	</aside><!-- /.sidebar -->
			@endif
		@endif
	</div>
</div>
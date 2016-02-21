@inject('subject', 'Scholr\Subject')
@inject('mainclass', 'Scholr\Classe')
@inject('subject_assigned', 'Scholr\SubjectAssigned')
<div class="container-fluid">
		<div class="row">
			@if(!Auth::guest())
			 <!-- Left side column. contains the logo and sidebar -->
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
		                      		<i class="fa fa-list-alt"></i> {{$mainclass::whereId($class->classe_id)->distinct()->first()->name }}
		                      		<i class="fa fa-angle-left pull-right"></i>
		                      	</a>
		                        <ul class="treeview-menu">
																@foreach ($subject_assigned::get_subjects($class->classe_id, $teacher->id) as $my_subjects)
																	<li>
				                          	<a href="{{ route('classes.subjects.questions.index', [$my_subjects->classe_id, $my_subjects->subject_id]) }}">
				                          			<!--  -->
				                          		<i class="fa fa-list-alt"></i>{{ $subject::whereId($my_subjects->subject_id)->first()->name }}
				                          	</a>
				                          </li>
																@endforeach
		                          
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
		                <li><a href="{{ route('subjectQuestions.index' ) }}"><i class="fa fa-circle-o"></i> Assigne Time</a></li>
		              </ul>
		            </li>
		             <li class="treeview">
		             	<a href="#"><i class="fa fa-circle-o">
		             		</i>Class Results
		                <i class="fa fa-angle-left pull-right"></i>
		             	</a>
									<ul class="treeview-menu" style="display: none;">
		                @foreach($assigned as $class)
		                      <li class="treeview">
		                      	<a href="{{ route('results.classes', [$class->classe_id]) }}">
		                      		<i class="fa fa-list-alt"></i> {{$mainclass::whereId($class->classe_id)->distinct()->first()->name }}
		                      	</a>
		                        
		                      </li>
		                  @endforeach
		              </ul>
		             </li>
		          </ul>
		        </section>
		        <!-- /.sidebar -->
		      </aside>
			@endif
		</div>
</div>

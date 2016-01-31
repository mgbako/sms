@inject('class', 'Scholr\Classe')
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
                <a href="{{ route('classes.exams.index', [$class::whereId($records->classe_id)->first()]) }}">
                  <i class="fa fa-file-text-o"></i>
                    <span> Exam Hall </span>
                </a>
                
            </li>
            <li class="treeview">
                <a href="{{ route('results.myresult', [$records->slug]) }}">
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
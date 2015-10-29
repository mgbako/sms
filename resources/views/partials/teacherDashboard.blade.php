 @inject('teachers', 'Scholr\Teacher')
 <section class="containers">
  <aside class="items">
    <ul class="nav nav-pills nav-stacked">
      <li class="active">
        <a href="/account/teacher/{{ Auth::user()->slug }}">
          <i class="fa fa-dashboard fa-fw"></i>
          Dashboard
           
        </a>
      </li>
      <li>
        <a href="">
        <i class="fa fa-user fa-fw"></i>
          Profile
        </a>
      </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <i class="fa fa-book fa-fw"></i>
          Create Exams
          <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          @foreach($teachers::all() as $teacher)
            @foreach($teacher->classes as $class)
              <li class="dropdown-submenu">
                 <a href="#" >
                  <i class="fa fa-book fa-fw"></i>
                    {{ $class->name }}
                    <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu">
                    @foreach($teacher->subjects as $subject)
                      <li>
                        <a href="/questions?class={{$class->name}}&subject={{$subject->name}}">
                          <i class="fa fa-book fa-fw"></i>
                          {{ $subject->name }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
              </li>
            @endforeach
           @endforeach
        </ul>
      </li>
    </ul>
  </aside>
  <main class=" items main-content">
    <section class="head">
       @yield('content')
    </section>
  </main>
</section>

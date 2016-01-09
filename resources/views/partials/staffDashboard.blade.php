 @inject('teachers', 'Scholr\Teacher')
 <section class="containers">
  <aside class="items">
    <ul class="nav nav-pills nav-stacked">
      <li class="active">
        <a href="/account/admin/{{ Auth::user()->slug }}">
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
          Classes
          <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{ url('/classes/create') }}">
              <i class="fa fa-book fa-fw"></i>
              New Class
            </a>
          </li>
          <li>
            <a href="{{ url('/classes') }}">
              <i class="fa fa-book fa-fw"></i>
                 All Classes
            </a>
          </li>
        </ul>
      </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <i class="fa fa-book fa-fw"></i>
          Suject
          <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{ url('/subjects/create') }}">
              <i class="fa fa-book fa-fw"></i>
              New Subject
            </a>
          </li>
          <li>
            <a href="{{ url('/subjects') }}">
              <i class="fa fa-book fa-fw"></i>
                 All Subjects
            </a>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <i class="fa fa-book fa-fw"></i>
          Teacheres
          <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{ url('/teachers/create') }}">
              <i class="fa fa-book fa-fw"></i>
              New Teacher
            </a>
          </li>
          <li>
            <a href="{{ url('/teachers') }}">
              <i class="fa fa-book fa-fw"></i>
                 All Teacheres
            </a>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <i class="fa fa-book fa-fw"></i>
          Students
          <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{ url('/students/create') }}">
              <i class="fa fa-book fa-fw"></i>
              New Student
            </a>
          </li>
          <li>
            <a href="{{ url('/students') }}">
              <i class="fa fa-book fa-fw"></i>
                 All Students
            </a>
          </li>
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

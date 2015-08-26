 <section class="containers">
  <aside class="items">
    <ul class="nav nav-pills nav-stacked">
      <li class="active">
        <a href="account/teacher/{{ Auth::user()->slug }}">
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
          Questions
          <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="{{ url('/questions') }}">
              <i class="fa fa-book fa-fw"></i>
                Questions Created
            </a>
          </li>
          <li>
            <a href="{{ url('/questions/create') }}">
              <i class="fa fa-book fa-fw"></i>
              New Questions
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
            <a href="{{ url('/subjects') }}">
              <i class="fa fa-book fa-fw"></i>
                Subjects Created
            </a>
          </li>
          <li>
            <a href="{{ url('/subjects/create?') }}">
              <i class="fa fa-book fa-fw"></i>
              New Subject
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

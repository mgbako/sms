  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/account/teacher/{{ Auth::user()->slug }}">
          Scholr
        </a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i>
                {{ Auth::user()->firstname }} 
                <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu" role="menu">
                 <li>
                    <a href="#">
                    <i class="fa fa-gear fa-fw"></i> Settings
                    </a>
                </li>
                    <li class="divider"></li>
                <li>
                    <a href="{{ url('/account/logout') }}">
                        <i class="fa fa-sign-out fa-fw"></i>
                        Logout
                    </a>
                </li>
              </ul>
            </li>
        </ul>
      </div>
    </div>
  </nav>
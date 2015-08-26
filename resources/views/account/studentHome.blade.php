@extends('layouts.dashboard')

@section('content')
  <section class="containers">
    <aside class="items">
      <ul class="nav nav-pills nav-stacked">
        <li class="active">
          <a href="">
            <i class="fa fa-dashboard fa-fw"></i>
            DashBoard
          </a>
        </li>
        <li>
          <a href="">
          <i class="fa fa-user fa-fw"></i>
            Profile
          </a>
        </li>
         <li>
          <a href="">
          <i class="fa fa-book fa-fw"></i>
            Take Exams
          </a>
        </li>
         <li>
          <a href="">
          <i class="fa fa-archive fa-fw"></i>
            Grades
          </a>
        </li>
      </ul>
    </aside>
    <main class=" items content">
      @include('flash::message ')
      <section class="head">
        <h2>DashBoard</h2>
        <hr>
        <article class="infoboard">
          <div class="examtaken panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">0</div>
                        <div>Exams Taken</div>
                    </div>
                </div>
            </div>
            <a href="#">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
            </a>
          </div>
          <div class="grades panel panel-warning">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-archive fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">0</div>
                          <div>Grades!</div>
                      </div>
                  </div>
              </div>
              <a href="#">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
        </article>
      </section>
      <hr>
      <section class="maincontent">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, recusandae hic id, nihil, quam consequuntur esse molestias provident repellendus assumenda facere voluptas mollitia officiis sequi similique. Ducimus, nisi, harum. Harum.
      </section>
    </main>
  </section>
@stop
@extends('layouts.teacher')

@section('content')
@include('flash::message ')
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
                        <div>Exams Created</div>
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
                          <i class="fa fa-book fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">0</div>
                          <div>Suject Created!</div>
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
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, recusandae hic id, nihil, quam consequuntur esse molestias provident repellendus assumenda facere voluptas mollitia officiis sequi similique. Ducimus, nisi, harum. Har

      </section>

@stop
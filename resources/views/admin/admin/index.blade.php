@inject('class', 'Scholr\Classe')
@extends('layouts.admin')
@section('content')
@include('partials.adminDashboard')
	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @include('flash::message ')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admins
            <small>All Admins</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Students</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            	{!! link_to_route('admins.create', "Add New", '', ['class'=>'btn btn-success']) !!}
              
              <p>&nbsp;</p>
              <!-- /.box -->

              <div class="box">
                <div class="box-header">
                              
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div align="center">
                    <table align="center" class="table table-bordered table-striped" id="example1">
											<thead>
												<tr>
													<th>#</th>
													<th>Staff ID</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Phone</th>
													<th>Gender</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											
											@foreach($admins as $admin)
												<tbody>
													<td>{!! $count++ !!}</td>
													<td>{!! $admin->staffId !!}</td>
													<td>{!! $admin->firstname !!}</td>
													<td>{!! $admin->lastname !!}</td>
													<td>{!! $admin->phone !!}</td>
													<td>{!! $admin->gender!!}</td>
													<td>{!! link_to_route('admins.edit', 'Edit', $admin->id, ['class'=>'btn btn-info btn-xs']) !!}</td>
													<td>{!! link_to_route('admins.delete', 'Delete', $admin->id, ['class'=>'btn btn-danger btn-xs']) !!}</td>
												</tbody>
											@endforeach
											<tfoot>
                        <tr>
                          <th>#</th>
                          <th>Staff ID</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Phone</th>
													<th>Gender</th>
													<th>Edit</th>
													<th>Delete</th>
                        </tr>
                      </tfoot>
										</table>-
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->	
@stop
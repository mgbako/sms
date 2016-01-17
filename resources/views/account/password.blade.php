@extends('layouts.password')
@section('content')
	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Reset Password
    </h1>
  
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
      </div>

      <div class="col-xs-12">            
        <div class="box box-info">
          <div class="box-body">
            <div class="row">
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Send Password Reset Link
                </button>
              </div>
            </div>
          </form>
            </div>{{-- End of Row --}}
          </div>{{-- End of box body --}}
        </div>{{-- End of box info --}}
      </div>{{-- End of col-12 --}}
    </div>{{-- End of Row --}}
  </section><!-- End of Content -->
</div>
@stop
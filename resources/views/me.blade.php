<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Ten</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/css/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<link rel="icon" href="/img/logoo3.png" type="image/x-icon">
		<link rel="shortcut icon" href="img/logoo3.png" type="image/png" />
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index2.html"><img src="img/logo.png" alt="Add Ten" /><b>Add</b>Ten</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Welcome<br><small>- Choose your school from the list below -</small></p>



                  <div class="box-footer">
                  <div class="form-group">
                    <label>Name of School</label>
                    <select class="form-control select2" style="width: 100%;" id="school-name">
                      <option selected="selected">School</option>
                      <option value="http://potasfieldcollege.addtenten.com/">Potasfield College</option>
                    </select>
                  </div><!-- /.form-group -->
                    <a href="login.html">
				            <button type="submit" id="go" class="btn btn-block btn-info btn-lg pull-right"><i class="fa fa-building"></i> Go</button>
                	</a>
                  </div><!-- /.box-footer -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

  <script src="{{ asset('/js/jquery.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/icheck.min.js') }}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
      $(function () {
        var go = document.getElementById('go');
        go.addEventListener('click', function (event) {
          event.preventDefault();
          var schoolUrl = document.getElementById('school-name');
          var urlValue = schoolUrl.options[schoolUrl.selectedIndex].value;
          window.location = urlValue;
        }, false);

      });
    </script>
  </body>
</html>

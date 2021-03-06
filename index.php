<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="shortcut icon" type="image/x-icon" href="dist/img/tasklist.png"> 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  
  
.background-login{
  position: absolute;
  width: 110%;
  height: 110%;
  background-image:url('dist/img/bcgk.jpg');
  background-size:cover;
  background-position:center;
  background-repeat:no-repeat
}
  
  .trans {
    background-color: rgba(255,255,255, 0.7);
    border-radius: 10px;
  }
  .mid {
    top: 50%;
    left: 30%;
  }
  #container {
  height: 100vh;
  background-size: cover !important;
  display: flex;
  justify-content: center;
  align-items: center;
}
#inviteContainer {
	overflow: hidden;
	position: relative;

}

  </style>
</head>
<body class="hold-transition" style="overflow:hidden" >
<div id="container" >
<div class="background-login">
<br>

<div class="login-box" id="inviteContainer">
  <div class="login-logo">
    <a href="">LOGIN TASK<b>LIST</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body trans fadeInDown animated fast">
    <p class="login-box-msg"></p>

    <form action="page/check-login" method="post" >
      <div class="form-group has-feedback fadeInLeft animated fast">
        <input type="text" class="form-control" placeholder="Username" name="user" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback fadeInLeft animated fast">
        <input type="password" class="form-control" placeholder="Password" name="pass" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!--
        <div class="col-xs-6">
         <a href='#' onClick='history.go(-1)'><button type='' class='btn btn-danger btn-block btn-flat'>Cancel</button></a> 
        </div>
        -->
        <!-- /.col -->

        <div class="col-xs-5 mid">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
		<div class="col-xs-10">
			<!-- <br> <a href="lupapassword" target="_blank"> Lupa Password </a> <br> -->
        </div>
        <!-- /.col -->
      </div>
    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="js/tilt.jquery.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
	
	$('.js-tilt').tilt({
				    maxTilt: 10,
				    perspective: 1500
				});

  });
  
</script>

</body>
</html>

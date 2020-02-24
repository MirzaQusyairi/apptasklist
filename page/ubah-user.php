<?php
	error_reporting(E_ALL ^ (E_NOTICE));
	session_start();
	include_once('config.php');
	$users= $_SESSION['nama']; 
	
	if(!isset($_SESSION['nama'])){
		echo "<script>alert('Pastikan anda telah SignIn'); window.location.href='logout'</script>";
	}	

    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_user WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="../dist/img/tasklist.png">  
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  </style>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-yellow-light sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="user" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">TASK<b>LIST</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/tasklist.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $users; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/tasklist.png" class="img-circle" alt="User Image">
                <p><?php echo $users; ?>
					<small></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
					<a href="logout" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/tasklist.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
			<p><?php echo $users; ?></p>
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<li class="active">
          <a href="user">
            <i class="fa fa-pencil"></i> <span>USER</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>
        Data
        <small></small>
      </h1>
    </section>-->

    <!-- Main content -->
    <section class="content">
		<div class='row'>
			<div class='col-md-8'>
				<div class='box box-warning'>
					<div class='box-header'>
						<h3 class='box-title'>Ubah Data</h3>
					</div>
					<div class='box-body'>
						<form role='form' method='post' action='aksi-ubah-user?id=<?php echo $id; ?>' class='form-horizontal' enctype='multipart/form-data'>
							
							<div class='form-group'>
								<label class='col-sm-2 control-label'>NAMA</label>
								<div class='col-sm-10'>
									<input type='text' value='<?php echo $row['nama']; ?>' name='nama' class='form-control' placeholder='Nama' autocomplete="off" required>
								</div>
							</div>
								
							<div class='form-group'>
								<label class='col-sm-2 control-label'>USERNAME</label>
								<div class='col-sm-10'>
									<input type='text' value='<?php echo $row['username']; ?>' name='username' class='form-control' placeholder='Username' autocomplete="off" required>
								</div>
							</div>
								
							<div class='form-group'>
								<label class='col-sm-2 control-label'>PASSWORD</label>
								<div class='col-sm-10'>
									<input type='password' value='<?php echo $row['password']; ?>' name='password' class='form-control' id='pass' placeholder='Password' autocomplete="off" required>
								</div>
								<label class='col-sm-2 control-label'></label>
								<div class='col-sm-10'>
									<label>
										<input type="checkbox" class="minimal" onclick="showhide()">
									Show Password
									</label>
								</div>
							</div>
					</div>
						
					<div class='box-footer'>
						<div class='pull-right'>
							<a href='#' onClick='history.go(-1)'><button type='reset' class='btn btn-danger'><i class='fa fa-times-circle'></i> Cancel</button></a>
							<button type='submit' name='update' class='btn btn-primary'><i class='fa fa-save'></i> Update</button>
						</div>
					</div>
				</div>
			</div>
		<div class='col-md-4'>
		</div>
		</form>
		</div>	
    </section>
    <!-- /.content -->
	</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://medanrepair.blogspot.com" target="_blank">TEAM RPL2</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Table2Excel -->
<script src="../bower_components/jquery-table2excel/jquery.table2excel.js"></script>
<script src="../bower_components/jquery-table2excel/jquery.table2excel.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
function showhide() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
} 
$('#excel').click(function(){
		$('#tabelhasil').table2excel({
			name: "Excel Document Name",
			filename: "Hasil Export" + new Date().toISOString().replace(/[\-\:\.]/g, "")+".xls",
			fileext: ".xls",
			exclude_img: true,
			exclude_links: true,
			exclude_inputs: true
		});
	});
	$('#reservation').daterangepicker(
{
    locale: {
      format: 'YYYY-MM-DD'
    },
    startDate: '2018-04-01',
    endDate: '2018-04-30'
});
	
 //Date picker
    $('#datepicker').datepicker({
	  format: 'yyyy-mm-dd',
      autoclose: true
    })
	
	 $(function(){
     $("#tgl_awal").datepicker({
        format: 'yyyy-mm-dd',
		orientation: "bottom",
        autoclose: true,
        todayHighlight: true,
    });
    $("#tgl_awal").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_akhir").datepicker('setStartDate', startDate);
        if($("#tgl_awal").val() > $("#tgl_akhir").val()){
          $("#tgl_akhir").val($("#tgl_awal").val());
        }
		
    });
	$("#tgl_akhir").datepicker({
        format: 'yyyy-mm-dd',
		orientation: "bottom",
        autoclose: true,
        todayHighlight: true,
    });
 });
 
</script>
</body>
</html>

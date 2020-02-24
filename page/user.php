<?php
	error_reporting(E_ALL ^ (E_NOTICE));
	session_start();
	include('config.php');
	$users=$_SESSION['nama'];
	
	if(!isset($_SESSION['nama'])){
		echo "<script>alert('Pastikan anda telah Login'); window.location.href='logout'</script>";
	}
	elseif(($_SESSION['nama'])!='User Manage'){
		echo "<script>alert('Khusus User Management');history.go(-1)</script>";
	}
	
	$query= "select * from tb_user order by nama asc";
	$hasil=  mysqli_query($koneksi,$query);
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="../dist/img/tasklist.png"> 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
	<section class="content-header">
      <h1>
        DATA USER
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class='content'>
		<div class='row'>
			<div class='col-xs-12'>
				<div class='box box-warning'>
					<div class='box-header'>
						<h3 class='box-title'></h3>
						<div class='pull-right box-tools'>
							<?php
								echo"<a href='adduser'><button class='btn btn-primary btn-sm' data-toggle='tooltip' title='Tambah'><i class='fa fa-plus'></i> Tambah</button></a>";
							?>	
						</div>
					</div>
					<div class='box-body'>
						<div style='overflow-x:auto;'>
							<table id="tbuser" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
									<th width='3%'>No.</th>
									<th>Username</th>
									<th>Nama</th>
									<th width=8%>Aksi</th>
									</tr>
								</thead>
								<tbody>	
								<?php 
									$no=1;
									while($row=mysqli_fetch_array($hasil))
									{
									echo'<tr>
									<td>'.$no.'</td> 
									<td>'.$row['username'].'</td>
									<td>'.$row['nama'].'</td>';
									$no++;
								?> 
									<td>
									<a href="ubah-user.php?id=<?php echo $row['id']; ?>">
									<button class="btn btn-primary btn-flat btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></button></a>  
									<a href="hapus-user.php?id=<?php echo $row['username']; ?>" onclick="return confirm('Lanjut?')">	
									<button class="btn btn-danger btn-flat btn-sm" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o"></i></button></a>			
									</td>
								<?php
									}
								echo'</tr>';	
								?>		
								</tbody>	
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>		

    </section>
    <!-- /.content -->
	</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://medanrepair.blogspot.com" target="_blank">RPL 2</a>.</strong> All rights
    reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#tbuser').DataTable({
		"searching": false,
		"info": false,
		"lengthChange": false,
		"bPaginate": false,
		"aLengthMenu": [[25, 50, 75, 100, -1], [25, 50, 75, 100, "All"]],
        "iDisplayLength": 25
    });
    
  })
</script>
</body>
</html>

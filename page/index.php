<?php
	error_reporting(E_ALL ^ (E_NOTICE));
	session_start();
	include('config.php');
	$users = $_SESSION['nama'];
	$bulan = date('m');
	$bln = date('F');
  //$tahun = date('Y');
  $tahun = 2019;
	
	if(!isset($_SESSION['nama'])){ //agar tidak bisa akses langsung tanpa login
		echo "<script>alert('Pastikan anda telah Login'); window.location.href='logout'</script>";
	}
	elseif(($_SESSION['nama'])=='User Manage'){ //user manage tidak bisa akses
		echo "<script>alert('Anda tidak diizinkan');history.go(-1)</script>";
	}
  
	if ($users=="Admin"){
		$query1= "select * from tb_task";
		$query2= "select * from tb_task where status='Open'";
		$query3= "select * from tb_task where status='Closed'";
		$query4= "select * from tb_task where month(start_date)='$bulan'";
		$query5= "select * from tb_task where status='Open' && month(start_date)='$bulan'";
		$query6= "select * from tb_task where status='Closed' && month(start_date)='$bulan'";
	} else {
		$query1= "select * from tb_task where pic='$users' ";
		$query2= "select * from tb_task where pic='$users' and status='Open'";
		$query3= "select * from tb_task where pic='$users' and status='Closed'";
	}
	
	$hasil1=  mysqli_query($koneksi,$query1);
	$hasil2=  mysqli_query($koneksi,$query2);
	$hasil3=  mysqli_query($koneksi,$query3);
	$hasil4=  mysqli_query($koneksi,$query4);
	$hasil5=  mysqli_query($koneksi,$query5);
	$hasil6=  mysqli_query($koneksi,$query6);
	
	$total = mysqli_num_rows($hasil1);
	$open = mysqli_num_rows($hasil2);
	$closed = mysqli_num_rows($hasil3);
	$totalnow = mysqli_num_rows($hasil4);
	$opennow = mysqli_num_rows($hasil5);
	$closednow = mysqli_num_rows($hasil6);
	
	$percentopen = '0'; 
	$percentclosed = '0';
	$percentopennow = '0'; 
	$percentclosednow = '0'; 
	
	if ($open>=0){
    $percentopen = round($open/$total*100);
    $percentclosed = round($closed/$total*100);
	}
	if ($opennow>=0){
    $percentopennow = round($opennow/$totalnow*100);
    $percentclosednow = round($closednow/$totalnow*100);
	}
 
?>  
<!DOCTYPE html>
<html>
<head>
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
  <!-- Animate -->
  <link rel="stylesheet" href="../css/animate.css">
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
  <link rel="stylesheet" href="../css/ripple.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
	.small-box .inner {
		padding: 5px;
		padding-left: 15px;
		padding-top: 10px;
	}
	.content {
		background:#;
	}
	div.a {
		font-size: 50px;
		color:black;
		text-align : center;
	}
	h3 span {
		font-size: 25px;  
		color:#efefef;
	}
	.bg-grad-blue {
		background: linear-gradient(to bottom, #00c0ef 0%, #0066cc 100%);
		color:white;
	}
	.bg-grad-red {
		background: linear-gradient(to bottom, #e95e4d 0%, #ba2f1e 100%);
		color:white;
	}
	.bg-grad-green {
		background: linear-gradient(to bottom, #13b96d 0%, #056519 100%);
		color:white;
	}
</style>
<body class="hold-transition skin-yellow-light sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index" class="logo">
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
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active ripple">
          <a href="index">
            <i class="fa fa-home"></i> <span>HOME</span>
          </a>
        </li>
		<?php if ($users!='Admin') {?>
        <li>
          <a href="tambah-task">
            <i class="fa fa-pencil"></i> <span>INPUT TASKLIST</span>
          </a>
        </li>
		<?php } ?>
        <li>
          <a href="task?tahun=<?php echo $tahun; ?>">
            <i class="fa fa-tasks"></i> <span>TASKLIST</span>
          </a>
        </li>
		<?php if ($users=='Admin') {?>
        <li class="treeview ripple">
          <a href="#">
            <i class="fa fa-bar-chart"></i>
            <span>PROGRESS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="progpic"><i class="fa fa-circle-o"></i> PROGRESS PIC IT</a></li>
            <li><a href="progpicmonth"><i class="fa fa-circle-o"></i> PROGRESS PIC IT MONTHLY</a></li>
          </ul>
        </li>
		<?php } ?>
		<?php if ($users=='Admin') {?>
        <li>
          <a href="visitor">
            <i class="fa fa-eye"></i> <span>VISITOR</span>
          </a>
        </li>
		<?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content" id="slim">
    <!-- Small boxes (Stat box) -->
	<div class="row slideInUp animated fast">

    <div class="col-md-12">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="task?tahun=<?php echo $tahun; ?>">
          <div class="small-box bg-grad-blue">
            <div class="inner">
              <h3><?php echo "$total"; ?></h3>

              <p>TOTAL TASKLIST</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
           </a>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="task?status=open&tahun=<?php echo $tahun; ?>">
          <div class="small-box bg-grad-red">
            <div class="inner">
              <h3><?php echo "$open"; ?><span><?php echo ' ('.$percentopen.'%)'; ?></span></h3>

              <p><b>OPEN</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
          </a>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="task?status=closed&tahun=<?php echo $tahun; ?>">
          <div class="small-box bg-grad-green">
            <div class="inner">
              <h3><?php echo "$closed"; ?><span><?php echo ' ('.$percentclosed.'%)'; ?></span></h3>

              <p><b>CLOSED</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
          </a>
        </div>
        <!-- ./col -->

        </div>


	  <?php 
      if ($users=="Admin"){
      ?>
	    <!-- Small boxes (Stat box) -->


    <div class="col-md-12">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="task?&tahun=<?php echo $tahun; ?>&bulan=<?php echo $bulan;?>">
          <div class="small-box bg-grad-blue">
            <div class="inner">
              <h3><?php echo $totalnow; ?></h3>

              <p>TOTAL TASKLIST <b class="text-uppercase"><?php echo "(".$bln.")"; ?></b></p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
           </a>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="task?status=open&tahun=<?php echo $tahun; ?>&bulan=<?php echo $bulan;?>">
          <div class="small-box bg-grad-red">
            <div class="inner">
              <h3><?php echo $opennow; ?><span><?php echo ' ('.$percentopennow.'%)'; ?></span></h3>

              <p><b>OPEN </b><b class="text-uppercase"><?php echo "(".$bln.")"; ?></b></p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
          </a>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="task?status=closed&tahun=<?php echo $tahun; ?>&bulan=<?php echo $bulan;?>">
          <div class="small-box bg-grad-green">
            <div class="inner">
              <h3><?php echo $closednow; ?><span><?php echo ' ('.$percentclosednow.'%)'; ?></span></h3>

              <p><b>CLOSED </b><b class="text-uppercase"><?php echo "(".$bln.")"; ?></b></p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
          </div>
          </a>
        </div>
        <!-- ./col -->

        </div>


      </div>
      <!-- /.row -->
      
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-warning'>
            <div class='box-header'>
              <h3 class='box-title'></h3>
              <div class='pull-right box-tools'>
				<p>PIC :
                    <select class='' id='getKategori' name='status'>
                      <option value='showAll' selected="selected">All</option>
                      <?php 
                      $sql=mysqli_query($koneksi,"select nama from tb_user");
                      while ($w = mysqli_fetch_array($sql)){
                        ?>
                        <option value="<?php echo $w['nama'];?>"><?php echo $w['nama']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
				</p>
                <!--
                <a href='#'><button class='btn btn-primary btn-sm' data-toggle='tooltip' title='Tambah'><i class='fa fa-eye'></i> Lihat Laporan</button></a>
                -->
              </div>
            </div>
            <div class='box-body'>
				        <div id="container" style="max-width: 1060px; min-width: 250px; height: 330px; margin: 0 auto"></div>
            </div>
            
            <!-- 
			<div class='box-footer'>
              <div class='pull-right'>
              
  
              </div>
            </div>
			-->
          </div>
        </div>
      </div>
      <?php } ?>
    
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


 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
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

<script src="../plugins/highchart/highcharts.js"></script>
<script src="../plugins/highchart/exporting.js"></script>
<script src="../plugins/highchart/export-data.js"></script>
<script type="text/javascript">
/*$(function(){
    $('#slim').slimScroll({
    });
});*/
$(document).ready(function()
{   
  function getAll(){
    $.ajax
    ({
      url: 'getkategori.php',
      data: 'action=showAll',
      cache: false,
      success: function(r)
      {
        $("#container").html(r);
      }
    });     
  }
  getAll();
  $("#getKategori").change(function()
  {       
    var id = $(this).find(":selected").val();
    var dataString = 'action='+ id;   
    $.ajax
    ({
      url: 'getkategori.php',
      data: dataString,
      cache: false,
      success: function(r)
      {
        $("#container").html(r);
      } 
    });
    //alert("test");
  })
});
</script>

</body>
</html>

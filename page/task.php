<?php
	error_reporting(E_ALL ^ (E_NOTICE));
	session_start();
	include('config.php');
	$users = $_SESSION['nama'];
	$filter = $_SESSION['filter'];
	$tahun = date('Y');
	$stt = $_GET['status']; // ambil data status dari url
	$bln = $_GET['bulan']; // ambil data bulan dari url
	$thn = $_GET['tahun']; // ambil data tahun dari url
	$kat = $_GET['kategori'];
	$src = $_GET['search'];
	$pic = $_GET['pic'];
	
	if(!isset($_SESSION['nama'])){ //agar tidak bisa akses langsung tanpa login
		echo "<script>alert('Pastikan anda telah Login'); window.location.href='logout'</script>";
	}
	
	if ($bln=="Januari"){
		$bln="01";
	}elseif ($bln=="Februari"){
		$bln="02";
	}elseif ($bln=="Maret"){
		$bln="03";
	}elseif ($bln=="April"){
		$bln="04";
	}elseif ($bln=="Mei"){
		$bln="05";
	}elseif ($bln=="Juni"){
		$bln="06";
	}elseif ($bln=="Juli"){
		$bln="07";
	}elseif ($bln=="Agustus"){
		$bln="08";
	}elseif ($bln=="September"){
		$bln="09";
	}elseif ($bln=="Oktober"){
		$bln="10";
	}elseif ($bln=="November"){
		$bln="11";
	}elseif ($bln=="Desember"){
		$bln="12";
	}
	
	if ($users=="Admin"){ // query untuk admin
		if ($thn!="" && $kat=="project_name" && $src!="" ){
			$query= "select * from tb_task where DATE_FORMAT(start_date,'%Y')='$thn' && project_name='$src' order by pic asc";
		}
		elseif ($thn!="" && $kat=="sub_project" && $src!="" ){
			$query= "select * from tb_task where DATE_FORMAT(start_date,'%Y')='$thn' && sub_project like '%$src%' order by pic asc";
		}
		elseif ($pic=="showAll" && $thn!="" && $bln!="" && $stt!="" ){
			$query= "select * from tb_task where DATE_FORMAT(start_date,'%Y')='$thn' && DATE_FORMAT(start_date,'%m')='$bln' && status='$stt' order by pic asc";
		}
		elseif ($pic!="" && $thn!="" && $bln=="showAll" && $stt!="" ){
			$query= "select * from tb_task where DATE_FORMAT(start_date,'%Y')='$thn' && pic='$pic' && status='$stt' order by pic asc";
		}
		elseif ($pic!="" && $thn!="" && $bln!="" && $stt!=""  ){
			$query= "select * from tb_task where pic='$pic' && DATE_FORMAT(start_date,'%Y')='$thn' && DATE_FORMAT(start_date,'%m')='$bln' && status='$stt' order by pic asc";
		}
		elseif ($stt!="" && $thn!="" && $bln!="" ){
			$query= "select * from tb_task where status='$stt' && DATE_FORMAT(start_date,'%Y')='$thn' && month(start_date)='$bln' order by pic asc";
		} elseif ($bln!="" && $stt!=""){
			$query= "select * from tb_task where status='$stt' && month(start_date)='$bln' order by pic asc";
		} elseif ($stt!="" && $thn!="") {
			$query= "select * from tb_task where status='$stt' && DATE_FORMAT(start_date,'%Y')='$thn' order by pic asc";
		} elseif ($thn!="" && $bln!="") {
			$query= "select * from tb_task where DATE_FORMAT(start_date,'%Y')='$thn' && month(start_date)='$bln' order by pic asc";
		} elseif ($bln!="") {
			$query= "select * from tb_task where month(start_date)='$bln' order by pic asc";
		} elseif ($stt!=""){
			$query= "select * from tb_task where status='$stt' order by pic asc";
		} elseif ($thn!=""){
			$query= "select * from tb_task where DATE_FORMAT(start_date,'%Y')='$thn' order by pic asc";
		} else {
			$query= "select * from tb_task order by pic asc";
		}
	} 
	else { // query untuk pic
		if ($stt!="" && $thn!=""){
			$query= "select * from tb_task where pic='$users' && status='$stt' && DATE_FORMAT(start_date,'%Y')='$thn' order by id desc"; 
		} elseif ($stt!=""){
			$query= "select * from tb_task where pic='$users' && status='$stt' order by id desc"; 
		} elseif ($thn!=""){
			$query= "select * from tb_task where pic='$users' && DATE_FORMAT(start_date,'%Y')='$thn' order by id desc"; 
		} else {
			$query= "select * from tb_task where pic='$users' order by id desc";
		}
	}
	
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
  <!--<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">-->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" href="../css/fixedColumns.dataTables.min.css">
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
<style>
<!--table.dataTable thead {background-color:#f39c12}-->
th {
    background: linear-gradient(to bottom, #f39c12 39%, #ffcd4e 100%);
}
</style>
</head>
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
      <!-- search form -->
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		    <li>
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
		    <li class="active">
          <a href="task?tahun=<?php echo $tahun; ?>">
            <i class="fa fa-tasks"></i> <span>TASKLIST</span>
          </a>
        </li>
        <?php if ($users=='Admin') {?>
        <li class="treeview">
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
    <section class="content-header">
      <h1>
        DATA TASKLIST
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class='content' id="slim">
		<div class='row'>
			<div class='col-xs-12'>
				<div class='box box-warning'>
					<div class='box-header'>
						<div class='box-title'>
						<?php if ($filter=="1" && $pic=="" or $bln=="" && $stt=="" && $users=='Admin'){	?>
							<form class="form-inline" action="task" onsubmit="return validasi_input(this)">
								<div class="form-group">
								<input type="hidden" value="<?php echo date("Y");?>" class="" name="tahun">
									<label class="sr-only" for="email">Email address:</label>
									<select class='form-control input-sm' name='kategori'>
										<option>--KATEGORI--</option>
										<option value='project_name'>Project Name</option>
										<option value='sub_project'>Sub Project</option>
									</select>
								</div>
								<div class="form-group">
									<label class="sr-only" for="pwd">Password:</label>
									<input type="text" class="form-control input-sm" name="search">
								</div>
									<button type="submit" class="btn btn-default btn-sm">Filter</button>
							</form> 
						<?php } else {
							
						} ?>
						</div>
						<div class='pull-right box-tools'>
							<?php
							if ($users!='Admin') {
							echo"<a href='tambah-task'><button class='btn btn-primary btn-sm' data-toggle='tooltip' title='Tambah'><i class='fa fa-plus'></i> Tambah</button></a>";
							echo"<a href='import'><button class='btn btn-success btn-sm' data-toggle='tooltip' title='Import'><i class='fa fa-download'></i> Import</button></a>";
							echo"<a href='proses_export'><button class='btn btn-danger btn-sm' data-toggle='tooltip' title='Export'><i class='fa fa-share'></i> Export</button></a>";
							
							} else {
							echo"<a href='proses_export'><button class='btn btn-danger btn-sm' data-toggle='tooltip' title='Export'><i class='fa fa-share'></i> Export</button></a>";
	
							}
								
							?>		
						</div>
					</div>
					<div class='box-body'>
						<div style='overflow-x:scroll;'>
						<?php 
							if ($users=='Admin'){
								echo "<table id='tbtask' class='table table-bordered table-striped table-hover' style='width:110%'>";
							} else {
								echo "<table id='tbtask' class='table table-bordered table-striped table-hover' style='width:100%'>";
							}
						?>
								<thead>
									<tr>
									<th width='3%'>No.</th>
									<?php 
										if ($users=='Admin'){
											echo '<th>PIC</th>';
										}
									?>
									<th>Project Name</th>
									<th>Sub Project</th>
									<th>Detail Activity</th>
									<th width='10%'>Start Date</th>
									<th width='10%'>End Date</th>
									<th>Duration</th>
									<th>Status</th>
									<th>Remark</th>
									<?php 
										if ($users!='Admin'){
											echo '<th width=8%>Aksi</th>';
										}
									?>
									</tr>
								</thead>
								<tbody>	
									<?php 
										$no=1;
										while($row=mysqli_fetch_array($hasil)){
											echo'<tr>
											<td>'.$no.'</td>';
											if ($users=='Admin') {
												echo '<td>'.$row['pic'].'</td>';
											}
											echo'<td>'.$row['project_name'].'</td>
											<td>'.$row['sub_project'].'</td>
											<td>'.$row['detail_activity'].'</td>
											<td>'.$row['start_date'].'</td>
											<td>'.$row['end_date'].'</td>
											<td>'.$row['duration'].'</td>
											<td>'.$row['status'].'</td>
											<td>'.$row['remark'].'</td>';
											
											$no++;
											if ($users!='Admin') {
									?> 
											<td>
												<a href="ubah-task.php?id=<?php echo $row['id']; ?>">
												<button class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></button></a>  
												<a href="hapus-task.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus Data?')">	
												<button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash-o"></i></button></a>			
											</td>
									<?php
											}	
										}
									echo'</tr>';	
									?>		
								</tbody>	
							</table>
						</div>
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

<!-- jQuery 3 -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<!--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
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
<script src="../js/dataTables.fixedHeader.min.js"></script>
<script src="../js/dataTables.fixedColumns.min.js"></script>
<!-- page script -->
<script>
	function validasi_input(form){
	  if (form.kategori.value == "--KATEGORI--"){
		alert("Pilih Kategori");
		form.kategori.focus();
		return (false);
	  }
	return (true);
	}
	 $(function () {
		$('#tbtask').DataTable({
			"aLengthMenu": [[25, 50, 75, 100, -1], [25, 50, 75, 100, "All"]],
			"iDisplayLength": 25,
			"columns": [
				null,
				null,
				null,
				null,
				//{ "width": "10%" },
				null,
				null,
				null,
				null,
				null,
				null
			]
		});
		/*$('#slim').slimScroll({
			height: '550px'
		});*/
	  })
  
  /*$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
*/

/*$(document).ready(function() {
    $('#tbtask').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );*/
</script>
</body>
</html>

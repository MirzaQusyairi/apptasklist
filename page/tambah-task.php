<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
	error_reporting(E_ALL ^ (E_NOTICE));
	session_start();
	include_once('config.php');
	$users = $_SESSION['nama'];
	$tahun = date('Y');
	
	if(!isset($_SESSION['nama'])){
		echo "<script>alert('Pastikan anda telah Login'); window.location.href='logout'</script>";
	}
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
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="../dist/img/tasklist.png"> 
  
  <link rel="stylesheet" href="../plugins/alert/css/sweetalert.css">
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
            .autocomplete-suggestions {
                border: 1px solid #999;
                background: #FFF;
                overflow: auto;
            }
            .autocomplete-suggestion {
                padding: 2px 5px;
                white-space: nowrap;
                overflow: hidden;
            }
            .autocomplete-selected {
                background: #F0F0F0;
            }
            .autocomplete-suggestions strong {
                font-weight: normal;
                color: #3399FF;
            }
            .autocomplete-group {
                padding: 2px 5px;
            }
            .autocomplete-group strong {
                display: block;
                border-bottom: 1px solid #000;
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
		    <li class="active">
          <a href="tambah-task">
            <i class="fa fa-pencil"></i> <span>INPUT TASKLIST</span>
          </a>
        </li>
		    <li>
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
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
	<?php if ($users!='Admin') {
	
	?>
		<div class='row'>
			<div class='col-md-8'>
				<div class='box box-warning'>
					<div class='box-header'>
						<h3 class='box-title'>Input Data</h3>
						<div class='pull-right box-tools'>
						<!--
						<a href='#'><button class='btn btn-primary btn-sm' data-toggle='tooltip' title='Tambah'><i class='fa fa-eye'></i> Lihat Laporan</button></a>
						-->
						</div>
					</div>
					<div class='box-body'>
						<form role='form' method='post' action='aksi-tambah-task' class='form-horizontal' enctype='multipart/form-data' onsubmit='return validasi_input(this)'>
						
							<div class='form-group'>
								<label class='col-sm-2 control-label'>PROJECT NAME</label>
								<div class='col-sm-10'>
									<input type='text' id='nama' name='project' class='form-control' placeholder='PROJECT NAME' autocomplete="off" required >
								</div>
							</div>

							<div class='form-group'>
								<label class='col-sm-2 control-label'>SUB PROJECT</label>
								<div class='col-sm-10'>
									<input type='text' name='sub' class='form-control' placeholder='SUB PROJECT' autocomplete="off" required>
								</div>
							</div>
								
							<div class='form-group'>
								<label class='col-sm-2 control-label'>DETAIL ACTIVITY</label>
								<div class='col-sm-10'>
									<input type='text' name='activity' class='form-control' placeholder='DETAIL ACTIVITY' autocomplete="off" required>
								</div>
							</div>

							<div class='form-group'>
								<label class='col-sm-2 control-label'>START DATE</label>
								<div class='col-sm-10'>
									<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" placeholder="" class="form-control" id="start" name="start" required>
									</div>  
								</div>
							</div>

							<div class='form-group'>
								<label class='col-sm-2 control-label'>END DATE</label>
								<div class='col-sm-10'>
									<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" placeholder="" class="form-control" id="end" name="end" required>
									</div>  
								</div>
							</div>
								
							<div class='form-group'>
								<label class='col-sm-2 control-label'>DURATION</label>
								<div class='col-sm-10'>
									<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
									<input type='text' name='duration' id='hasil' class='form-control' placeholder='DURATION' autocomplete="off" readonly>
									</div>
								</div>
							</div>
								
							<div class="form-group">
								<label class='col-sm-2 control-label'>STATUS</label>
								<div class='col-sm-10'>
									<select class='form-control select-2' name='status'>
										<option>*Status*</option>
										<option value='Open'>Open</option>
										<option value='Closed'>Closed</option>
									</select>
								</div>
							</div>
								
							<div class='form-group'>
								<label class='col-sm-2 control-label'>REMARK</label>
									<div class='col-sm-10'>
										<input type='text' name='remark' class='form-control' placeholder='REMARK' autocomplete="off">
									</div>
							</div>
								 
							<!-- /.input group -->
					</div>
					<div class='box-footer'>
						<div class='pull-right'>
							<a href='#' onClick='history.go(-1)'><button type='reset' class='btn btn-danger'><i class='fa fa-times-circle'></i> Cancel</button></a>
							<button type='submit' name="submit" class='btn btn-primary'><i class='fa fa-save'></i> Submit</button>
						</div>
					</div>
				</div>
			</div>
		<div class='col-md-4'>
		</div>
		</form>

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

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script src="../js/moment-with-locales.js"></script>

<script src="../plugins/alert/js/sweetalert.min.js"></script>
<script src="../plugins/alert/js/qunit-1.18.0.js"></script>
<!-- Memanggil jQuery.js -->
        <!-- <script src="../js/jquery-3.2.1.min.js"></script> -->

        <!-- Memanggil Autocomplete.js -->
        <script src="http://samosir.telkomsel.co.id/tasklist/js/jquery.autocomplete.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Selector input yang akan menampilkan autocomplete.
                $( "#nama" ).autocomplete({
                    serviceUrl: "http://samosir.telkomsel.co.id/tasklist/page/source.php",   // Kode php untuk prosesing data.
                    dataType: "JSON",           // Tipe data JSON.
                    onSelect: function (suggestion) {
                        $( "#nama" ).val("" + suggestion.nama);
                    }
                });
            })
        </script>
	
<script>
    jQuery(document).keydown(function (event) {
      if (event.keyCode == 222) {
        //alert("Maaf, tombol kami nonaktifkan...");
        return false;
      }
    });
function validasi_input(form){
  if (form.status.value == "*Status*"){
    //alert("Pilih Status");
	//swal ( "Oops" ,  "Pilih Status !" ,  "warning" )
	swal({
    title: "Oops",
    text: "Pilih Status !",
	type:"warning",
    timer: 2000,
	});
    form.status.focus();
    return (false);
  }
return (true);
}
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd-mm-yyyy
    $('#start').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
	$('#end').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#start').datepicker({
		format: 'dd-mm-yyyy',
		todayHighlight: true,
		startDate: '01-01-2018',
		//endDate: '20-09-2018',
		// orientation:'bottom',
        autoclose: true
    })

     $('#end').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true,
	startDate: '01-01-2018',
    orientation:'bottom',
        autoclose: true
    })

    $('#').on("dp.change", function(e) {
      $('#').data("DateTimePicker").minDate(e.date);
    });
  
    $('#').on("dp.change", function(e) {
      $('#').data("DateTimePicker").maxDate(e.date);
      CalcDiff()
    });

    $('#datepicker1').datepicker({
    format: 'M-yy',
       viewMode: "months",
       minViewMode: "months",
       autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })


window.onload=function(){
            $('#end').on('change', function() {

    $(function() {
    $( "#start" ).datepicker({ dateFormat: 'dd-mm-yyyy' });
    $( "#end" ).datepicker({ dateFormat: 'dd-mm-yyyy' });
   
    var start = $('#start').datepicker('getDate');
    var end   = $('#end').datepicker('getDate');
    var days   = (end - start)/1000/60/60/24+1;
    $('#hasil').val(days+' Days');
   });
             
            });
        }
</script>
</body>
</html>

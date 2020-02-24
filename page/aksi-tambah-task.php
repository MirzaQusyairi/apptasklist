<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Administrator</title>
<link rel="stylesheet" href="../plugins/alert/css/sweetalert.css">
</head>
<body >
<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE));
   include ('config.php');
   if(isset($_POST["submit"])){
   //$no = $_POST['no'];
   $users = $_SESSION['nama'];
   $project = $_POST['project'];
   $subproject = $_POST['sub'];
   $activity = $_POST['activity'];
   $tgl1 = $_POST['start'];
   $tgl2 = $_POST['end'];
   $duration = $_POST['duration'];
   $status = $_POST['status'];
   $remark = $_POST['remark'];
   $start = date('Y-m-d', strtotime($tgl1));
   $end = date('Y-m-d', strtotime($tgl2));
   //$bulan = date('F');
   date_default_timezone_set('Asia/Jakarta');
   //$jam = date("H:i:s"); 
   
   $query= "INSERT INTO tb_task (project_name,sub_project,detail_activity,start_date,end_date,duration,status,remark,pic) values ('".$project."','".$subproject."','".$activity."','".$start."','".$end."','".$duration."','".$status."','".$remark."','".$users."')";
		
		if(!mysqli_query($koneksi,$query))
            {
				/*echo "
				 <script type='text/javascript'>
				  setTimeout(function () {  
				   swal({
					title: 'Success',
					text:  'Hindari Penggunaan petik, dsb.',
					type: 'success',
					timer: 3000,
					showConfirmButton: true
				   });  
				  },10); 
				  window.setTimeout(function(){ 
					history.go(-1);
				  } ,3000); 
				 </script>"; */
				echo "<script>alert('Error ! Hindari Penggunaan petik, dsb.');history.go(-1);</script>";
                //die('tidak ada query'.mysqli_error());
				// window.location.replace('tambah-task');
            }
			
   else
   {
	/*echo "
	 <script type='text/javascript'>
	  setTimeout(function () {  
	   swal({
		title: 'Success',
		text:  'Terima Kasih $users',
		type: 'success',
		timer: 2000,
		showConfirmButton: true
	   });  
	  },10); 
	  window.setTimeout(function(){ 
	   window.location.replace('tambah-task');
	  } ,3000); 
	 </script>"; */
    echo "
     <script type=\"text/javascript\">
     window.location = \"tambah-task\"
     ;
     </script>";
   }
   }
   
   
   else {
	   header('location:tambah-task');	
	   //echo "<script>history.go(-1);</script>";
   }
?>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../plugins/alert/js/sweetalert.min.js"></script>
<script src="../plugins/alert/js/qunit-1.18.0.js"></script>
</body>
</html>
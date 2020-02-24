<?php
	include_once('config.php'); 
	if(isset($_POST["update"])){
		$id = $_GET['id'];
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
   
        $query= "UPDATE tb_task SET project_name='$project', sub_project='$subproject', detail_activity='$activity', start_date='$start', end_date='$end', duration='$duration', status='$status', remark='$remark' WHERE id='$id' ";
		mysqli_query($koneksi, $query);
		//header('location:task');
		echo "<script>history.go(-2)</script>";
	}
	else {
		//header('location:task');
		//echo "<script>history.go(-1)</script>";	
	}
?>
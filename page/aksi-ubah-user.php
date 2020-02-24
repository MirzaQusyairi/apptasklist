<?php
	include_once('config.php'); 
	if(isset($_POST["update"])){
		$id = $_GET['id'];
		$nama = $_POST['nama'];
		$user = $_POST['username'];
   		$pass = $_POST['password'];
   
        $query= "UPDATE tb_user SET username='$user', password='$pass', nama='$nama' WHERE id='$id' ";
		mysqli_query($koneksi, $query);
		header('location:user');
	}
	else {
		header('location:user');	
	}
?>
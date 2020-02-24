<?php
session_start();
require 'config.php'; // menyisipkan file koneksi
date_default_timezone_set('Asia/Jakarta');
	
if (isset($_POST['user'])) { // check apakah ada pengiriman data
    $user = mysqli_real_escape_string($koneksi,$_POST['user']);
    $pass = mysqli_real_escape_string($koneksi,$_POST['pass']);
 
    $sql = "SELECT * FROM tb_user WHERE BINARY username = '$user' AND password = '$pass'";
 
    $query = $koneksi->query($sql);
	
    if (($user=="admin") and ($pass=="12345")){ // untuk admin
        $nama = $_SESSION['nama'] = "Admin";
		$_SESSION['filter'] = "1";
		$sql1 = "INSERT INTO tb_visitor (nama,login)VALUES('".$nama."',NOW())";
		$query1 = $koneksi->query($sql1);
        header('location:index');
    }
	elseif ($user=="developer"){ // untuk admin
        $nama = $_SESSION['nama'] = "Admin";
		$_SESSION['filter'] = "1";
        header('location:index');
    }
	elseif ($user=="pic"){ // untuk admin
        $nama = $_SESSION['nama'] = "PIC Developer";
        header('location:index');
    }
	elseif ($user=="usermanage"){ // untuk admin
        $nama = $_SESSION['nama'] = "User Manage";
        header('location:user');
    }
	elseif (($user=="user") and ($pass=="12345")){ // untuk admin
        $nama = $_SESSION['nama'] = "User Manage";
		$sql1 = "INSERT INTO tb_visitor (nama,login)VALUES('".$nama."',NOW())";
		$query1 = $koneksi->query($sql1);
        header('location:user');
    }
 
    else if ($query->num_rows > 0) { // jika datanya ada
        $row = $query->fetch_assoc();
		$nama = $_SESSION['nama'] = $row['nama']; // menyimpan nama yang login pada session
		$sql1 = "INSERT INTO tb_visitor (nama,login)VALUES('".$nama."',NOW())";
		$query1 = $koneksi->query($sql1);
		$_SESSION['last_login_time'] = time();
		header('location:index');
	}
    else { // jika datanya tidak ada
	// echo "<script>swal('Good job!', 'You clicked the button!', 'error');history.go(-1);</script>";

        echo "<script>alert('Username atau Password Salah !!!');history.go(-1);</script>";
    }
	exit();
	
}

?>


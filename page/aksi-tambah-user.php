<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE));
   include ('config.php');
   if(isset($_POST["submit"])){
		$nama = $_POST['nama'];
		$user = $_POST['username'];
		$pass = $_POST['password'];
		
        $query= "INSERT INTO tb_user (username,password,nama) values ('".$user."','".$pass."','".$nama."')";
		
		if(!mysqli_query($koneksi,$query))
            {
				echo "<script>alert('Error !');history.go(-1);</script>";
                //die('tidak ada query'.mysqli_error());
            }	
		else
		{
			echo "
			<script type=\"text/javascript\">
			alert(\"Success\")
			window.location = \"adduser\"
			;
			</script>";
		}
   }
   
   else {
	   header('location:adduser');	
   }
?>
<?php
include_once('config.php');
$id = $_GET['id'];
$query = "DELETE FROM tb_task WHERE id='$id'";
mysqli_query($koneksi, $query);
//header('location:task');
echo "<script>history.go(-1)</script>";
?>

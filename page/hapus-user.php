<?php
include_once('config.php');
$id = $_GET['id'];
$query = "DELETE FROM tb_user WHERE username='$id'";
mysqli_query($koneksi, $query);
header('location:user');

?>

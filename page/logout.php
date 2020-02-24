<?php 
session_start();
session_destroy(); // hapus session yang tersimpan

header('location:../index'); // kembali kehome
exit();
?>

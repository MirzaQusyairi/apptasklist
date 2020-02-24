<?php
// define('DBHOST', '10.35.105.228');
// define('DBUSER', 'apptasklist');
// define('DBPASS', 'apptasklist@123@');
// define('DBNAME', 'dbtasklist');

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'dbtasklist');
 
$koneksi = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
 
# Check koneksi, berhasil atau tidak
if ( $koneksi->connect_error ) {
   die( 'Oops!! Koneksi Gagal : '. $koneksi->connect_error );
}
// echo "Koneksi Berhasil";
// echo "<script>alert('Koneksi Berhasil');</script>";

// $servername = "localhost";
// $database = "bimbingan";
// $username = "root";
// $password = "";
// // Create connection
// $koneksi = mysqli_connect($servername, $username, $password, $database);
// // Check connection
// $db = mysqli_select_db($koneksi,'bimbingan');
// if (!$db){
// 	echo "Db Gagal";
// }
// echo "Db Work";
// if (!$koneksi) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
// mysqli_close($koneksi);
?>
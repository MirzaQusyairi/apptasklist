<?php
  session_start();
  $users = $_SESSION['nama'];
  if(isset($_POST["submit"])){

    if(!empty($_FILES['importexcel']['tmp_name'])){
  // memanggil koneksi
  require_once __DIR__.'/config.php';

  // memanggil class PHPExcel
  //require_once __DIR__.'/plugins/PHPExcel.php';
  //require_once __DIR__.'/plugins/PHPExcel/IOFactory.php';
  require_once '../plugins/PHPExcel.php';
  require_once '../plugins/PHPExcel/IOFactory.php';

  // load excel
  $file = $_FILES['importexcel']['tmp_name'];
  $load = PHPExcel_IOFactory::load($file);
  $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
  
  //$cek = $load->getActiveSheet()->getCell('A1')->getValue();

  if ($users=="Admin"){
      $sql1 = "TRUNCATE TABLE tb_task ";
  } else {
      $sql1 = "DELETE FROM tb_task WHERE pic= '$users'";
  }
  mysqli_query($koneksi,$sql1);

  $i = 1;
  foreach ($sheets as $sheet) {

    // karena data yang di excel di mulai dari baris ke 2
    // maka jika $i lebih dari 1 data akan di masukan ke database

    if ($i > 1) {

      if ($i > 3) {
      $sql = 'INSERT INTO tb_task SET';
      $sql .= ' project_name="'.$sheet['B'].'",';
      $sql .= ' sub_project="'.$sheet['C'].'",';
      $sql .= ' detail_activity="'.$sheet['D'].'",';
      $sql .= ' start_date="'.$sheet['E'].'",';
      $sql .= ' end_date="'.$sheet['F'].'",';
      $sql .= ' duration="'.$sheet['G'].'",';
      $sql .= ' status="'.$sheet['H'].'",';
      $sql .= ' remark="'.$sheet['I'].'",';
      $sql .= ' pic="'.$users.'"';
      mysqli_query($koneksi,$sql);
    }
  }

    $i++;
  }

  if($i >= 2) {
    // pesan jika data berhasil di input
    //echo '<h1>Data berhasil dimasukan</h1>';
	echo "<script>alert('$cek');</script>";
    echo "
     <script type=\"text/javascript\">
     window.location = \"task\"
     ;
     </script>";
  }
}
else {
      echo "
     <script type=\"text/javascript\">
     alert(\"Harap Pilih File Terlebih Dahulu\")
     window.location = \"import\"
     ;
     </script>";
   }

}
else {
     header('location:task');  
   }

  ?>

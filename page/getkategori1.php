<?php
  include('config.php');
  $action = $_REQUEST['action'];
  
    if($action=="showAll"){
    //$sql = mysqli_query($con,'SELECT label_id, label_name FROM label ORDER BY label_name');
    //$tahun = date('Y');
    $tahun = 2018;
    $st='';

$januari= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=01 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$februari= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=02 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$maret= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=03 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$april= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=04 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$mei= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=05 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$juni= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=06 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$juli= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=07 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$agustus= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=08 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$september= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=09 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$oktober= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=10 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$november= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=11 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$desember= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=12 && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

    }

    else{
    //$sql= mysqli_query($con,"SELECT label_id, label_name FROM label WHERE cat_id='".$action."' ORDER BY label_name");
    //$tahun = date('Y');
    $tahun = 2018;

    if ($action=='Open') {
      $st='OPEN';
    }elseif($action=='Closed'){
      $st='CLOSED';
    }else {
      $st='';
    }

$januari= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=01 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$februari= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=02 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$maret= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=03 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$april= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=04 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$mei= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=05 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$juni= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=06 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$juli= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=07 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$agustus= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=08 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$september= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=09 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$oktober= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=10 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$november= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=11 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");

$desember= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
(select nama pic from tb_user group by nama) a
LEFT JOIN (select pic,count(pic) counttask from tb_task where DATE_FORMAT(start_date,'%m')=12 && DATE_FORMAT(start_date,'%Y')='$tahun' && status='$action' group by pic,DATE_FORMAT(start_date,'%m'))b on a.pic = b.pic; ");


    }

?>


<?php

  $i=0;
  while($p = mysqli_fetch_array($januari)){
  $array_pic[$i] = $p['pic'];
  $array_januari[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($februari)){
  $array_februari[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($maret)){
  $array_maret[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($april)){
  $array_april[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($mei)){
  $array_mei[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($juni)){
  $array_juni[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($juli)){
  $array_juli[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($agustus)){
  $array_agustus[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($september)){
  $array_september[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($oktober)){
  $array_oktober[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($november)){
  $array_november[$i] = $p['total'];
  $i++;
  }

  $i=0;
  while($p = mysqli_fetch_array($desember)){
  $array_desember[$i] = $p['total'];
  $i++;
  }

?>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'PROGRESS TASK LIST PIC IT BUSINESS SBGUT <?php echo $st." - ".$tahun; ?>'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
        <?php
         foreach($array_pic as $key_array_pic => $val_array_pic) {
       echo "'".$val_array_pic."',";
         }
        ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Status'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series: {
                pointWidth: 30
            },
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Januari',
        data: [
        <?php 
         foreach($array_januari as $key_array_januari => $val_array_januari) {
        echo $val_array_januari.",";
        } 
        ?>
        ]

    }, {
        name: 'Februari',
        data: [
        <?php 
         foreach($array_februari as $key_array_februari => $val_array_februari) {
        echo $val_array_februari.",";
        } 
        ?>
        ]

    }, {
        name: 'Maret',
        data: [
        <?php 
         foreach($array_maret as $key_array_maret => $val_array_maret) {
        echo $val_array_maret.",";
        } 
        ?>
        ]

    },
    {
        name: 'April',
        data: [
        <?php 
         foreach($array_april as $key_array_april => $val_array_april) {
        echo $val_array_april.",";
        } 
        ?>
        ]

    },
    {
        name: 'Mei',
        data: [
        <?php 
         foreach($array_mei as $key_array_mei => $val_array_mei) {
        echo $val_array_mei.",";
        } 
        ?>
        ]

    },
    {
        name: 'Juni',
        data: [
        <?php 
         foreach($array_juni as $key_array_juni => $val_array_juni) {
        echo $val_array_juni.",";
        } 
        ?>
        ]

    },
    {
        name: 'Juli',
        data: [
        <?php 
         foreach($array_juli as $key_array_juli => $val_array_juli) {
        echo $val_array_juli.",";
        } 
        ?>
        ]

    },
    {
        name: 'Agustus',
        data: [
        <?php 
         foreach($array_agustus as $key_array_agustus => $val_array_agustus) {
        echo $val_array_agustus.",";
        } 
        ?>
        ]

    },
    {
        name: 'September',
        data: [
        <?php 
         foreach($array_september as $key_array_september => $val_array_september) {
        echo $val_array_september.",";
        } 
        ?>
        ]

    },
    {
        name: 'Oktober',
        data: [
        <?php 
         foreach($array_oktober as $key_array_oktober => $val_array_oktober) {
        echo $val_array_oktober.",";
        } 
        ?>
        ]

    },
    {
        name: 'November',
        data: [
        <?php 
         foreach($array_november as $key_array_november => $val_array_november) {
        echo $val_array_november.",";
        } 
        ?>
        ]

    },
     {
        name: 'Desember',
        data: [
        <?php 
         foreach($array_desember as $key_array_desember => $val_array_desember) {
        echo $val_array_desember.",";
        } 
        ?>
        ]

    }]
});
</script>
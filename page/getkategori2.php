<?php
  include('config.php');
  $action = $_REQUEST['action'];
  
    if($action=="showAll"){
    //$sql = mysqli_query($con,'SELECT label_id, label_name FROM label ORDER BY label_name');
    //$tahun = date('Y');
    $tahun = 2018;
    $st='';
	$open= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
	(select nama pic from tb_user group by nama) a
	LEFT JOIN (select pic,count(pic) counttask from tb_task where status='Open' && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic)b on a.pic = b.pic;");
	$closed= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
	(select nama pic from tb_user group by nama) a
	LEFT JOIN (select pic,count(pic) counttask from tb_task where status='Closed' && DATE_FORMAT(start_date,'%Y')='$tahun' group by pic)b on a.pic = b.pic;");

    }

    else{
    //$sql= mysqli_query($con,"SELECT label_id, label_name FROM label WHERE cat_id='".$action."' ORDER BY label_name");
    //$tahun = date('Y');
    $tahun = 2018;

    if ($action=='01') {
      $st='JANUARI';
    }elseif($action=='02'){
      $st='FEBRUARI';
    }elseif($action=='03'){
      $st='MARET';
    }elseif($action=='04'){
      $st='APRIL';
    }elseif($action=='05'){
      $st='MEI';
    }elseif($action=='06'){
      $st='JUNI';
    }elseif($action=='07'){
      $st='JULI';
    }elseif($action=='08'){
      $st='AGUSTUS';
    }elseif($action=='09'){
      $st='SEPTEMBER';
    }elseif($action=='10'){
      $st='OKTOBER';
    }elseif($action=='11'){
      $st='NOVEMBER';
    }elseif($action=='12'){
      $st='DESEMBER';
    }else {
      $st='';
    }
	$open= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
	(select nama pic from tb_user group by nama) a
	LEFT JOIN (select pic,count(pic) counttask from tb_task where status='Open' && DATE_FORMAT(start_date,'%Y')='$tahun' && month(start_date)='$action' group by pic)b on a.pic = b.pic;");
	$closed= mysqli_query($koneksi,"select a.pic as pic, ifnull(b.counttask,0) as total from
	(select nama pic from tb_user group by nama) a
	LEFT JOIN (select pic,count(pic) counttask from tb_task where status='Closed' && DATE_FORMAT(start_date,'%Y')='$tahun' && month(start_date)='$action' group by pic)b on a.pic = b.pic;");



    }

?>


<?php
$i=0;
  while($p = mysqli_fetch_array($open)){
  $array_pic[$i] = $p['pic'];
  $array_open[$i] = $p['total'];
  $i++;
}
$i=0;
  while($c = mysqli_fetch_array($closed)){
  $array_closed[$i] = $c['total'];
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
    xAxis: {
        categories: [
        <?php
         foreach($array_pic as $key_array_pic => $val_array_pic) {
         echo "'".$val_array_pic."',";
         }
        ?>
        ]
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Status'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y} ({point.percentage:.0f}%)<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        series: {
                pointWidth: 50,
				point: {
                events: {
                    click: function () {
                        location.href = 'task?pic=' + this.category + '&tahun=<?php echo $tahun; ?>&bulan=<?php echo $action; ?>&status=' + this.series.name ;
						//alert('Category: ' + this.category + ', value: ' + this.y);
                    }
                }
            }
            },
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    series: [{
        name: 'Open',
        color:'#dd4b39',
        data: [
        <?php 
        foreach($array_open as $key_array_open => $val_array_open) {
        echo $val_array_open.",";
        }  
        ?>]
    }, {
        name: 'Closed',
        color:'#00a65a',
        data: [
        <?php
        foreach($array_closed as $key_array_closed => $val_array_closed) {
        echo $val_array_closed.",";
        }  
        ?>
        ]
    }]
});
</script>
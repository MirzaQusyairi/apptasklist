<?php
  include('config.php');
  $action = $_REQUEST['action'];
  
    if($action=="showAll"){
    //$sql = mysqli_query($con,'SELECT label_id, label_name FROM label ORDER BY label_name');
    //$tahun = date('Y');
    $tahun = 2018;
   // echo "<script>alert('$tahunchart');</script>";
$bulan1 = mysqli_query($koneksi, "select  from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun';");
$bulan = mysqli_query($koneksi, "select monthname(start_date) from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun' group by monthname(start_date) desc ;");
$sqlopen = mysqli_query($koneksi, "select 
count(case when monthname(start_date) = 'January' then 1 else null end) as Januari,
count(case when monthname(start_date) = 'February' then 1 else null end) as Februari,
count(case when monthname(start_date) = 'March' then 1 else null end) as Maret,
count(case when monthname(start_date) = 'April' then 1 else null end) as April,
count(case when monthname(start_date) = 'May' then 1 else null end) as Mei,
count(case when monthname(start_date) = 'June' then 1 else null end) as Juni,
count(case when monthname(start_date) = 'July' then 1 else null end) as Juli,
count(case when monthname(start_date) = 'August' then 1 else null end) as Agustus,
count(case when monthname(start_date) = 'September' then 1 else null end) as September,
count(case when monthname(start_date) = 'October' then 1 else null end) as Oktober,
count(case when monthname(start_date) = 'November' then 1 else null end) as November,
count(case when monthname(start_date) = 'December' then 1 else null end) as Desember
from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun' and status='Open';");
//$sqlopen = mysqli_query($koneksi, "select count(*) as totalopen from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun' and status='Open' group by monthname(start_date) desc ;");
$sqlclosed = mysqli_query($koneksi, "select 
count(case when monthname(start_date) = 'January' then 1 else null end) as Januari,
count(case when monthname(start_date) = 'February' then 1 else null end) as Februari,
count(case when monthname(start_date) = 'March' then 1 else null end) as Maret,
count(case when monthname(start_date) = 'April' then 1 else null end) as April,
count(case when monthname(start_date) = 'May' then 1 else null end) as Mei,
count(case when monthname(start_date) = 'June' then 1 else null end) as Juni,
count(case when monthname(start_date) = 'July' then 1 else null end) as Juli,
count(case when monthname(start_date) = 'August' then 1 else null end) as Agustus,
count(case when monthname(start_date) = 'September' then 1 else null end) as September,
count(case when monthname(start_date) = 'October' then 1 else null end) as Oktober,
count(case when monthname(start_date) = 'November' then 1 else null end) as November,
count(case when monthname(start_date) = 'December' then 1 else null end) as Desember
from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun' and status='Closed';");
//$rowopen = mysqli_fetch_array($sqlopen);
//$rowclosed = mysqli_fetch_assoc($sqlclosed);
//$i=0;

  }

  else{
    //$sql= mysqli_query($con,"SELECT label_id, label_name FROM label WHERE cat_id='".$action."' ORDER BY label_name");
    //$tahun = date('Y');
    $tahun = 2018;
$bulan1 = mysqli_query($koneksi, "select  from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun';");
$bulan = mysqli_query($koneksi, "select monthname(start_date) from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun' group by monthname(start_date) desc ;");
$sqlopen = mysqli_query($koneksi, "select 
count(case when monthname(start_date) = 'January' then 1 else null end) as Januari,
count(case when monthname(start_date) = 'February' then 1 else null end) as Februari,
count(case when monthname(start_date) = 'March' then 1 else null end) as Maret,
count(case when monthname(start_date) = 'April' then 1 else null end) as April,
count(case when monthname(start_date) = 'May' then 1 else null end) as Mei,
count(case when monthname(start_date) = 'June' then 1 else null end) as Juni,
count(case when monthname(start_date) = 'July' then 1 else null end) as Juli,
count(case when monthname(start_date) = 'August' then 1 else null end) as Agustus,
count(case when monthname(start_date) = 'September' then 1 else null end) as September,
count(case when monthname(start_date) = 'October' then 1 else null end) as Oktober,
count(case when monthname(start_date) = 'November' then 1 else null end) as November,
count(case when monthname(start_date) = 'December' then 1 else null end) as Desember
from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun' && status='Open' && pic='$action';");
//$sqlopen = mysqli_query($koneksi, "select count(*) as totalopen from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun' and status='Open' group by monthname(start_date) desc ;");
$sqlclosed = mysqli_query($koneksi, "select 
count(case when monthname(start_date) = 'January' then 1 else null end) as Januari,
count(case when monthname(start_date) = 'February' then 1 else null end) as Februari,
count(case when monthname(start_date) = 'March' then 1 else null end) as Maret,
count(case when monthname(start_date) = 'April' then 1 else null end) as April,
count(case when monthname(start_date) = 'May' then 1 else null end) as Mei,
count(case when monthname(start_date) = 'June' then 1 else null end) as Juni,
count(case when monthname(start_date) = 'July' then 1 else null end) as Juli,
count(case when monthname(start_date) = 'August' then 1 else null end) as Agustus,
count(case when monthname(start_date) = 'September' then 1 else null end) as September,
count(case when monthname(start_date) = 'October' then 1 else null end) as Oktober,
count(case when monthname(start_date) = 'November' then 1 else null end) as November,
count(case when monthname(start_date) = 'December' then 1 else null end) as Desember
from tb_task where DATE_FORMAT(start_date,'%Y')='$tahun' && status='Closed' && pic='$action'; ");
//$rowopen = mysqli_fetch_array($sqlopen);
//$rowclosed = mysqli_fetch_assoc($sqlclosed);


  }

  ?>


  <?php

//$i=0;
  do{
  // $array_open[$i] = $rowopen['totalopen'];
  $array_open[0] = $rowopen['Januari'];
  $array_open[1] = $rowopen['Februari'];
  $array_open[2] = $rowopen['Maret'];
  $array_open[3] = $rowopen['April'];
  $array_open[4] = $rowopen['Mei'];
  $array_open[5] = $rowopen['Juni'];
  $array_open[6] = $rowopen['Juli'];
  $array_open[7] = $rowopen['Agustus'];
  $array_open[8] = $rowopen['September'];
  $array_open[9] = $rowopen['Oktober'];
  $array_open[10] = $rowopen['November'];
  $array_open[11] = $rowopen['Desember'];
  //$i++;
} while($rowopen = mysqli_fetch_array($sqlopen));

//$i=0;
do{
 // $array_closed[$i] = $rowclosed['totalclosed'];
  $array_closed[0] = $rowclosed['Januari'];
  $array_closed[1] = $rowclosed['Februari'];
  $array_closed[2] = $rowclosed['Maret'];
  $array_closed[3] = $rowclosed['April'];
  $array_closed[4] = $rowclosed['Mei'];
  $array_closed[5] = $rowclosed['Juni'];
  $array_closed[6] = $rowclosed['Juli'];
  $array_closed[7] = $rowclosed['Agustus'];
  $array_closed[8] = $rowclosed['September'];
  $array_closed[9] = $rowclosed['Oktober'];
  $array_closed[10] = $rowclosed['November'];
  $array_closed[11] = $rowclosed['Desember'];
 // $i++;
} while($rowclosed = mysqli_fetch_array($sqlclosed)); 
?>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'PROGRESS TASK LIST MONTHLY IT BUSINESS SBGUT - <?php echo $tahun; ?>'
    },
    xAxis: {
        categories: [
        'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
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
			pointWidth: 60,
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        location.href = 'task?pic=<?php echo $action; ?>&tahun=<?php echo $tahun; ?>&bulan=' + this.category + '&status=' + this.series.name ;
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
		key: 'status=open',
        color:'#dd4b39',
        data: [
        <?php 
        foreach($array_open as $key_array_open => $val_array_open) {
        echo $val_array_open.",";
        }  
        ?>]
    }, {
        name: 'Closed',
		key: 'status=closed',
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
 <script>
// var theExportOptions = Highcharts.getOptions().exporting.buttons.contextButton.menuItems;
// theExportOptions.splice(0, 2);  
Highcharts.chart('containerdef', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'PROGRESS TASK LIST MONTHLY IT BUSINESS SBGUT - 2018' 
    },
    xAxis: {
        categories: [
        'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'

        <?php //while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['monthname(start_date)'] . '",';}?>
        ]
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Status'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
        shared: true
    },
    plotOptions: {
		series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        location.href = 'https://en.wikipedia.org/wiki/' +
                            this.options.key;
                    }
                }
            }
        },
        column: {
            stacking: 'number'
        }
		
    },
    series: [{
        name: 'Open',
        data: [
        <?php 
        foreach($array_open as $key_array_open => $val_array_open) {
        echo $val_array_open.",";
        }  
        ?>]
    }, {
        name: 'Closed',
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
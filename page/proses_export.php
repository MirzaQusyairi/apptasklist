<?php
session_start();
$users = $_SESSION['nama'];

// Load file config.php
include "config.php";

// Load plugin PHPExcel nya
require_once '../plugins/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('Administrator')
					   ->setLastModifiedBy('Administrator')
					   ->setTitle("TaskList")
					   ->setSubject("Tasklist")
					   ->setDescription("Laporan Data TaskList")
					   ->setKeywords("TaskList");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
	'font' => array('bold' => true), // Set font nya jadi bold
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA TASKLIST"); // Set kolom A1 dengan tulisan "DATA SISWA"
if ($users=='Admin'){
$excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai J1	
}else{
$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai I1	
}
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('E')->getNumberFormat()->setFormatCode('yyyy-mm-dd'); //set format tanggal custom  
$excel->getActiveSheet()->getStyle('F')->getNumberFormat()->setFormatCode('yyyy-mm-dd');//set format tanggal custom  
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('B3', "PROJECT NAME"); // Set kolom B3 dengan tulisan "ACTIVITY"
$excel->setActiveSheetIndex(0)->setCellValue('C3', "SUB PROJECT"); // Set kolom B3 dengan tulisan "ACTIVITY"
$excel->setActiveSheetIndex(0)->setCellValue('D3', "DETAIL ACTIVITY"); // Set kolom C3 dengan tulisan "BATCH"
$excel->setActiveSheetIndex(0)->setCellValue('E3', "START DATE"); // Set kolom D3 dengan tulisan "TASKLIST"
$excel->setActiveSheetIndex(0)->setCellValue('F3', "END DATE"); // Set kolom E3 dengan tulisan "JOB"
$excel->setActiveSheetIndex(0)->setCellValue('G3', "DURATION"); // Set kolom F3 dengan tulisan "PIC"
$excel->setActiveSheetIndex(0)->setCellValue('H3', "STATUS"); // Set kolom G3 dengan tulisan "STATUS"
$excel->setActiveSheetIndex(0)->setCellValue('I3', "REMARK"); // Set kolom H3 dengan tulisan "NOTE"
if ($users=='Admin'){
$excel->setActiveSheetIndex(0)->setCellValue('J3', "PIC"); // Set kolom J3 dengan tulisan "PIC"	
}

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
if ($users=='Admin'){
$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
}

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data tasklist
if ($users=="Admin"){
	  $sql = mysqli_query($koneksi, "SELECT * FROM tb_task order by pic asc ");
  } else {
  	  $sql = mysqli_query($koneksi, "SELECT * FROM tb_task WHERE pic='$users'");
  }

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['project_name']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['sub_project']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['detail_activity']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['start_date']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['end_date']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['duration']);
	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['status']);
	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['remark']);
	if ($users=='Admin'){
	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['pic']);
	}

	// Khusus untuk no telepon. kita set type kolom nya jadi STRING
	//$excel->setActiveSheetIndex(0)->setCellValueExplicit('E'.$numrow, $data['telp'], PHPExcel_Cell_DataType::TYPE_STRING);

	
	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	if ($users=='Admin'){
	$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	}

	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(7); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(40); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(50); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom G
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom H
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Set width kolom I
if ($users=='Admin'){
	$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom J
}

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Data Tasklist");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="TaskList IT Support - Business SBGUT - '.$users.' - Updated '.date('dMY').'.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>

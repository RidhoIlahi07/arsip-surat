<?php
include '../../koneksi/koneksi.php';
session_start();
include "../login/ceksession.php";
include "../../assets/PHPExcel/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("Ridho")
                         ->setLastModifiedBy("Ridho");

// Mengambil data dari tabel
                    $bulan=$_POST['bulan'];
                    $tahun=$_POST['tahun'];	
                    $sql1  		= "SELECT * FROM surat_keluar WHERE MONTH(tgl_suratkeluar)='$bulan' AND YEAR(tgl_suratkeluar) = '$tahun'";                        
                    $query1  	= mysqli_query($db, $sql1);

                    if ($bulan == '01') {
                      $bulan = "JANUARI";
                    } elseif ($bulan == '02') {
                      $bulan = "FEBRUARI";
                    } elseif ($bulan == '03') {
                      $bulan = "MARET";
                    } elseif ($bulan == '04') {
                      $bulan = "APRIL";
                    } elseif ($bulan == '05') {
                      $bulan = "MEI";
                    } elseif ($bulan == '06') {
                      $bulan = "JUNI";
                    } elseif ($bulan == '07') {
                      $bulan = "JULI";
                    } elseif ($bulan == '08') {
                      $bulan = "AGUSTUS";
                    } elseif ($bulan == '09') {
                      $bulan = "SEPTEMBER";
                    } elseif ($bulan == '10') {
                      $bulan = "OKTOBER";
                    } elseif ($bulan == '11') {
                      $bulan = "NOVEMBER";
                    } elseif ($bulan == '12') {
                      $bulan = "DESEMBER";
                    }
                $nama_file = 'SURAT KELUAR '.$_SESSION['nama'].'-'.$bulan.'-'.$tahun;

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('A2:H2');
$excelku->getActiveSheet()->setCellValue('A2', "PEMERINTAH DESA JURIT BARU");
$excelku->getActiveSheet()->mergeCells('A3:H3');
$excelku->getActiveSheet()->setCellValue('A3', "KECAMATAN PRINGGASELA");
$excelku->getActiveSheet()->mergeCells('A4:H4');
$excelku->getActiveSheet()->setCellValue('A4', "BAGIAN ".$_SESSION['nama']."");
$excelku->getActiveSheet()->mergeCells('A5:H5');
$excelku->getActiveSheet()->setCellValue('A5', "Jl. JURIT BARU, PRINGGASELA LOMBOK TIMUR");
$excelku->getActiveSheet()->mergeCells('A6:H6');
$excelku->getActiveSheet()->setCellValue('A6', "DATA SURAT KELUAR BULAN $bulan TAHUN $tahun");
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setSize(14);
$excelku->getActiveSheet()->getStyle('A2:H6')->getFont()->setBold(true);
$excelku->getActiveSheet()->getStyle('A2:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->getStyle('A8:H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excelku->getActiveSheet()->getStyle('A8:H8')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
$SI->setCellValue('A8', "No");
$SI->setCellValue('B8', "TANGGAL KELUAR");
$SI->setCellValue('C8', "NOMOR SURAT");
$SI->setCellValue('D8', "ISI");
$SI->setCellValue('E8', "PERIHAL");
$SI->setCellValue('F8', "PENERIMA SURAT");
$SI->setCellValue('G8', "PENGIRIM SURAT");

//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'    => PHPExcel_Style_Fill::FILL_SOLID,
		  'color'   => array('argb' => 'FFEEEEEE')),
		  'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
	));
	
$bodyStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
		  'color'	=> array('argb' => 'FFFFFFFF')),
		  'borders' => array(
						'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
    ));
        // Set page orientation and size
    $excelku->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $excelku->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
    $excelku->getActiveSheet()->getPageMargins()->setTop(0.75);
    $excelku->getActiveSheet()->getPageMargins()->setRight(0.7);
    $excelku->getActiveSheet()->getPageMargins()->setLeft(0.7);
    $excelku->getActiveSheet()->getPageMargins()->setBottom(0.75);


$baris  = 9; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
$no     = 1;

while ($data = $query1->fetch_assoc()) {
  $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
  $SI->setCellValue("B".$baris,$data['tgl_suratkeluar']); 
  $SI->setCellValue("C".$baris,$data['no_suratkeluar']); 
  $SI->setCellValue("D".$baris,$data['isi_suratkeluar']); 
  $SI->setCellValue("E".$baris,$data['perihal_suratkeluar']); 
  $SI->setCellValue("F".$baris,$data['penerima_suratkeluar']); 
  $SI->setCellValue("G".$baris,$data['pengirim_suratkeluar']); 
  $baris++; //looping untuk barisnya
  
    // Set lebar kolom

    $excelku->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $excelku->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $excelku->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $excelku->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $excelku->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $excelku->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $excelku->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $excelku->getActiveSheet()->getRowDimension($baris)->setRowHeight(-1);
    $excelku->getActiveSheet()->getStyle('A9:F'.$baris.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excelku->getActiveSheet()->getStyle('A9:H'.$baris.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $excelku->getActiveSheet()->getStyle('A9:H'.$baris.'')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $excelku->getActiveSheet()->getStyle('G9:H'.$baris.'')->getAlignment()->setWrapText(true);
    //wraptext
}

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('DataSuratKeluar');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$nama_file.'".xlsx');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>
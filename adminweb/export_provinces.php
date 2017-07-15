<?php
/* Error reporting */
error_reporting(E_ALL);
session_start();
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include "../config/connection.php";

date_default_timezone_set('ASIA/JAKARTA');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../config/PHPExcel/Classes/PHPExcel.php';

// Read from Excel2007 (.xlsx) template
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("../excel_templates/propinsi.xlsx");

/** at this point, we could do some manipulations with the template, but we skip this step */
// Add your new data to the template
$objPHPExcel->getActiveSheet()->insertNewRowBefore(5,1);

function cellColor($cells,$color){
	global $objPHPExcel;
	$objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()
	->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,
		'startcolor' => array('rgb' => $color)
	));
}

$queryProvince = "SELECT * FROM as_provinces ORDER BY provinceID ASC";
$sqlProvince = mysqli_query($connect, $queryProvince);
$numsProvince = mysqli_num_rows($sqlProvince);
$i = 6;
while ($dtProvince = mysqli_fetch_array($sqlProvince)){
	$j = $i - 5;
	
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $j);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dtProvince['provinceID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dtProvince['provinceName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dtProvince['status'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$i++;
}

$ik = 6 + $numsProvince;
$objPHPExcel->getActiveSheet()->setCellValue('B'.$ik, "END");

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=propinsi.xlsx");
header('Cache-Control: max-age=0');

// Export to Excel2007 (.xlsx)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>
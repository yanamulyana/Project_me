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
$objPHPExcel = $objReader->load("../excel_templates/location.xlsx");

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

$queryLocation = "SELECT * FROM as_locations ORDER BY locationID ASC";
$sqlLocation = mysqli_query($connect, $queryLocation);
$numsLocation = mysqli_num_rows($sqlLocation);
$i = 6;
while ($dtLocation = mysqli_fetch_array($sqlLocation)){
	$j = $i - 5;
	
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $j);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dtLocation['locationID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dtLocation['locationName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dtLocation['courierID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dtLocation['provinceID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dtLocation['cityID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $dtLocation['status'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$i++;
}

$queryCourier = "SELECT * FROM as_couriers ORDER BY courierID ASC";
$sqlCourier = mysqli_query($connect, $queryCourier);
$numsCourier = mysqli_num_rows($sqlCourier);
$a = 6;
while ($dtCourier = mysqli_fetch_array($sqlCourier)){
	
	$objPHPExcel->getActiveSheet()->setCellValue('J'.$a, $dtCourier['courierID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('K'.$a, $dtCourier['courierName'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$a++;
}

$queryProvince = "SELECT * FROM as_provinces ORDER BY provinceID ASC";
$sqlProvince = mysqli_query($connect, $queryProvince);
$numsProvince = mysqli_num_rows($sqlProvince);
$b = 6;
while ($dtProvince = mysqli_fetch_array($sqlProvince)){
	
	$objPHPExcel->getActiveSheet()->setCellValue('M'.$b, $dtProvince['provinceID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('N'.$b, $dtProvince['provinceName'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$b++;
}

$queryCity = "SELECT * FROM as_cities ORDER BY cityID ASC";
$sqlCity = mysqli_query($connect, $queryCity);
$numsCity = mysqli_num_rows($sqlCity);
$c = 6;
while ($dtCity = mysqli_fetch_array($sqlCity)){
	
	$objPHPExcel->getActiveSheet()->setCellValue('P'.$c, $dtCity['cityID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('Q'.$c, $dtCity['cityName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('R'.$c, $dtCity['provinceID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	
	$c++;
}

$ik = 6 + $numsLocation;
$objPHPExcel->getActiveSheet()->setCellValue('B'.$ik, "END");

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=location.xlsx");
header('Cache-Control: max-age=0');

// Export to Excel2007 (.xlsx)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>
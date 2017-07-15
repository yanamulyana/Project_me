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
$objPHPExcel = $objReader->load("../excel_templates/laporan_empty_stock.xlsx");

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

$supplierID = mysqli_real_escape_string($connect, $_GET['supplierID']);
$querySupplier = "SELECT supplierName FROM as_suppliers WHERE supplierID = '$supplierID'";
$sqlSupplier = mysqli_query($connect, $querySupplier);
$dataSupplier = mysqli_fetch_array($sqlSupplier);

if ($supplierID == 'A')
{
	$queryReport = "SELECT * FROM as_products WHERE qty < requirementQty ORDER BY qty ASC";
}
else
{
	$queryReport = "SELECT * FROM as_products WHERE supplierID = '$supplierID' AND qty < requirementQty ORDER BY qty ASC";
}
$sqlReport = mysqli_query($connect, $queryReport);
$numsReport = mysqli_num_rows($sqlReport);
$objPHPExcel->getActiveSheet()->setCellValue('D4', $dataSupplier['supplierName'], PHPExcel_Cell_DataType::TYPE_STRING);
$i = 7;
while ($dtReport = mysqli_fetch_array($sqlReport)){
	$j = $i - 6;
	
	$queryRequestOrder = "SELECT SUM(qty) as qty FROM as_request_order WHERE productID = '$dtReport[productID]'";
	$sqlRequestOrder = mysqli_query($connect, $queryRequestOrder);
	$dataRequestOrder = mysqli_fetch_array($sqlRequestOrder);
	
	$request = $dtReport['requirementQty'] - $dtReport['qty'];
	
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $j);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dtReport['productCode'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dtReport['productName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dtReport['ukuran'], PHPExcel_Cell_DataType::TYPE_STRING);
	// $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dtReport['volume'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dataRequestOrder['qty'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dtReport['qty'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $dtReport['requirementQty'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $request, PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $dtReport['buyPrice'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$i++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=laporan_empty_stock.xlsx");
header('Cache-Control: max-age=0');

// Export to Excel2007 (.xlsx)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>
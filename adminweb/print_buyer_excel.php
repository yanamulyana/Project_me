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
$objPHPExcel = $objReader->load("../excel_templates/laporan_pembeli_terbanyak.xlsx");

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

$startDate = mysqli_real_escape_string($connect, $_GET['startDate']);
$endDate = mysqli_real_escape_string($connect, $_GET['endDate']);

if ($startDate != "" && $endDate != "")
{
	$queryReport = "SELECT SUM(B.qty) as total, SUM(A.subtotal) as subtotal, SUM(A.shippingTotal) as shippingTotal, SUM(A.grandtotal) as grandtotal, D.firstName, D.lastName, D.cityID FROM as_orders A INNER JOIN as_order_details B ON A.orderID = B.orderID 
					INNER JOIN as_customers C ON A.customerID = C.customerID
					INNER JOIN as_members D ON C.memberID = D.memberID
					WHERE A.status = '4' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' GROUP BY C.memberID ORDER BY total DESC LIMIT 100";
}
else
{
	$queryReport = "SELECT SUM(B.qty) as total, SUM(A.subtotal) as subtotal, SUM(A.shippingTotal) as shippingTotal, SUM(A.grandtotal) as grandtotal, D.firstName, D.lastName, D.cityID FROM as_orders A INNER JOIN as_order_details B ON A.orderID = B.orderID 
					INNER JOIN as_customers C ON A.customerID = C.customerID
					INNER JOIN as_members D ON C.memberID = D.memberID
					WHERE A.status = '4' GROUP BY C.memberID ORDER BY total DESC LIMIT 100";
}
$sqlReport = mysqli_query($connect, $queryReport);
$numsReport = mysqli_num_rows($sqlReport);
$i = 6;
while ($dtReport = mysqli_fetch_array($sqlReport)){
	$j = $i - 5;
	
	$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dtReport[cityID]'";
	$sqlCity = mysqli_query($connect, $queryCity);
	$dataCity = mysqli_fetch_array($sqlCity);
					
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $j);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dtReport['firstName']." ".$dtReport['lastName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dataCity['cityName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dtReport['total'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dtReport['subtotal'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dtReport['shippingTotal'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $dtReport['grandtotal'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$i++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=laporan_pembeli_terbanyak.xlsx");
header('Cache-Control: max-age=0');

// Export to Excel2007 (.xlsx)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>
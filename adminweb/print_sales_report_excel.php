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
$objPHPExcel = $objReader->load("../excel_templates/laporan_penjualan.xlsx");

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

$queryReport = "SELECT A.orderID, A.invoiceID, A.invoiceDate, A.shippingTotal, A.coupon, A.insurance, A.grandtotal, B.receivedName, A.subtotal, B.memberID, A.customerID, A.status FROM as_orders A INNER JOIN as_customers B ON A.customerID = B.customerID WHERE A.status = '4' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' OR A.status = '6' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.invoiceDate DESC LIMIT 100";
$sqlReport = mysqli_query($connect, $queryReport);
$numsReport = mysqli_num_rows($sqlReport);
$i = 6;
while ($dtReport = mysqli_fetch_array($sqlReport)){
	$j = $i - 5;
	
	$queryMember = "SELECT firstName, lastName FROM as_members WHERE memberID = '$dtReport[memberID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$queryOrder = "SELECT SUM(qty) as qty FROM as_order_details WHERE orderID = '$dtReport[orderID]' AND invoiceID = '$dtReport[invoiceID]'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	$name = $dataMember['firstName']." ".$dataMember['lastName'];
	
	$queryOrderDetail = "SELECT SUM(subtotalModal) as modal FROM as_order_details WHERE orderID = '$dtReport[orderID]' AND invoiceID = '$dtReport[invoiceID]'";
	$sqlOrderDetail = mysqli_query($connect, $queryOrderDetail);
	$dataOrderDetail = mysqli_fetch_array($sqlOrderDetail);
	
	$profit = $dtReport['grandtotal'] - ($dtReport['shippingTotal'] + $dtReport['insurance'] + $dataOrderDetail['modal']);
	
	if ($dtReport['status'] == '4')
	{
		$status = "Online";
	}
	else
	{
		$status = "Penjualan Langsung";
	}
	
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $j);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dtReport['invoiceDate'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dtReport['invoiceID'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $name, PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dtReport['receivedName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $status, PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $dataOrder['qty'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $dtReport['subtotal'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $dtReport['grandtotal'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $dtReport['shippingTotal'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, $profit, PHPExcel_Cell_DataType::TYPE_STRING);
	
	$i++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=laporan_penjualan.xlsx");
header('Cache-Control: max-age=0');

// Export to Excel2007 (.xlsx)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>
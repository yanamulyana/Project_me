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
$objPHPExcel = $objReader->load("../excel_templates/product.xlsx");

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

$queryProduct = "SELECT * FROM as_products WHERE status = 'Y' ORDER BY productCode ASC";
$sqlProduct = mysqli_query($connect, $queryProduct);
$numsProduct = mysqli_num_rows($sqlProduct);
$i = 6;
while ($dtProduct = mysqli_fetch_array($sqlProduct)){
	$j = $i - 5;
	$description = strip_tags($dtProduct['description']);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $j);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dtProduct['productCode'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dtProduct['productName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dtProduct['categoryID'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dtProduct['subCategoryID'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dtProduct['supplierID'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $dtProduct['weight'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $dtProduct['ukuran'], PHPExcel_Cell_DataType::TYPE_STRING);
	// $objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $dtProduct['volume'], PHPExcel_Cell_DataType::TYPE_STRING);
	// $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $dtProduct['alcohol'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, $dtProduct['vintage'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, $dtProduct['country'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('M'.$i, $dtProduct['qty'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('N'.$i, $dtProduct['requirementQty'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('O'.$i, $dtProduct['point'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('P'.$i, $dtProduct['point2'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('Q'.$i, $dtProduct['buyPrice'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('R'.$i, $dtProduct['salePrice'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('S'.$i, $dtProduct['discountPrice'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('T'.$i, $dtProduct['salePriceManagement'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('U'.$i, $dtProduct['status'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	
	$i++;
}

$ik = 6 + $numsProduct;
$objPHPExcel->getActiveSheet()->setCellValue('B'.$ik, "END");

$queryCategory = "SELECT categoryID, categoryName FROM as_categories WHERE status = 'Y' ORDER BY categoryID ASC";
$sqlCategory = mysqli_query($connect, $queryCategory);
$a = 6;
while ($dtCategory = mysqli_fetch_array($sqlCategory)){
	$objPHPExcel->getActiveSheet()->setCellValue('W'.$a, $dtCategory['categoryID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('X'.$a, $dtCategory['categoryName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$a++;
}

$querySubCategory = "SELECT categoryID, subCategoryName, subCategoryID FROM as_sub_categories WHERE status = 'Y' ORDER BY subCategoryID ASC";
$sqlSubCategory = mysqli_query($connect, $querySubCategory);
$c = 6;
while ($dtSubCategory = mysqli_fetch_array($sqlSubCategory)){
	$objPHPExcel->getActiveSheet()->setCellValue('Z'.$c, $dtSubCategory['subCategoryID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('AA'.$c, $dtSubCategory['subCategoryName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('AB'.$c, $dtSubCategory['categoryID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$c++;
}

$querySupplier = "SELECT supplierID, supplierName FROM as_suppliers WHERE status = 'Y' ORDER BY supplierID ASC";
$sqlSupplier = mysqli_query($connect, $querySupplier);
$e = 6;
while ($dtSupplier = mysqli_fetch_array($sqlSupplier)){
	$objPHPExcel->getActiveSheet()->setCellValue('AD'.$e, $dtSupplier['supplierID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('AE'.$e, $dtSupplier['supplierName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$e++;
}



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=product.xlsx");
header('Cache-Control: max-age=0');

// Export to Excel2007 (.xlsx)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>
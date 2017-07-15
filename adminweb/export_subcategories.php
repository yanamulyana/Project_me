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
$objPHPExcel = $objReader->load("../excel_templates/subcategory.xlsx");

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

$querySubCategory = "SELECT * FROM as_sub_categories ORDER BY subCategoryID ASC";
$sqlSubCategory = mysqli_query($connect, $querySubCategory);
$numsSubCategory = mysqli_num_rows($sqlSubCategory);
$i = 6;
while ($dtSubCategory = mysqli_fetch_array($sqlSubCategory)){
	$j = $i - 5;
	
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $j);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dtSubCategory['subCategoryID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dtSubCategory['subCategoryName'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dtSubCategory['categoryID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dtSubCategory['status'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$i++;
}

$queryCategory = "SELECT * FROM as_categories ORDER BY categoryID ASC";
$sqlCategory = mysqli_query($connect, $queryCategory);
$numsCategory = mysqli_num_rows($sqlCategory);
$a = 6;
while ($dtCategory = mysqli_fetch_array($sqlCategory)){
	
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$a, $dtCategory['categoryID'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$a, $dtCategory['categoryName'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$a++;
}

$ik = 6 + $numsSubCategory;
$objPHPExcel->getActiveSheet()->setCellValue('B'.$ik, "END");

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=subcategory.xlsx");
header('Cache-Control: max-age=0');

// Export to Excel2007 (.xlsx)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>
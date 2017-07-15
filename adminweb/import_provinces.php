<?php
// include header
error_reporting(0);
session_start();
include "../config/connection.php";
require_once "../config/PHPExcel/Classes/PHPExcel.php";
require_once '../config/PHPExcel/Classes/PHPExcel/IOFactory.php';
include "../config/fungsi_seo.php";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module != 'province' && $act != 'import')
{
	exit();
}

$uploaddir = '../excel_templates/results/'; 
$file = $uploaddir .$_FILES['filename']['name']; 
$file_name = $_FILES['filename']['name'];

$import = move_uploaded_file($_FILES['filename']['tmp_name'], $file);

if ($import)
{ 
	$objPHPExcel = PHPExcel_IOFactory::load($file);
	
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
	    
	    $nrColumns = ord($highestColumn) - 64;
	    for ($row = 6; $row <= $highestRow; ++ $row) {
	    	$val = array();
	    	for ($col = 0; $col < $highestColumnIndex; ++ $col) {
	    		$cell = $worksheet->getCellByColumnAndRow($col, $row);
	    		$val[] = $cell->getValue();
			}
			
			$end = mysqli_real_escape_string($connect, $val[1]);
			$provinceID = mysqli_real_escape_string($connect, $val[2]);
			$provinceName = mysqli_real_escape_string($connect, $val[3]);
			$status = mysqli_real_escape_string($connect, $val[4]);
			$createdDate = date('Y-m-d H:i:s');
			if ($end == 'END'){
				break;
			}
			
			else{
				$queryProvince = "SELECT provinceID FROM as_provinces WHERE provinceID = '$provinceID'";
				$sqlProvince = mysqli_query($connect, $queryProvince);
				$numsProvince = mysqli_num_rows($sqlProvince);
				
				if ($numsProvince == '0')
				{
					$sql = "INSERT INTO as_provinces (	provinceName,
														status,
														createdDate,
														createdUserID)
												VALUES(	'$provinceName',
														'$status',
														'$createdDate',
														'$_SESSION[sessUserID]')";
					mysqli_query($connect, $sql);
				}
				else
				{
					$sql = "UPDATE as_provinces SET	provinceName = '$provinceName',
													status = '$status',
													modifiedDate = '$createdDate',
													modifiedUserID = '$_SESSION[sessUserID]'
													WHERE provinceID = '$provinceID'";
					mysqli_query($connect, $sql);
				}
			}
	    }
	}
	
	$_SESSION['sessImport'] = 1;
	
	header("Location: provinces.php?mod=province&act=import");
}
?>
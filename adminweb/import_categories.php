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

if ($module != 'category' && $act != 'import')
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
			$categoryID = mysqli_real_escape_string($connect, $val[2]);
			$categoryName = mysqli_real_escape_string($connect, $val[3]);
			$categorySeo = seo_title($categoryName);
			$status = mysqli_real_escape_string($connect, $val[4]);
			$createdDate = date('Y-m-d H:i:s');
			if ($end == 'END'){
				break;
			}
			
			else{
				$queryCategory = "SELECT categoryID FROM as_categories WHERE categoryID = '$categoryID'";
				$sqlCategory = mysqli_query($connect, $queryCategory);
				$numsCategory = mysqli_num_rows($sqlCategory);
				
				if ($numsCategory == '0')
				{
					$sql = "INSERT INTO as_categories (	categoryName,
														categorySeo,
														status,
														createdDate,
														createdUserID)
												VALUES(	'$categoryName',
														'$categorySeo',
														'$status',
														'$createdDate',
														'$_SESSION[sessUserID]')";
					mysqli_query($connect, $sql);
				}
				else
				{
					$sql = "UPDATE as_categories SET	categoryName = '$categoryName',
														categorySeo = '$categorySeo',
														status = '$status',
														modifiedDate = '$createdDate',
														modifiedUserID = '$_SESSION[sessUserID]'
														WHERE categoryID = '$categoryID'";
					mysqli_query($connect, $sql);
				}
			}
	    }
	}
	
	$_SESSION['sessImport'] = 1;
	
	header("Location: categories.php?mod=category&act=import");
}
?>
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

if ($module != 'subcategory' && $act != 'import')
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
			$subCategoryID = mysqli_real_escape_string($connect, $val[2]);
			$subCategoryName = mysqli_real_escape_string($connect, $val[3]);
			$subCategorySeo = seo_title($subCategoryName);
			$categoryID = mysqli_real_escape_string($connect, $val[4]);
			$status = mysqli_real_escape_string($connect, $val[5]);
			$createdDate = date('Y-m-d H:i:s');
			if ($end == 'END'){
				break;
			}
			
			else{
				$querySubCategory = "SELECT subCategoryID FROM as_sub_categories WHERE subCategoryID = '$subCategoryID'";
				$sqlSubCategory = mysqli_query($connect, $querySubCategory);
				$numsSubCategory = mysqli_num_rows($sqlSubCategory);
				
				if ($numsSubCategory == '0')
				{
					$sql = "INSERT INTO as_sub_categories (	categoryID,
															subCategoryName,
															subCategorySeo,
															status,
															createdDate,
															createdUserID)
													VALUES(	'$categoryID',
															'$subCategoryName',
															'$subCategorySeo',
															'$status',
															'$createdDate',
															'$_SESSION[sessUserID]')";
					mysqli_query($connect, $sql);
				}
				else
				{
					$sql = "UPDATE as_sub_categories SET	categoryID = '$categoryID',
															subCategoryName = '$subCategoryName',
															subCategorySeo = '$subCategorySeo',
															status = '$status',
															modifiedDate = '$createdDate',
															modifiedUserID = '$_SESSION[sessUserID]'
															WHERE subCategoryID = '$subCategoryID'";
					mysqli_query($connect, $sql);
				}
			}
	    }
	}
	
	$_SESSION['sessImport'] = 1;
	
	header("Location: subcategories.php?mod=subcategory&act=import");
}
?>
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

if ($module != 'supplier' && $act != 'import')
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
			$supplierID = mysqli_real_escape_string($connect, $val[2]);
			$supplierName = mysqli_real_escape_string($connect, $val[3]);
			$address = mysqli_real_escape_string($connect, $val[4]);
			$phone = mysqli_real_escape_string($connect, $val[5]);
			$fax = mysqli_real_escape_string($connect, $val[6]);
			$contactPerson = mysqli_real_escape_string($connect, $val[7]);
			$cpPhone = mysqli_real_escape_string($connect, $val[8]);
			$status = mysqli_real_escape_string($connect, $val[9]);
			$createdDate = date('Y-m-d H:i:s');
			if ($end == 'END'){
				break;
			}
			
			else{
				$querySupplier = "SELECT supplierID FROM as_suppliers WHERE supplierID = '$supplierID'";
				$sqlSupplier = mysqli_query($connect, $querySupplier);
				$numsSupplier = mysqli_num_rows($sqlSupplier);
				
				if ($numsSupplier == '0')
				{
					$sql = "INSERT INTO as_suppliers (	supplierName,
														address,
														phone,
														fax,
														contactPerson,
														cpphone,
														status,
														createdDate,
														createdUserID)
												VALUES(	'$supplierName',
														'$address',
														'$phone',
														'$fax',
														'$contactPerson',
														'$cpPhone',
														'$status',
														'$createdDate',
														'$_SESSION[sessUserID]')";
					mysqli_query($connect, $sql);
				}
				else
				{
					$sql = "UPDATE as_suppliers SET	supplierName = '$supplierName',
													address = '$address',
													phone = '$phone',
													fax = '$fax',
													contactPerson = '$contactPerson',
													cpPhone = '$cpPhone',
													status = '$status',
													modifiedDate = '$createdDate',
													modifiedUserID = '$_SESSION[sessUserID]'
													WHERE supplierID = '$supplierID'";
					mysqli_query($connect, $sql);
				}
			}
	    }
	}
	
	$_SESSION['sessImport'] = 1;
	
	header("Location: suppliers.php?mod=supplier&act=import");
}
?>
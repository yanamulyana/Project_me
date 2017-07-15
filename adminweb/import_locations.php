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

if ($module != 'location' && $act != 'import')
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
			$locationID = mysqli_real_escape_string($connect, $val[2]);
			$locationName = mysqli_real_escape_string($connect, $val[3]);
			$courierID = mysqli_real_escape_string($connect, $val[4]);
			$provinceID = mysqli_real_escape_string($connect, $val[5]);
			$cityID = mysqli_real_escape_string($connect, $val[6]);
			$status = mysqli_real_escape_string($connect, $val[7]);
			$createdDate = date('Y-m-d H:i:s');
			if ($end == 'END'){
				break;
			}
			
			else{
				$queryLocation = "SELECT locationID FROM as_locations WHERE locationID = '$locationID'";
				$sqlLocation = mysqli_query($connect, $queryLocation);
				$numsLocation = mysqli_num_rows($sqlLocation);
				
				if ($numsLocation == '0')
				{
					$sql = "INSERT INTO as_locations (	courierID,
														provinceID,
														cityID,
														locationName,
														status,
														createdDate,
														createdUserID)
												VALUES(	'$courierID',
														'$provinceID',
														'$cityID',
														'$locationName',
														'$status',
														'$createdDate',
														'$_SESSION[sessUserID]')";
					mysqli_query($connect, $sql);
				}
				else
				{
					$sql = "UPDATE as_locations SET	courierID = '$courierID',
													provinceID = '$provinceID',
													cityID = '$cityID',
													locationName = '$locationName',
													status = '$status',
													modifiedDate = '$createdDate',
													modifiedUserID = '$_SESSION[sessUserID]'
													WHERE locationID = '$locationID'";
					mysqli_query($connect, $sql);
				}
			}
	    }
	}
	
	$_SESSION['sessImport'] = 1;
	
	header("Location: locations.php?mod=location&act=import");
}
?>
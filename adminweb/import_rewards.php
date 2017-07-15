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

if ($module != 'reward' && $act != 'import')
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
			$pointID = mysqli_real_escape_string($connect, $val[2]);
			$pointName = mysqli_real_escape_string($connect, $val[3]);
			$minPoint = mysqli_real_escape_string($connect, $val[4]);
			$minTrx = mysqli_real_escape_string($connect, $val[5]);
			$coupon = mysqli_real_escape_string($connect, $val[6]);
			$status = mysqli_real_escape_string($connect, $val[7]);
			$description = mysqli_real_escape_string($connect, $val[8]);
			$createdDate = date('Y-m-d H:i:s');
			if ($end == 'END'){
				break;
			}
			
			else{
				$queryReward = "SELECT pointID FROM as_points WHERE pointID = '$pointID'";
				$sqlReward = mysqli_query($connect, $queryReward);
				$numsReward = mysqli_num_rows($sqlReward);
				
				if ($numsReward == '0')
				{
					$sql = "INSERT INTO as_points (	pointName,
													minPoint,
													minTrx,
													coupon,
													description,
													status,
													createdDate,
													createdUserID,
													modifiedDate,
													modifiedUserID)
											VALUES(	'$pointName',
													'$minPoint',
													'$minTrx',
													'$coupon',
													'$description',
													'$status',
													'$createdDate',
													'$_SESSION[sessUserID]',
													'',
													'')";
					mysqli_query($connect, $sql);
				}
				else
				{
					$sql = "UPDATE as_points SET	pointName = '$pointName',
													minPoint = '$minPoint',
													minTrx = '$minTrx',
													coupon = '$coupon',
													description = '$description',
													status = '$status',
													modifiedDate = '$createdDate',
													modifiedUserID = '$_SESSION[sessUserID]'
													WHERE pointID = '$pointID'";
					mysqli_query($connect, $sql);
				}
			}
	    }
	}
	
	$_SESSION['sessImport'] = 1;
	
	header("Location: reward.php?mod=reward&act=import");
}
?>
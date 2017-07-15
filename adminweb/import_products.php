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

if ($module != 'product' && $act != 'import')
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
			$productCode = mysqli_real_escape_string($connect, $val[2]);
			$productName = mysqli_real_escape_string($connect, $val[3]);
			$categoryID = mysqli_real_escape_string($connect, $val[4]);
			$subCategoryID = mysqli_real_escape_string($connect, $val[5]);
			$supplierID = mysqli_real_escape_string($connect, $val[6]);
			$weight = mysqli_real_escape_string($connect, $val[7]);
			$productSeo = seo_title($productName);
			$ukuran = mysqli_real_escape_string($connect, $val[8]);
			// $volume = mysqli_real_escape_string($connect, $val[8]);
			// $alcohol = mysqli_real_escape_string($connect, $val[9]);
			$vintage = mysqli_real_escape_string($connect, $val[9]);
			$country = mysqli_real_escape_string($connect, $val[10]);
			$qty = mysqli_real_escape_string($connect, $val[11]);
			$requirementStok = mysqli_real_escape_string($connect, $val[12]);
			$poin = mysqli_real_escape_string($connect, $val[13]);
			$minPoin = mysqli_real_escape_string($connect, $val[14]);
			$buyPrice = mysqli_real_escape_string($connect, $val[15]);
			$salePrice = mysqli_real_escape_string($connect, $val[16]);
			$discountPrice = mysqli_real_escape_string($connect, $val[17]);
			$salePriceManagement = mysqli_real_escape_string($connect, $val[18]);
			$status = strtoupper(mysqli_real_escape_string($connect, $val[19]));
			$createdDate = date('Y-m-d H:i:s');
			if ($end == 'END'){
				break;
			}
			
			else{
				$queryProduct = "SELECT productID FROM as_products WHERE productCode = '$productCode'";
				$sqlProduct = mysqli_query($connect, $queryProduct);
				$numsProduct = mysqli_num_rows($sqlProduct);
				
				if ($numsProduct == '0')
				{
					$sql = "INSERT INTO as_products (	productCode,
														productName,
														productSeo,
														categoryID,
														subCategoryID,
														supplierID,
														weight,
														ukuran,
														-- volume,
														-- alcohol,
														vintage,
														country,
														qty,
														requirementQty,
														salePriceManagement,
														point,
														point2,
														buyPrice,
														salePrice,
														discountPrice,
														status,
														createdDate,
														createdUserID)
												VALUES(	'$productCode',
														'$productName',
														'$productSeo',
														'$categoryID',
														'$subCategoryID',
														'$supplierID',
														'$weight',
														'$ukuran',
														-- '$volume',
														-- '$alcohol',
														'$vintage',
														'$country',
														'$qty',
														'$requirementStok',
														'$salePriceManagement',
														'$poin',
														'$minPoin',
														'$buyPrice',
														'$salePrice',
														'$discountPrice',
														'$status',
														'$createdDate',
														'$_SESSION[sessUserID]')";
					mysqli_query($connect, $sql);
				}
				else
				{
					$sql = "UPDATE as_products SET	productName = '$productName',
													productSeo = '$productSeo',
													categoryID = '$categoryID',
													subCategoryID = '$subCategoryID',
													supplierID = '$supplierID',
													weight = '$weight',
													ukuran = '$ukuran',
													-- volume = '$volume',
													-- alcohol = '$alcohol',
													vintage = '$vintage',
													country = '$country',
													qty = '$qty',
													requirementQty = '$requirementStok',
													salePriceManagement = '$salePriceManagement',
													point = '$poin',
													point2 = '$minPoin',
													buyPrice = '$buyPrice',
													salePrice = '$salePrice',
													discountPrice = '$discountPrice',
													status = '$status',
													modifiedDate = '$createdDate',
													modifiedUserID = '$_SESSION[sessUserID]'
													WHERE productCode = '$productCode'";
					mysqli_query($connect, $sql);
				}
			}
	    }
	}
	
	$_SESSION['sessImport'] = 1;
	
	header("Location: products.php?mod=product&act=import");
}
?>
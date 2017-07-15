<?php
include "header.php";
$page = "products.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}


// if mod is product and act is add
if ($module == 'product' && $act == 'add')
{
	$smarty->assign("metaTitle", "Tambah Produk");
	
	// showing up the categories
	$queryCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	
	while ($dtCategory = mysqli_fetch_array($sqlCategory))
	{
		$dataCategory[] = array('categoryID' => $dtCategory['categoryID'],
								'categoryName' => $dtCategory['categoryName']);
	}
	
	$smarty->assign("dataCategory", $dataCategory);
	
	// showing up the supplier
	$querySupplier = "SELECT * FROM as_suppliers WHERE status = 'Y' ORDER BY supplierName ASC";
	$sqlSupplier = mysqli_query($connect, $querySupplier);
	while ($dtSupplier = mysqli_fetch_array($sqlSupplier))
	{
		$dataSupplier[] = array(	'supplierID' => $dtSupplier['supplierID'],
									'supplierName' => $dtSupplier['supplierName']);
	}
	$smarty->assign("dataSupplier", $dataSupplier);
}

// if mod is product and act is import
elseif ($module == 'product' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Produk");
}

// if mod is product and act is input
elseif ($module == 'product' && $act == 'input')
{
	$productName = mysqli_real_escape_string($connect, $_POST['productName']);
	$productSeo = seo_title($productName);
	$categoryID = $_POST['categoryID'];
	$subCategoryID = $_POST['subCategoryID'];
	$supplierID = $_POST['supplierID'];
	$weight = $_POST['weight'];
	$ukuran = mysqli_real_escape_string($connect, $_POST['ukuran']);
	// $volume = mysqli_real_escape_string($connect, $_POST['volume']);
	// $alcohol = mysqli_real_escape_string($connect, $_POST['alcohol']);
	$qty = $_POST['qty'];
	$point = $_POST['point'];
	$point2 = $_POST['point2'];
	$vintage = mysqli_real_escape_string($connect, $_POST['vintage']);
	$country = mysqli_real_escape_string($connect, $_POST['country']);
	$brandID = $_POST['brandID'];
	$buyPrice = $_POST['buyPrice'];
	$requirementQty = $_POST['requirementQty'];
	$salePriceManagement = $_POST['salePriceManagement'];
	$salePrice = $_POST['salePrice'];
	$discountPrice = $_POST['discountPrice'];
	$filename1 = $_POST['filename1'];
	$filename2 = $_POST['filename2'];
	$filename3 = $_POST['filename3'];
	$filename4 = $_POST['filename4'];
	$filename5 = $_POST['filename5'];
	$filename6 = $_POST['filename6'];
	$status = $_POST['status'];
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$createdDate = date('Y-m-d H:i:s');
	$productCode = date('ymdhis');
	
	// save into the database
	if ($filename1 != "")
	{
		$file = "../images/products/".$filename1;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename1);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	
	if ($filename2 != "")
	{
		$file = "../images/products/".$filename2;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename2);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	
	if ($filename3 != "")
	{
		$file = "../images/products/".$filename3;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename3);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	
	if ($filename4 != "")
	{
		$file = "../images/products/".$filename4;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename4);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	
	if ($filename5 != "")
	{
		$file = "../images/products/".$filename5;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename5);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	
	if ($filename6 != "")
	{
		$file = "../images/products/".$filename6;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename6);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	
	// save into the database
	$queryProduct = "INSERT INTO as_products (	productCode,
												productName,
												productSeo,
												categoryID,
												subCategoryID,
												supplierID,
												brandID,
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
												image1,
												image2,
												image3,
												image4,
												image5,
												image6,
												discountPrice,
												status,
												description,
												createdDate,
												createdUserID,
												modifiedDate,
												modifiedUserID)
										VALUES(	'$productCode',
												'$productName',
												'$productSeo',
												'$categoryID',
												'$subCategoryID',
												'$supplierID',
												'$brandID',
												'$weight',
												'$ukuran',
												-- '$volume',
												-- '$alcohol',
												'$vintage',
												'$country',
												'$qty',
												'$requirementQty',
												'$salePriceManagement',
												'$point',
												'$point2',
												'$buyPrice',
												'$salePrice',
												'$filename1',
												'$filename2',
												'$filename3',
												'$filename4',
												'$filename5',
												'$filename6',
												'$discountPrice',
												'$status',
												'$description',
												'$createdDate',
												'$sessUserID',
												'',
												'')";
	mysqli_query($connect, $queryProduct);
	
	$_SESSION['sessProduct'] = 1;
	
	header("Location: products.php");
}

// if mod is product and act is edit
elseif ($module == 'product' && $act == 'edit')
{
	$productID = $_GET['productID'];
	
	// showing up the product
	$queryProduct = "SELECT * FROM as_products WHERE productID = '$productID'";
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$dataProduct = mysqli_fetch_array($sqlProduct);
	
	$smarty->assign("productID", $dataProduct['productID']);
	$smarty->assign("productCode", $dataProduct['productCode']);
	$smarty->assign("productName", $dataProduct['productName']);
	$smarty->assign("categoryID", $dataProduct['categoryID']);
	$smarty->assign("subCategoryID", $dataProduct['subCategoryID']);
	$smarty->assign("supplierID", $dataProduct['supplierID']);
	$smarty->assign("brandID", $dataProduct['brandID']);
	$smarty->assign("weight", $dataProduct['weight']);
	$smarty->assign("ukuran", $dataProduct['ukuran']);
	// $smarty->assign("volume", $dataProduct['volume']);
	// $smarty->assign("alcohol", $dataProduct['alcohol']);
	$smarty->assign("vintage", $dataProduct['vintage']);
	$smarty->assign("country", $dataProduct['country']);
	$smarty->assign("qty", $dataProduct['qty']);
	$smarty->assign("requirementQty", $dataProduct['requirementQty']);
	$smarty->assign("salePriceManagement", $dataProduct['salePriceManagement']);
	$smarty->assign("point", $dataProduct['point']);
	$smarty->assign("point2", $dataProduct['point2']);
	$smarty->assign("buyPrice", $dataProduct['buyPrice']);
	$smarty->assign("salePrice", $dataProduct['salePrice']);
	$smarty->assign("image1", $dataProduct['image1']);
	$smarty->assign("image2", $dataProduct['image2']);
	$smarty->assign("image3", $dataProduct['image3']);
	$smarty->assign("image4", $dataProduct['image4']);
	$smarty->assign("image5", $dataProduct['image5']);
	$smarty->assign("image6", $dataProduct['image6']);
	$smarty->assign("discountPrice", $dataProduct['discountPrice']);
	$smarty->assign("status", $dataProduct['status']);
	$smarty->assign("description", $dataProduct['description']);
	
	// showing up the categories
	$queryCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	
	while ($dtCategory = mysqli_fetch_array($sqlCategory))
	{
		$dataCategory[] = array('categoryID' => $dtCategory['categoryID'],
								'categoryName' => $dtCategory['categoryName']);
	}
	
	$smarty->assign("dataCategory", $dataCategory);
	
	// showing up the brand
	$queryBrand = "SELECT * FROM as_brands WHERE status = 'Y' ORDER BY brandName ASC";
	$sqlBrand = mysqli_query($connect, $queryBrand);
	
	while ($dtBrand = mysqli_fetch_array($sqlBrand))
	{
		$dataBrand[] = array(	'brandID' => $dtBrand['brandID'],
								'brandName' => $dtBrand['brandName']);
	}

	$smarty->assign("dataBrand", $dataBrand);
	
	// showing up the sub categories
	$querySubCategory = "SELECT * FROM as_sub_categories WHERE status = 'Y' AND categoryID = '$dataProduct[categoryID]'";
	$sqlSubCategory = mysqli_query($connect, $querySubCategory);
	while ($dtSubCategory = mysqli_fetch_array($sqlSubCategory))
	{
		$dataSubCategory[] = array(	'subCategoryID' => $dtSubCategory['subCategoryID'],
									'subCategoryName' => $dtSubCategory['subCategoryName']);
	}
	
	$smarty->assign("dataSubCategory", $dataSubCategory);
	
	// showing up the supplier
	$querySupplier = "SELECT * FROM as_suppliers WHERE status = 'Y' ORDER BY supplierName ASC";
	$sqlSupplier = mysqli_query($connect, $querySupplier);
	while ($dtSupplier = mysqli_fetch_array($sqlSupplier))
	{
		$dataSupplier[] = array(	'supplierID' => $dtSupplier['supplierID'],
									'supplierName' => $dtSupplier['supplierName']);
	}
	$smarty->assign("dataSupplier", $dataSupplier);
	
	$smarty->assign("metaTitle", "Edit Produk");
}

// if mod is product and act is update
elseif ($module == 'product' && $act == 'update')
{
	$productID = $_POST['productID'];
	$productName = mysqli_real_escape_string($connect, $_POST['productName']);
	$productSeo = seo_title($productName);
	$categoryID = $_POST['categoryID'];
	$subCategoryID = $_POST['subCategoryID'];
	$supplierID = $_POST['supplierID'];
	$brandID = $_POST['brandID'];
	$weight = $_POST['weight'];
	$ukuran = mysqli_real_escape_string($connect, $_POST['ukuran']);
	// $volume = mysqli_real_escape_string($connect, $_POST['volume']);
	// $alcohol = mysqli_real_escape_string($connect, $_POST['alcohol']);
	$vintage = mysqli_real_escape_string($connect, $_POST['vintage']);
	$country = mysqli_real_escape_string($connect, $_POST['country']);
	$qty = $_POST['qty'];
	$requirementQty = $_POST['requirementQty'];
	$salePriceManagement = $_POST['salePriceManagement'];
	$point = $_POST['point'];
	$point2 = $_POST['point2'];
	$buyPrice = $_POST['buyPrice'];
	$salePrice = $_POST['salePrice'];
	$discountPrice = $_POST['discountPrice'];
	$oldfile1 = $_POST['oldfile1'];
	$oldfile2 = $_POST['oldfile2'];
	$oldfile3 = $_POST['oldfile3'];
	$oldfile4 = $_POST['oldfile4'];
	$oldfile5 = $_POST['oldfile5'];
	$oldfile6 = $_POST['oldfile6'];
	$filename1 = $_POST['filename1'];
	$filename2 = $_POST['filename2'];
	$filename3 = $_POST['filename3'];
	$filename4 = $_POST['filename4'];
	$filename5 = $_POST['filename5'];
	$filename6 = $_POST['filename6'];
	$status = $_POST['status'];
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$modifiedDate = date('Y-m-d H:i:s');
	
	// save into the database
	if ($filename1 != "")
	{
		$file1 = $filename1;
		
		unlink("../images/products/".$oldfile1);
		unlink("../images/products/thumb/small_".$oldfile1);
		
		$file = "../images/products/".$filename1;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename1);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	else
	{
		$file1 = $oldfile1;
	}
	
	if ($filename2 != "")
	{
		$file2 = $filename2;
		unlink("../images/products/".$oldfile2);
		unlink("../images/products/thumb/small_".$oldfile2);
		
		$file = "../images/products/".$filename2;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename2);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	else
	{
		$file2 = $oldfile2;
	}
	
	if ($filename3 != "")
	{
		$file3 = $filename3;
		unlink("../images/products/".$oldfile3);
		unlink("../images/products/thumb/small_".$oldfile3);
		
		$file = "../images/products/".$filename3;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename3);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	else
	{
		$file3 = $oldfile3;
	}
	
	if ($filename4 != "")
	{
		$file4 = $filename4;
		unlink("../images/products/".$oldfile4);
		unlink("../images/products/thumb/small_".$oldfile4);
		
		$file = "../images/products/".$filename4;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename4);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	else
	{
		$file4 = $oldfile4;
	}
	
	if ($filename5 != "")
	{
		$file5 = $filename5;
		unlink("../images/products/".$oldfile5);
		unlink("../images/products/thumb/small_".$oldfile5);
		
		$file = "../images/products/".$filename5;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename5);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	else
	{
		$file5 = $oldfile5;
	}
	
	if ($filename6 != "")
	{
		$file6 = $filename6;
		unlink("../images/products/".$oldfile6);
		unlink("../images/products/thumb/small_".$oldfile6);
		
		$file = "../images/products/".$filename6;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 150;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/products/thumb/small_".$filename6);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	else
	{
		$file6 = $oldfile6;
	}
	
	$queryProduct = "UPDATE as_products SET productName = '$productName',
											productSeo = '$productSeo',
											categoryID = '$categoryID',
											subCategoryID = '$subCategoryID',
											supplierID = '$supplierID',
											brandID = '$brandID',
											weight = '$weight',
											ukuran = '$ukuran',
											-- volume = '$volume',
											-- alcohol = '$alcohol',
											vintage = '$vintage',
											country = '$country',
											qty = '$qty',
											requirementQty = '$requirementQty',
											salePriceManagement = '$salePriceManagement',
											point = '$point',
											point2 = '$point2',
											buyPrice = '$buyPrice',
											salePrice = '$salePrice',
											image1 = '$file1',
											image2 = '$file2',
											image3 = '$file3',
											image4 = '$file4',
											image5 = '$file5',
											image6 = '$file6',
											discountPrice = '$discountPrice',
											status = '$status',
											description = '$description',
											modifiedDate = '$modifiedDate',
											modifiedUserID = '$sessUserID'
											WHERE productID = '$productID'";
	mysqli_query($connect, $queryProduct);
	
	$_SESSION['sessProduct'] = 2;
	
	header("Location: products.php");
}

// if mod is product and act is delete
elseif ($module == 'product' && $act == 'delete')
{
	$productID = $_GET['productID'];
	$file1 = $_GET['file1'];
	$file2 = $_GET['file2'];
	$file3 = $_GET['file3'];
	$file4 = $_GET['file4'];
	$file5 = $_GET['file5'];
	$file6 = $_GET['file6']; 
	
	unlink("../images/products/".$file1);
	unlink("../images/products/".$file2);
	unlink("../images/products/".$file3);
	unlink("../images/products/".$file4);
	unlink("../images/products/".$file5);
	unlink("../images/products/".$file6);
	unlink("../images/products/thumb/small_".$file1);
	unlink("../images/products/thumb/small_".$file2);
	unlink("../images/products/thumb/small_".$file3);
	unlink("../images/products/thumb/small_".$file4);
	unlink("../images/products/thumb/small_".$file5);
	unlink("../images/products/thumb/small_".$file6);
	
	$queryProduct = "DELETE FROM as_products WHERE productID = '$productID'";
	mysqli_query($connect, $queryProduct);
	
	$_SESSION['sessProduct'] = 3;
	
	header("Location: products.php");
}

// if mod is product and act is search
elseif ($module == 'product' && $act == 'search')
{
	$categoryID = $_GET['categoryID'];
	$subCategoryID = $_GET['subCategoryID'];
	$brandID = $_GET['brandID'];
	$q = $_GET['q'];
	
	$smarty->assign("categoryID", $categoryID);
	$smarty->assign("subCategoryID", $subCategoryID);
	$smarty->assign("brandID", $brandID);
	$smarty->assign("q", $q);
	
	// showing up the category search
	$querySearchCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlSearchCategory = mysqli_query($connect, $querySearchCategory);
	while ($dtSearchCategory = mysqli_fetch_array($sqlSearchCategory))
	{
		$dataSearchCategory[] = array(	'categoryID' => $dtSearchCategory['categoryID'],
										'categoryName' => $dtSearchCategory['categoryName']);
	}
	
	$smarty->assign("dataSearchCategory", $dataSearchCategory);
	
	// showing up the brand
	$queryBrand = "SELECT * FROM as_brands WHERE status = 'Y' ORDER BY brandName ASC";
	$sqlBrand = mysqli_query($connect, $queryBrand);
	
	while ($dtBrand = mysqli_fetch_array($sqlBrand))
	{
		$dataBrand[] = array(	'brandID' => $dtBrand['brandID'],
								'brandName' => $dtBrand['brandName']);
	}
	
	$smarty->assign("dataBrand", $dataBrand);
	
	// showing up the sub categories
	$querySubCategory = "SELECT * FROM as_sub_categories WHERE status = 'Y' AND categoryID = '$categoryID' ORDER BY subCategoryName ASC";
	$sqlSubCategory = mysqli_query($connect, $querySubCategory);
	while ($dtSubCategory = mysqli_fetch_array($sqlSubCategory))
	{
		$dataSubCategory[] = array(	'subCategoryID' => $dtSubCategory['subCategoryID'],
									'subCategoryName' => $dtSubCategory['subCategoryName']);
	}
	
	$smarty->assign("dataSubCategory", $dataSubCategory);
	
	// showing up the products search
	$p = new PagingProductSearch;
	// limit hanya 12 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the product
	if ($categoryID == '*')
	{
		if ($brandID == '*')
		{
			$queryProduct = "SELECT * FROM as_products WHERE productName LIKE '%$q%' OR productCode LIKE '%$q%' ORDER BY productName ASC LIMIT $posisi,$batas";
			$queryJmlData = "SELECT * FROM as_products WHERE productName LIKE '%$q%' OR productCode LIKE '%$q%'";
		}
		else
		{
			$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%' ORDER BY productName ASC LIMIT $posisi,$batas";
			$queryJmlData = "SELECT * FROM as_products WHERE brandID = '$brandID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%'";
		}
	}
	else
	{
		if ($subCategoryID == '*')
		{
			if ($brandID == '*')
			{
				$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%' ORDER BY productName ASC LIMIT $posisi,$batas";
				$queryJmlData = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%'";
			}
			else
			{
				$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND brandID = '$brandID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%' ORDER BY productName ASC LIMIT $posisi,$batas";
				$queryJmlData = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND brandID = '$brandID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%'";
			}
		}
		else
		{
			if ($brandID == '*')
			{
				$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND subCategoryID = '$subCategoryID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%' ORDER BY productName ASC LIMIT $posisi,$batas";
				$queryJmlData = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND subCategoryID = '$subCategoryID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%'";
			}
			else
			{
				$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND subCategoryID = '$subCategoryID' AND brandID = '$brandID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%' ORDER BY productName ASC LIMIT $posisi,$batas";
				$queryJmlData = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND subCategoryID = '$subCategoryID' AND brandID = '$brandID' AND productName LIKE '%$q%' OR productCode LIKE '%$q%'";
			}
		}
	}
	
	
	$sqlProduct = mysqli_query($connect, $queryProduct);
	
	$i = 1 + $posisi;
	while ($dtProduct = mysqli_fetch_array($sqlProduct))
	{
		if ($dtProduct['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		if ($dtProduct['salePriceManagement'] == '1')
		{
			$salePriceManagement = "Normal";
		}
		elseif ($dtProduct['salePriceManagement'] == '2')
		{
			$salePriceManagement = "Tambah";
		}
		elseif ($dtProduct['salePriceManagement'] == '3')
		{
			$salePriceManagement = "Persen";
		}
		else
		{
			$salePriceManagemet = "-";
		}
		
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productCode' => $dtProduct['productCode'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'buyPrice' => format_rupiah($dtProduct['buyPrice']),
								'salePrice' => format_rupiah($dtProduct['salePrice']),
								'resellerPrice' => format_rupiah($dtProduct['resellerPrice']),
								'discountPrice' => format_rupiah($dtProduct['discountPrice']),
								'salePriceManagement' => $salePriceManagement,
								'status' => $status,
								'stock' => format_rupiah($dtProduct['qty']),
								'requirementQty' => format_rupiah($dtProduct['requirementQty']),
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6'],
								'weight' => $dtProduct['weight'],
								'ukuran' => $dtProduct['ukuran'],
								// 'volume' => $dtProduct['volume'],
								// 'alcohol' => $dtProduct['alcohol'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataProduct", $dataProduct);
	
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProduct", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Pencarian Produk");
}

else
{
	$smarty->assign("msg", $_SESSION['sessProduct']);
	$_SESSION['sessProduct'] = "";
	
	// showing up the category search
	$querySearchCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlSearchCategory = mysqli_query($connect, $querySearchCategory);
	while ($dtSearchCategory = mysqli_fetch_array($sqlSearchCategory))
	{
		$dataSearchCategory[] = array(	'categoryID' => $dtSearchCategory['categoryID'],
										'categoryName' => $dtSearchCategory['categoryName']);
	}
	
	$smarty->assign("dataSearchCategory", $dataSearchCategory);
	
	// showing up the brand
	$queryBrand = "SELECT * FROM as_brands WHERE status = 'Y' ORDER BY brandName ASC";
	$sqlBrand = mysqli_query($connect, $queryBrand);
	
	while ($dtBrand = mysqli_fetch_array($sqlBrand))
	{
		$dataBrand[] = array(	'brandID' => $dtBrand['brandID'],
								'brandName' => $dtBrand['brandName']);
	}
	
	$smarty->assign("dataBrand", $dataBrand);
	
	// showing up the products
	$p = new PagingProduct;
	// limit hanya 12 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the product
	$queryProduct = "SELECT * FROM as_products ORDER BY productName ASC LIMIT $posisi,$batas";
	$sqlProduct = mysqli_query($connect, $queryProduct);
	
	$i = 1 + $posisi;
	while ($dtProduct = mysqli_fetch_array($sqlProduct))
	{
		if ($dtProduct['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$queryCategory = "SELECT categoryName FROM as_categories WHERE categoryID = '$dtProduct[categoryID]'";
		$sqlCategory = mysqli_query($connect, $queryCategory);
		$dataCategory = mysqli_fetch_array($sqlCategory);
		
		// get the sub category
		$querySubCategory = "SELECT subCategoryName FROM as_sub_categories WHERE subCategoryID = '$dtProduct[subCategoryID]'";
		$sqlSubCategory = mysqli_query($connect, $querySubCategory);
		$dataSubCategory = mysqli_fetch_array($sqlSubCategory);
		
		if ($dtProduct['salePriceManagement'] == '1')
		{
			$salePriceManagement = "Normal";
		}
		elseif ($dtProduct['salePriceManagement'] == '2')
		{
			$salePriceManagement = "Tambah";
		}
		elseif ($dtProduct['salePriceManagement'] == '3')
		{
			$salePriceManagement = "Persen";
		}
		else
		{
			$salePriceManagemet = "-";
		}
		
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productCode' => $dtProduct['productCode'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'categoryName' => $dataCategory['categoryName']." > ".$dataSubCategory['subCategoryName'],
								'buyPrice' => format_rupiah($dtProduct['buyPrice']),
								'salePrice' => format_rupiah($dtProduct['salePrice']),
								'resellerPrice' => format_rupiah($dtProduct['resellerPrice']),
								'salePriceManagement' => $salePriceManagement,
								'discountPrice' => format_rupiah($dtProduct['discountPrice']),
								'status' => $status,
								'stock' => format_rupiah($dtProduct['qty']),
								'requirementQty' => format_rupiah($dtProduct['requirementQty']),
								'weight' => $dtProduct['weight'],
								'ukuran' => $dtProduct['ukuran'],
								// 'volume' => $dtProduct['volume'],
								// 'alcohol' => $dtProduct['alcohol'], 
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataProduct", $dataProduct);
	
	$queryJmlData = "SELECT * FROM as_products";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProduct", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Produk");
	
	$smarty->assign("msg", $_GET['msg']);
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
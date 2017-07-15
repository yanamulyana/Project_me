<?php
include "header.php";
$page = "products.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

// if mod is product and act is category
if ($module == 'product' && $act == 'category')
{
	$sort = mysqli_real_escape_string($connect, $_GET['sort']);
	$smarty->assign("sort", $sort);
	
	$t = str_replace(" ", "+", $_GET['title']);
	
	$smarty->assign("titleSeo", $t);
	
	$categoryID = mysqli_real_escape_string($connect, $_GET['categoryID']);
	
	// showing up the product category
	$p = new PagingProductCategory;
	// limit hanya 12 per halaman
	$batas  = 25;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the product based on categories
	// default
	if ($sort == '0')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY field(createdDate, qty) DESC, productName ASC LIMIT $posisi,$batas";
	}
	// name A-Z
	elseif ($sort == '1')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY productName ASC LIMIT $posisi,$batas";
	}
	// name Z-A
	elseif ($sort == '2')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY productName DESC LIMIT $posisi,$batas";
	}
	// price low - high
	elseif ($sort == '3')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY discountPrice, salePrice ASC LIMIT $posisi,$batas";
	}
	// price high to low
	elseif ($sort == '4')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY salePrice DESC LIMIT $posisi,$batas";
	}
	
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$i = 0;
	$kolom = 3;
	while($dtProduct = mysqli_fetch_array($sqlProduct))
	{
		if ($i >= $kolom){
			$i = 0;
		}
		$i++;
		
		if ($dtProduct['salePriceManagement'] == '1')
		{
			$salePrice = $dtProduct['salePrice'];
			$discountPrice = $dtProduct['discountPrice'];
		}
	
		elseif ($dtProduct['salePriceManagement'] == '2')
		{
			$addSalePrice = $dtProduct['buyPrice'] + $dtProduct['salePrice'];
			$addDiscountPrice = $dtProduct['buyPrice'] + $dtProduct['discountPrice'];
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		elseif ($dtProduct['salePriceManagement'] == '3')
		{
			$buyPrice = pembulatan($dtProduct['buyPrice']);
				
			$addSalePrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['salePrice']/100));
			$addDiscountPrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['discountPrice']/100));
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		else
		{
			$salePrice = 0;
			$discountPrice = 0;
		}
		
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'salePrice' => $salePrice,
								'discountPrice' => $discountPrice,
								'buyPrice' => $dtProduct['buyPrice'],
								'salePriceRp' => format_rupiah($salePrice),
								'discountPriceRp' => format_rupiah($discountPrice),
								'description' => strip_tags(substr($dtProduct['description'], 0,80)),
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6'],
								'qty' => $dtProduct['qty'],
								'i' => $i);
	}
	
	$smarty->assign("dataProduct", $dataProduct);
	
	$queryJmlData = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProducts", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	$smarty->assign("page", $_GET['page']);
	
	// get the category name
	$queryCategory = "SELECT categoryName, categorySeo FROM as_categories WHERE categoryID = '$categoryID'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	$smarty->assign("categoryName", $dataCategory['categoryName']);
	$smarty->assign("categoryID", $categoryID);
	$smarty->assign("categorySeo", $dataCategory['categorySeo']);
	
	$smarty->assign("metaTitle", $dataCategory['categoryName']);
	
	// showing up the new product
	$queryNewProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY createdDate DESC LIMIT 5";
	$sqlNewProduct = mysqli_query($connect, $queryNewProduct);
	
	while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
	{
		$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
									'productName' => $dtNewProduct['productName'],
									'productSeo' => $dtNewProduct['productSeo'],
									'salePrice' => format_rupiah($dtNewProduct['salePrice']),
									'discountPrice' => format_rupiah($dtNewProduct['discountPrice']),
									'image1' => $dtNewProduct['image1']);
	}
	
	$smarty->assign("dataNewProduct", $dataNewProduct);
	
	// Show up the category list
	$queryListCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlListCategory = mysqli_query($connect, $queryListCategory);
	$i = 1;
	while ($dtListCategory = mysqli_fetch_array($sqlListCategory))
	{
		$queryJmlCat = "SELECT productID FROM as_products WHERE categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
		$sqlJmlCat = mysqli_query($connect, $queryJmlCat);
		$numsJmlCat = mysqli_num_rows($sqlJmlCat);
			
		$queryListSub = "SELECT * FROM as_sub_categories WHERE status = 'Y' AND categoryID = '$dtListCategory[categoryID]' ORDER BY subCategoryName ASC";
		$sqlListSub = mysqli_query($connect, $queryListSub);
		$numsListSub = mysqli_num_rows($sqlListSub);
		$dataListSub = array();
		while ($dtListSub = mysqli_fetch_array($sqlListSub))
		{
			$queryJml = "SELECT productID FROM as_products WHERE subCategoryID = '$dtListSub[subCategoryID]' AND categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
			$sqlJml = mysqli_query($connect, $queryJml);
			$numsJml = mysqli_num_rows($sqlJml);
			
			$dataListSub[] = array(	'subCategoryID' => $dtListSub['subCategoryID'],
									'subCategoryName' => $dtListSub['subCategoryName'],
									'subCategorySeo' => $dtListSub['subCategorySeo'],
									'numsJml' => $numsJml);
		}
		
		$dataListCategory[] = array('categoryID' => $dtListCategory['categoryID'],
									'categoryName' => $dtListCategory['categoryName'],
									'categorySeo' => $dtListCategory['categorySeo'],
									'dataListSub' => $dataListSub,
									'numsListSub' => $numsListSub,
									'numsJmlCat' => $numsJmlCat,
									'i' => $i);
		$i++;
	}
	
	$smarty->assign("dataListCategory", $dataListCategory);
	
	$smarty->assign("popup", $_SESSION['sessPopUp']);
	$smarty->assign("referer", $_SESSION['referer']);
	$_SESSION['sessPopUp'] = "";
}

// if mod is product and act is categorylist
elseif ($module == 'product' && $act == 'categorylist')
{
	$sort = mysqli_real_escape_string($connect, $_GET['sort']);
	$smarty->assign("sort", $sort);
	
	$t = str_replace(" ", "+", $_GET['title']);
	
	$smarty->assign("titleSeo", $t);
	
	$categoryID = mysqli_real_escape_string($connect, $_GET['categoryID']);
	
	// showing up the product category list
	$p = new PagingProductCategoryList;
	// limit hanya 12 per halaman
	$batas  = 25;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the product based on categories
	// default
	if ($sort == '0')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY field(createdDate, qty) DESC, productName ASC LIMIT $posisi,$batas";
	}
	// name A-Z
	elseif ($sort == '1')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY productName ASC LIMIT $posisi,$batas";
	}
	// name Z-A
	elseif ($sort == '2')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY productName DESC LIMIT $posisi,$batas";
	}
	// price low - high
	elseif ($sort == '3')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY discountPrice, salePrice ASC LIMIT $posisi,$batas";
	}
	// price high to low
	elseif ($sort == '4')
	{
		$queryProduct = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y' ORDER BY salePrice DESC LIMIT $posisi,$batas";
	}
	
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$i = 0;
	$kolom = 3;
	while($dtProduct = mysqli_fetch_array($sqlProduct))
	{
		if ($i >= $kolom){
			$i = 0;
		}
		$i++;
		
		if ($dtProduct['salePriceManagement'] == '1')
		{
			$salePrice = $dtProduct['salePrice'];
			$discountPrice = $dtProduct['discountPrice'];
		}
	
		elseif ($dtProduct['salePriceManagement'] == '2')
		{
			$addSalePrice = $dtProduct['buyPrice'] + $dtProduct['salePrice'];
			$addDiscountPrice = $dtProduct['buyPrice'] + $dtProduct['discountPrice'];
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		elseif ($dtProduct['salePriceManagement'] == '3')
		{
			$buyPrice = pembulatan($dtProduct['buyPrice']);
				
			$addSalePrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['salePrice']/100));
			$addDiscountPrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['discountPrice']/100));
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		else
		{
			$salePrice = 0;
			$discountPrice = 0;
		}
		
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'salePrice' => $salePrice,
								'discountPrice' => $discountPrice,
								'buyPrice' => $dtProduct['buyPrice'],
								'salePriceRp' => format_rupiah($salePrice),
								'discountPriceRp' => format_rupiah($discountPrice),
								'description' => strip_tags(substr($dtProduct['description'], 0,80)),
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6'],
								'qty' => $dtProduct['qty'],
								'i' => $i);
	}
	
	$smarty->assign("dataProduct", $dataProduct);
	
	$queryJmlData = "SELECT * FROM as_products WHERE categoryID = '$categoryID' AND status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProducts", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	$smarty->assign("page", $_GET['page']);
	
	// get the category name
	$queryCategory = "SELECT categoryName, categorySeo FROM as_categories WHERE categoryID = '$categoryID'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	$smarty->assign("categoryName", $dataCategory['categoryName']);
	$smarty->assign("categoryID", $categoryID);
	$smarty->assign("categorySeo", $dataCategory['categorySeo']);
	
	$smarty->assign("metaTitle", $dataCategory['categoryName']);
	
	// showing up the new product
	$queryNewProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY createdDate DESC LIMIT 5";
	$sqlNewProduct = mysqli_query($connect, $queryNewProduct);
	
	while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
	{
		$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
									'productName' => $dtNewProduct['productName'],
									'productSeo' => $dtNewProduct['productSeo'],
									'salePrice' => format_rupiah($dtNewProduct['salePrice']),
									'discountPrice' => format_rupiah($dtNewProduct['discountPrice']),
									'image1' => $dtNewProduct['image1']);
	}
	
	$smarty->assign("dataNewProduct", $dataNewProduct);
	
	// Show up the category list
	$queryListCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlListCategory = mysqli_query($connect, $queryListCategory);
	$i = 1;
	while ($dtListCategory = mysqli_fetch_array($sqlListCategory))
	{
		$queryJmlCat = "SELECT productID FROM as_products WHERE categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
		$sqlJmlCat = mysqli_query($connect, $queryJmlCat);
		$numsJmlCat = mysqli_num_rows($sqlJmlCat);
			
		$queryListSub = "SELECT * FROM as_sub_categories WHERE status = 'Y' AND categoryID = '$dtListCategory[categoryID]' ORDER BY subCategoryName ASC";
		$sqlListSub = mysqli_query($connect, $queryListSub);
		$numsListSub = mysqli_num_rows($sqlListSub);
		$dataListSub = array();
		while ($dtListSub = mysqli_fetch_array($sqlListSub))
		{
			$queryJml = "SELECT productID FROM as_products WHERE subCategoryID = '$dtListSub[subCategoryID]' AND categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
			$sqlJml = mysqli_query($connect, $queryJml);
			$numsJml = mysqli_num_rows($sqlJml);
			
			$dataListSub[] = array(	'subCategoryID' => $dtListSub['subCategoryID'],
									'subCategoryName' => $dtListSub['subCategoryName'],
									'subCategorySeo' => $dtListSub['subCategorySeo'],
									'numsJml' => $numsJml);
		}
		
		$dataListCategory[] = array('categoryID' => $dtListCategory['categoryID'],
									'categoryName' => $dtListCategory['categoryName'],
									'categorySeo' => $dtListCategory['categorySeo'],
									'dataListSub' => $dataListSub,
									'numsListSub' => $numsListSub,
									'numsJmlCat' => $numsJmlCat,
									'i' => $i);
		$i++;
	}
	
	$smarty->assign("dataListCategory", $dataListCategory);
	
	$smarty->assign("popup", $_SESSION['sessPopUp']);
	$smarty->assign("referer", $_SESSION['referer']);
	$_SESSION['sessPopUp'] = "";
}

// if mod is product and act is subcategory
elseif ($module == 'product' && $act == 'subcategory')
{
	$sort = mysqli_real_escape_string($connect, $_GET['sort']);
	$smarty->assign("sort", $sort);
	$t = str_replace(" ", "+", $_GET['title']);
	
	$smarty->assign("titleSeo", $t);
	
	$subCategoryID = mysqli_real_escape_string($connect, $_GET['subCategoryID']);
	
	// showing up the product sub category
	$p = new PagingProductSubCategory;
	// limit hanya 12 per halaman
	$batas  = 25;
	$posisi = $p->cariPosisi($batas);
	// showing up the product based on sub category
	// default
	if ($sort == '0')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY field(createdDate, qty) DESC, productName ASC LIMIT $posisi,$batas";
	}
	// name A-Z
	elseif ($sort == '1')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY productName ASC LIMIT $posisi,$batas";
	}
	// name Z-A
	elseif ($sort == '2')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY productName DESC LIMIT $posisi,$batas";
	}
	// price low - high
	elseif ($sort == '3')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY discountPrice, salePrice ASC LIMIT $posisi,$batas";
	}
	// price high to low
	elseif ($sort == '4')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY salePrice DESC LIMIT $posisi,$batas";
	}
	
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$i = 0;
	$kolom = 3;
	while($dtProduct = mysqli_fetch_array($sqlProduct))
	{
		
		if ($i >= $kolom){
			$i = 0;
		}
		$i++;
		
		if ($dtProduct['salePriceManagement'] == '1')
		{
			$salePrice = $dtProduct['salePrice'];
			$discountPrice = $dtProduct['discountPrice'];
		}
	
		elseif ($dtProduct['salePriceManagement'] == '2')
		{
			$addSalePrice = $dtProduct['buyPrice'] + $dtProduct['salePrice'];
			$addDiscountPrice = $dtProduct['buyPrice'] + $dtProduct['discountPrice'];
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		elseif ($dtProduct['salePriceManagement'] == '3')
		{
			$buyPrice = pembulatan($dtProduct['buyPrice']);
				
			$addSalePrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['salePrice']/100));
			$addDiscountPrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['discountPrice']/100));
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		else
		{
			$salePrice = 0;
			$discountPrice = 0;
		}
		
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'salePrice' => $salePrice,
								'discountPrice' => $discountPrice,
								'buyPrice' => $dtProduct['buyPrice'],
								'salePriceRp' => format_rupiah($salePrice),
								'discountPriceRp' => format_rupiah($discountPrice),
								'description' => strip_tags(substr($dtProduct['description'], 0,80)),
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6'],
								'qty' => $dtProduct['qty'],
								'i' => $i);
	}
	
	$smarty->assign("dataProduct", $dataProduct);
	
	$queryJmlData = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProducts", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	$smarty->assign("page", $_GET['page']);
	
	// get the sub category name
	$querySub = "SELECT subCategoryID, subCategoryName, categoryID, subCategorySeo FROM as_sub_categories WHERE subCategoryID = '$subCategoryID'";
	$sqlSub = mysqli_query($connect, $querySub);
	$dataSub = mysqli_fetch_array($sqlSub);
	
	// get the category name
	$queryCategory = "SELECT categoryName, categorySeo, categoryID FROM as_categories WHERE categoryID = '$dataSub[categoryID]'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	$smarty->assign("categoryName", $dataCategory['categoryName']);
	$smarty->assign("subCategoryName", $dataSub['subCategoryName']);
	$smarty->assign("subCategoryID", $dataSub['subCategoryID']);
	$smarty->assign("categoryID", $dataCategory['categoryID']);
	$smarty->assign("categorySeo", $dataCategory['categorySeo']);
	$smarty->assign("subCategorySeo", $dataSub['subCategorySeo']);
	
	$smarty->assign("metaTitle", $dataCategory['categoryName']." &raquo; ".$dataSub['subCategoryName']);
	
	// Show up the category list
	$queryListCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlListCategory = mysqli_query($connect, $queryListCategory);
	$i = 1;
	while ($dtListCategory = mysqli_fetch_array($sqlListCategory))
	{
		$queryJmlCat = "SELECT productID FROM as_products WHERE categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
		$sqlJmlCat = mysqli_query($connect, $queryJmlCat);
		$numsJmlCat = mysqli_num_rows($sqlJmlCat);
			
		$queryListSub = "SELECT * FROM as_sub_categories WHERE status = 'Y' AND categoryID = '$dtListCategory[categoryID]' ORDER BY subCategoryName ASC";
		$sqlListSub = mysqli_query($connect, $queryListSub);
		$numsListSub = mysqli_num_rows($sqlListSub);
		$dataListSub = array();
		while ($dtListSub = mysqli_fetch_array($sqlListSub))
		{
			$queryJml = "SELECT productID FROM as_products WHERE subCategoryID = '$dtListSub[subCategoryID]' AND categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
			$sqlJml = mysqli_query($connect, $queryJml);
			$numsJml = mysqli_num_rows($sqlJml);
			
			$dataListSub[] = array(	'subCategoryID' => $dtListSub['subCategoryID'],
									'subCategoryName' => $dtListSub['subCategoryName'],
									'subCategorySeo' => $dtListSub['subCategorySeo'],
									'numsJml' => $numsJml);
		}
		
		$dataListCategory[] = array('categoryID' => $dtListCategory['categoryID'],
									'categoryName' => $dtListCategory['categoryName'],
									'categorySeo' => $dtListCategory['categorySeo'],
									'dataListSub' => $dataListSub,
									'numsListSub' => $numsListSub,
									'numsJmlCat' => $numsJmlCat,
									'i' => $i);
		$i++;
	}
	
	$smarty->assign("dataListCategory", $dataListCategory);
	
	$smarty->assign("popup", $_SESSION['sessPopUp']);
	$smarty->assign("referer", $_SESSION['referer']);
	$_SESSION['sessPopUp'] = "";
}

// if mod is product and act is subcategory list
elseif ($module == 'product' && $act == 'subcategorylist')
{
	$sort = mysqli_real_escape_string($connect, $_GET['sort']);
	$smarty->assign("sort", $sort);
	$t = str_replace(" ", "+", $_GET['title']);
	
	$smarty->assign("titleSeo", $t);
	
	$subCategoryID = mysqli_real_escape_string($connect, $_GET['subCategoryID']);
	
	// showing up the product sub category list
	$p = new PagingProductSubCategoryList;
	// limit hanya 12 per halaman
	$batas  = 25;
	$posisi = $p->cariPosisi($batas);
	// showing up the product based on sub category
	// default
	if ($sort == '0')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY field(createdDate, qty) DESC, productName ASC LIMIT $posisi,$batas";
	}
	// name A-Z
	elseif ($sort == '1')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY productName ASC LIMIT $posisi,$batas";
	}
	// name Z-A
	elseif ($sort == '2')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY productName DESC LIMIT $posisi,$batas";
	}
	// price low - high
	elseif ($sort == '3')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY discountPrice, salePrice ASC LIMIT $posisi,$batas";
	}
	// price high to low
	elseif ($sort == '4')
	{
		$queryProduct = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y' ORDER BY salePrice DESC LIMIT $posisi,$batas";
	}
	
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$i = 0;
	$kolom = 3;
	while($dtProduct = mysqli_fetch_array($sqlProduct))
	{
		
		if ($i >= $kolom){
			$i = 0;
		}
		$i++;
		
		if ($dtProduct['salePriceManagement'] == '1')
		{
			$salePrice = $dtProduct['salePrice'];
			$discountPrice = $dtProduct['discountPrice'];
		}
	
		elseif ($dtProduct['salePriceManagement'] == '2')
		{
			$addSalePrice = $dtProduct['buyPrice'] + $dtProduct['salePrice'];
			$addDiscountPrice = $dtProduct['buyPrice'] + $dtProduct['discountPrice'];
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		elseif ($dtProduct['salePriceManagement'] == '3')
		{
			$buyPrice = pembulatan($dtProduct['buyPrice']);
				
			$addSalePrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['salePrice']/100));
			$addDiscountPrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['discountPrice']/100));
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		else
		{
			$salePrice = 0;
			$discountPrice = 0;
		}
		
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'salePrice' => $salePrice,
								'discountPrice' => $discountPrice,
								'buyPrice' => $dtProduct['buyPrice'],
								'salePriceRp' => format_rupiah($salePrice),
								'discountPriceRp' => format_rupiah($discountPrice),
								'description' => strip_tags(substr($dtProduct['description'], 0,80)),
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6'],
								'qty' => $dtProduct['qty'],
								'i' => $i);
	}
	
	$smarty->assign("dataProduct", $dataProduct);
	
	$queryJmlData = "SELECT * FROM as_products WHERE subCategoryID = '$subCategoryID' AND status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProducts", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	$smarty->assign("page", $_GET['page']);
	
	// get the sub category name
	$querySub = "SELECT subCategoryID, subCategoryName, categoryID, subCategorySeo FROM as_sub_categories WHERE subCategoryID = '$subCategoryID'";
	$sqlSub = mysqli_query($connect, $querySub);
	$dataSub = mysqli_fetch_array($sqlSub);
	
	// get the category name
	$queryCategory = "SELECT categoryName, categorySeo, categoryID FROM as_categories WHERE categoryID = '$dataSub[categoryID]'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	$smarty->assign("categoryName", $dataCategory['categoryName']);
	$smarty->assign("subCategoryName", $dataSub['subCategoryName']);
	$smarty->assign("subCategoryID", $dataSub['subCategoryID']);
	$smarty->assign("categoryID", $dataCategory['categoryID']);
	$smarty->assign("categorySeo", $dataCategory['categorySeo']);
	$smarty->assign("subCategorySeo", $dataSub['subCategorySeo']);
	
	$smarty->assign("metaTitle", $dataCategory['categoryName']." &raquo; ".$dataSub['subCategoryName']);
	
	// Show up the category list
	$queryListCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlListCategory = mysqli_query($connect, $queryListCategory);
	$i = 1;
	while ($dtListCategory = mysqli_fetch_array($sqlListCategory))
	{
		$queryJmlCat = "SELECT productID FROM as_products WHERE categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
		$sqlJmlCat = mysqli_query($connect, $queryJmlCat);
		$numsJmlCat = mysqli_num_rows($sqlJmlCat);
			
		$queryListSub = "SELECT * FROM as_sub_categories WHERE status = 'Y' AND categoryID = '$dtListCategory[categoryID]' ORDER BY subCategoryName ASC";
		$sqlListSub = mysqli_query($connect, $queryListSub);
		$numsListSub = mysqli_num_rows($sqlListSub);
		$dataListSub = array();
		while ($dtListSub = mysqli_fetch_array($sqlListSub))
		{
			$queryJml = "SELECT productID FROM as_products WHERE subCategoryID = '$dtListSub[subCategoryID]' AND categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
			$sqlJml = mysqli_query($connect, $queryJml);
			$numsJml = mysqli_num_rows($sqlJml);
			
			$dataListSub[] = array(	'subCategoryID' => $dtListSub['subCategoryID'],
									'subCategoryName' => $dtListSub['subCategoryName'],
									'subCategorySeo' => $dtListSub['subCategorySeo'],
									'numsJml' => $numsJml);
		}
		
		$dataListCategory[] = array('categoryID' => $dtListCategory['categoryID'],
									'categoryName' => $dtListCategory['categoryName'],
									'categorySeo' => $dtListCategory['categorySeo'],
									'dataListSub' => $dataListSub,
									'numsListSub' => $numsListSub,
									'numsJmlCat' => $numsJmlCat,
									'i' => $i);
		$i++;
	}
	
	$smarty->assign("dataListCategory", $dataListCategory);
	
	$smarty->assign("popup", $_SESSION['sessPopUp']);
	$smarty->assign("referer", $_SESSION['referer']);
	$_SESSION['sessPopUp'] = "";
}

// if mod is product and act is brand
elseif ($module == 'product' && $act == 'brand')
{
	$sort = mysqli_real_escape_string($connect, $_GET['sort']);
	$smarty->assign("sort", $sort);
	
	$brandID = mysqli_real_escape_string($connect, $_GET['brandID']);
	
	// showing up the product brand
	$p = new PagingProductBrand;
	// limit hanya 12 per halaman
	$batas  = 16;
	$posisi = $p->cariPosisi($batas);
	// showing up the product based on brand
	// default
	if ($sort == '0')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY createdDate DESC LIMIT $posisi,$batas";
	}
	// name A-Z
	elseif ($sort == '1')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY productName ASC LIMIT $posisi,$batas";
	}
	// name Z-A
	elseif ($sort == '2')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY productName DESC LIMIT $posisi,$batas";
	}
	// price low - high
	elseif ($sort == '3')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY discountPrice, salePrice ASC LIMIT $posisi,$batas";
	}
	// price high to low
	elseif ($sort == '4')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY salePrice DESC LIMIT $posisi,$batas";
	}
	
	$sqlProduct = mysqli_query($connect, $queryProduct);
	
	while($dtProduct = mysqli_fetch_array($sqlProduct))
	{	
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'salePrice' => format_rupiah($dtProduct['salePrice']),
								'discountPrice' => format_rupiah($dtProduct['discountPrice']),
								'description' => strip_tags(substr($dtProduct['description'], 0,200)),
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6']);
	}
	
	$smarty->assign("dataProduct", $dataProduct);
	
	$queryJmlData = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProducts", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	// get the sub category name
	$querySub = "SELECT subCategoryID, subCategoryName, categoryID, subCategorySeo FROM as_sub_categories WHERE subCategoryID = '$subCategoryID'";
	$sqlSub = mysqli_query($connect, $querySub);
	$dataSub = mysqli_fetch_array($sqlSub);
	
	// get the category name
	$queryCategory = "SELECT categoryName, categorySeo, categoryID FROM as_categories WHERE categoryID = '$dataSub[categoryID]'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	// get the brand name
	$queryBrand = "SELECT brandID, brandName, brandSeo FROM as_brands WHERE brandID = '$brandID' AND status = 'Y'";
	$sqlBrand = mysqli_query($connect, $queryBrand);
	$dataBrand = mysqli_fetch_array($sqlBrand);
	
	$smarty->assign("brandID", $dataBrand['brandID']);
	$smarty->assign("brandName", $dataBrand['brandName']);
	$smarty->assign("brandSeo", $dataBrand['brandSeo']);
	$smarty->assign("categoryName", $dataCategory['categoryName']);
	$smarty->assign("subCategoryName", $dataSub['subCategoryName']);
	$smarty->assign("subCategoryID", $dataSub['subCategoryID']);
	$smarty->assign("categoryID", $dataCategory['categoryID']);
	$smarty->assign("categorySeo", $dataCategory['categorySeo']);
	$smarty->assign("subCategorySeo", $dataSub['subCategorySeo']);
	
	// showing up the new product
	$queryNewProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY createdDate DESC LIMIT 5";
	$sqlNewProduct = mysqli_query($connect, $queryNewProduct);
	
	while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
	{
		$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
									'productName' => $dtNewProduct['productName'],
									'productSeo' => $dtNewProduct['productSeo'],
									'salePrice' => format_rupiah($dtNewProduct['salePrice']),
									'discountPrice' => format_rupiah($dtNewProduct['discountPrice']),
									'image1' => $dtNewProduct['image1']);
	}
	
	$smarty->assign("dataNewProduct", $dataNewProduct);
	
	$smarty->assign("metaTitle", $dataBrand['brandName']);
}

// if mod is product and act is brandlist
elseif ($module == 'product' && $act == 'brandlist')
{
	$sort = mysqli_real_escape_string($connect, $_GET['sort']);
	$smarty->assign("sort", $sort);
	
	$brandID = mysqli_real_escape_string($connect, $_GET['brandID']);
	
	// showing up the product brand list
	$p = new PagingProductBrandList;
	// limit hanya 12 per halaman
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	// showing up the product based on brand
	// default
	if ($sort == '0')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY createdDate DESC LIMIT $posisi,$batas";
	}
	// name A-Z
	elseif ($sort == '1')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY productName ASC LIMIT $posisi,$batas";
	}
	// name Z-A
	elseif ($sort == '2')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY productName DESC LIMIT $posisi,$batas";
	}
	// price low - high
	elseif ($sort == '3')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY discountPrice, salePrice ASC LIMIT $posisi,$batas";
	}
	// price high to low
	elseif ($sort == '4')
	{
		$queryProduct = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y' ORDER BY salePrice DESC LIMIT $posisi,$batas";
	}
	
	$sqlProduct = mysqli_query($connect, $queryProduct);
	
	while($dtProduct = mysqli_fetch_array($sqlProduct))
	{	
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'salePrice' => format_rupiah($dtProduct['salePrice']),
								'discountPrice' => format_rupiah($dtProduct['discountPrice']),
								'description' => strip_tags(substr($dtProduct['description'], 0,400)),
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6']);
	}
	
	$smarty->assign("dataProduct", $dataProduct);
	
	$queryJmlData = "SELECT * FROM as_products WHERE brandID = '$brandID' AND status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProducts", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	// get the sub category name
	$querySub = "SELECT subCategoryID, subCategoryName, categoryID, subCategorySeo FROM as_sub_categories WHERE subCategoryID = '$subCategoryID'";
	$sqlSub = mysqli_query($connect, $querySub);
	$dataSub = mysqli_fetch_array($sqlSub);
	
	// get the category name
	$queryCategory = "SELECT categoryName, categorySeo, categoryID FROM as_categories WHERE categoryID = '$dataSub[categoryID]'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	// get the brand name
	$queryBrand = "SELECT brandID, brandName, brandSeo FROM as_brands WHERE brandID = '$brandID' AND status = 'Y'";
	$sqlBrand = mysqli_query($connect, $queryBrand);
	$dataBrand = mysqli_fetch_array($sqlBrand);
	
	$smarty->assign("brandID", $dataBrand['brandID']);
	$smarty->assign("brandName", $dataBrand['brandName']);
	$smarty->assign("brandSeo", $dataBrand['brandSeo']);
	$smarty->assign("categoryName", $dataCategory['categoryName']);
	$smarty->assign("subCategoryName", $dataSub['subCategoryName']);
	$smarty->assign("subCategoryID", $dataSub['subCategoryID']);
	$smarty->assign("categoryID", $dataCategory['categoryID']);
	$smarty->assign("categorySeo", $dataCategory['categorySeo']);
	$smarty->assign("subCategorySeo", $dataSub['subCategorySeo']);
	
	// showing up the new product
	$queryNewProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY createdDate DESC LIMIT 5";
	$sqlNewProduct = mysqli_query($connect, $queryNewProduct);
	
	while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
	{
		$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
									'productName' => $dtNewProduct['productName'],
									'productSeo' => $dtNewProduct['productSeo'],
									'salePrice' => format_rupiah($dtNewProduct['salePrice']),
									'discountPrice' => format_rupiah($dtNewProduct['discountPrice']),
									'image1' => $dtNewProduct['image1']);
	}
	
	$smarty->assign("dataNewProduct", $dataNewProduct);
	
	$smarty->assign("metaTitle", $dataBrand['brandName']);
}

// if mod is product and act is detail
elseif ($module == 'product' && $act == 'detail')
{
	$smarty->assign("msg", $_SESSION['sessCart']);
	$_SESSION['sessCart'] = "";
	
	$smarty->assign("msgEmail", $_SESSION['sessProductEmail']);
	$_SESSION['sessProductEmail'] = "";
	
	$productID = mysqli_real_escape_string($connect, $_GET['productID']);
	
	// showing up the product
	$queryProduct = "SELECT * FROM as_products WHERE status = 'Y' AND productID = '$productID'";
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$dataProduct = mysqli_fetch_array($sqlProduct);
	
	// get the category
	$queryCategory = "SELECT categoryName, categoryID, categorySeo FROM as_categories WHERE categoryID = '$dataProduct[categoryID]'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	// get the subcategory
	$querySub = "SELECT subCategoryName, subCategoryID, subCategorySeo FROM as_sub_categories WHERE subCategoryID = '$dataProduct[subCategoryID]'";
	$sqlSub = mysqli_query($connect, $querySub);
	$dataSub = mysqli_fetch_array($sqlSub);
	
	// get the brand
	$queryBrand = "SELECT brandName, brandID, brandSeo FROM as_brands WHERE brandID = '$dataProduct[brandID]'";
	$sqlBrand = mysqli_query($connect, $queryBrand);
	$dataBrand = mysqli_fetch_array($sqlBrand);
	
	if ($dataProduct['salePriceManagement'] == '1')
	{
		$salePrice = $dataProduct['salePrice'];
		$discountPrice = $dataProduct['discountPrice'];
	}

	elseif ($dataProduct['salePriceManagement'] == '2')
	{
		$addSalePrice = $dataProduct['buyPrice'] + $dataProduct['salePrice'];
		$addDiscountPrice = $dataProduct['buyPrice'] + $dataProduct['discountPrice'];
		
		$salePrice = pembulatan($addSalePrice);
		$discountPrice = pembulatan($addDiscountPrice);
	}
	
	elseif ($dataProduct['salePriceManagement'] == '3')
	{
		$buyPrice = pembulatan($dataProduct['buyPrice']);
			
		$addSalePrice = $dataProduct['buyPrice'] + ($buyPrice * ($dataProduct['salePrice']/100));
		$addDiscountPrice = $dataProduct['buyPrice'] + ($buyPrice * ($dataProduct['discountPrice']/100));
		
		$salePrice = pembulatan($addSalePrice);
		$discountPrice = pembulatan($addDiscountPrice);
	}
	
	else
	{
		$salePrice = 0;
		$discountPrice = 0;
	}
	
	$smarty->assign("productID", $dataProduct['productID']);
	$smarty->assign("productName", $dataProduct['productName']);
	$smarty->assign("productSeo", $dataProduct['productSeo']);
	$smarty->assign("categoryID", $dataCategory['categoryID']);
	$smarty->assign("categoryName", $dataCategory['categoryName']);
	$smarty->assign("categorySeo", $dataCategory['categorySeo']);
	$smarty->assign("subCategoryID", $dataSub['subCategoryID']);
	$smarty->assign("subCategoryName", $dataSub['subCategoryName']);
	$smarty->assign("subCategorySeo", $dataSub['subCategorySeo']);
	$smarty->assign("vintage", $dataProduct['vintage']);
	$smarty->assign("country", $dataProduct['country']);
	$smarty->assign("brandID", $dataBrand['brandID']);
	$smarty->assign("brandName", $dataBrand['brandName']);
	$smarty->assign("brandSeo", $dataBrand['brandSeo']);
	$smarty->assign("salePriceRp", format_rupiah($salePrice));
	$smarty->assign("discountPriceRp", format_rupiah($discountPrice));
	$smarty->assign("buyPrice", $dataProduct['buyPrice']);
	$smarty->assign("salePrice", $salePrice);
	$smarty->assign("discountPrice", $discountPrice);
	$smarty->assign("image1", $dataProduct['image1']);
	$smarty->assign("image2", $dataProduct['image2']);
	$smarty->assign("image3", $dataProduct['image3']);
	$smarty->assign("image4", $dataProduct['image4']);
	$smarty->assign("image5", $dataProduct['image5']);
	$smarty->assign("image6", $dataProduct['image6']);
	$smarty->assign("description", $dataProduct['description']);
	$smarty->assign("ukuran", $dataProduct['ukuran']);
	// $smarty->assign("volume", $dataProduct['volume']);
	// $smarty->assign("alcohol", $dataProduct['alcohol']);
	$smarty->assign("weight", $dataProduct['weight']);
	$smarty->assign("stock", $dataProduct['qty']);
	$smarty->assign("point", $dataProduct['point']);
	
	for ($i = 1; $i <= $dataProduct['qty']; $i++)
	{
		$qty[] = $i;
	}
	
	$smarty->assign("qty", $qty);
	
	// related product
	$queryRelated = "SELECT * FROM as_products WHERE productID != '$productID' AND categoryID = '$dataProduct[categoryID]' AND status = 'Y' ORDER BY rand() LIMIT 3";
	$sqlRelated = mysqli_query($connect, $queryRelated);
	$numsRelated = mysqli_num_rows($sqlRelated);
	
	while ($dtRelated = mysqli_fetch_array($sqlRelated))
	{
		if ($dtRelated['salePriceManagement'] == '1')
		{
			$salePriceR = $dtRelated['salePrice'];
			$discountPriceR = $dtRelated['discountPrice'];
		}
	
		elseif ($dtRelated['salePriceManagement'] == '2')
		{
			$addSalePriceR = $dtRelated['buyPrice'] + $dtRelated['salePrice'];
			$addDiscountPriceR = $dtRelated['buyPrice'] + $dtRelated['discountPrice'];
			
			$salePriceR = pembulatan($addSalePriceR);
			$discountPriceR = pembulatan($addDiscountPriceR);
		}
		
		elseif ($dtRelated['salePriceManagement'] == '3')
		{
			$buyPriceR = pembulatan($dtRelated['buyPrice']);
				
			$addSalePriceR = $dtRelated['buyPrice'] + ($buyPriceR * ($dtRelated['salePrice']/100));
			$addDiscountPriceR = $dtRelated['buyPrice'] + ($buyPriceR * ($dtRelated['discountPrice']/100));
			
			$salePriceR = pembulatan($addSalePriceR);
			$discountPriceR = pembulatan($addDiscountPriceR);
		}
		
		else
		{
			$salePriceR = 0;
			$discountPriceR = 0;
		}
	
		$dataRelated[] = array(	'productID' => $dtRelated['productID'],
								'productSeo' => $dtRelated['productSeo'],
								'productName' => $dtRelated['productName'],
								'salePrice' => $salePriceR,
								'discountPrice' => $discountPriceR,
								'buyPrice' => $dtRelated['buyPrice'],
								'salePriceRp' => format_rupiah($salePriceR),
								'discountPriceRp' => format_rupiah($discountPriceR),
								'image1' => $dtRelated['image1']
								);
	}
	
	$smarty->assign("dataRelated", $dataRelated);
	$smarty->assign("numsRelated", $numsRelated);
	
	// showing up the new product
	$queryNewProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY createdDate DESC LIMIT 5";
	$sqlNewProduct = mysqli_query($connect, $queryNewProduct);
	
	while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
	{
		$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
									'productName' => $dtNewProduct['productName'],
									'productSeo' => $dtNewProduct['productSeo'],
									'salePrice' => format_rupiah($dtNewProduct['salePrice']),
									'discountPrice' => format_rupiah($dtNewProduct['discountPrice']),
									'image1' => $dtNewProduct['image1']);
	}
	
	$smarty->assign("dataNewProduct", $dataNewProduct);
	
	$smarty->assign("metaTitle", $dataProduct['productName']);
	
	// Show up the category list
	$queryListCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlListCategory = mysqli_query($connect, $queryListCategory);
	$i = 1;
	while ($dtListCategory = mysqli_fetch_array($sqlListCategory))
	{
		$queryJmlCat = "SELECT productID FROM as_products WHERE categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
		$sqlJmlCat = mysqli_query($connect, $queryJmlCat);
		$numsJmlCat = mysqli_num_rows($sqlJmlCat);
		
		$queryListSub = "SELECT * FROM as_sub_categories WHERE status = 'Y' AND categoryID = '$dtListCategory[categoryID]' ORDER BY subCategoryName ASC";
		$sqlListSub = mysqli_query($connect, $queryListSub);
		$numsListSub = mysqli_num_rows($sqlListSub);
		$dataListSub = array();
		while ($dtListSub = mysqli_fetch_array($sqlListSub))
		{
			$queryJml = "SELECT productID FROM as_products WHERE subCategoryID = '$dtListSub[subCategoryID]' AND categoryID = '$dtListCategory[categoryID]' AND status = 'Y'";
			$sqlJml = mysqli_query($connect, $queryJml);
			$numsJml = mysqli_num_rows($sqlJml);
			
			$dataListSub[] = array(	'subCategoryID' => $dtListSub['subCategoryID'],
									'subCategoryName' => $dtListSub['subCategoryName'],
									'subCategorySeo' => $dtListSub['subCategorySeo'],
									'numsJml' => $numsJml);
		}
		
		$dataListCategory[] = array('categoryID' => $dtListCategory['categoryID'],
									'categoryName' => $dtListCategory['categoryName'],
									'categorySeo' => $dtListCategory['categorySeo'],
									'dataListSub' => $dataListSub,
									'numsListSub' => $numsListSub,
									'numsJmlCat' => $numsJmlCat,
									'i' => $i);
		$i++;
	}
	
	$smarty->assign("dataListCategory", $dataListCategory);
	
	$smarty->assign("popup", $_SESSION['sessPopUp']);
	$smarty->assign("referer", $_SESSION['referer']);
	$_SESSION['sessPopUp'] = "";
}

// if mod is product and act is search
elseif ($module == 'product' && $act == 'search')
{
	$q = mysqli_real_escape_string($connect, $_GET['q']);
	$smarty->assign("q", $q);
	
	// showing up the product search
	$p = new PagingProductHitSearch;
	// limit hanya 12 per halaman
	$batas  = 25;
	$posisi = $p->cariPosisi($batas);
	
	$queryProduct = "SELECT * FROM as_products WHERE productName LIKE '%$q%' AND status = 'Y' ORDER BY productName ASC, qty DESC LIMIT $posisi,$batas";
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$i = 0;
	$kolom = 4;
	while($dtProduct = mysqli_fetch_array($sqlProduct))
	{
		if ($i >= $kolom){
			$i = 0;
		}
		$i++;
		
		if ($dtProduct['salePriceManagement'] == '1')
		{
			$salePrice = $dtProduct['salePrice'];
			$discountPrice = $dtProduct['discountPrice'];
		}
	
		elseif ($dtProduct['salePriceManagement'] == '2')
		{
			$addSalePrice = $dtProduct['buyPrice'] + $dtProduct['salePrice'];
			$addDiscountPrice = $dtProduct['buyPrice'] + $dtProduct['discountPrice'];
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		elseif ($dtProduct['salePriceManagement'] == '3')
		{
			$buyPrice = pembulatan($dtProduct['buyPrice']);
				
			$addSalePrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['salePrice']/100));
			$addDiscountPrice = $dtProduct['buyPrice'] + ($buyPrice * ($dtProduct['discountPrice']/100));
			
			$salePrice = pembulatan($addSalePrice);
			$discountPrice = pembulatan($addDiscountPrice);
		}
		
		else
		{
			$salePrice = 0;
			$discountPrice = 0;
		}
		
		$dataProduct[] = array(	'productID' => $dtProduct['productID'],
								'productName' => $dtProduct['productName'],
								'productSeo' => $dtProduct['productSeo'],
								'salePrice' => $salePrice,
								'discountPrice' => $discountPrice,
								'buyPrice' => $buyPrice,
								'salePriceRp' => format_rupiah($salePrice),
								'discountPriceRp' => format_rupiah($discountPrice),
								'description' => strip_tags(substr($dtProduct['description'], 0,80)),
								'image1' => $dtProduct['image1'],
								'image2' => $dtProduct['image2'],
								'image3' => $dtProduct['image3'],
								'image4' => $dtProduct['image4'],
								'image5' => $dtProduct['image5'],
								'image6' => $dtProduct['image6'],
								'qty' => $dtProduct['qty'],
								'i' => $i);
	}

	$smarty->assign("dataProduct", $dataProduct);
	
	$queryJmlData = "SELECT * FROM as_products WHERE productName LIKE '%$q%' AND status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProducts", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", $q);
	
	$smarty->assign("popup", $_SESSION['sessPopUp']);
	$smarty->assign("referer", $_SESSION['referer']);
	$_SESSION['sessPopUp'] = "";
}

else
{
	$smarty->assign("msg", $_SESSION['sessContact']);
	$_SESSION['sessContact'] = "";
	
	$smarty->assign("metaTitle", "Hubungi Kami");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
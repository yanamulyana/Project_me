<?php
include "header.php";
$page = "search.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

// if mod is search and act is go
if ($module == 'search' && $act == 'go')
{
	$q = mysqli_real_escape_string($connect, $_GET['q']);
	$smarty->assign("q", $q);
	$sort = mysqli_real_escape_string($connect, $_GET['sort']);
	$smarty->assign("sort", $sort);
	
	// showing up the product search
	$p = new PagingSearch;
	// limit hanya 16 per halaman
	$batas  = 16;
	$posisi = $p->cariPosisi($batas);
	
	if ($sort == '1')
	{
		$queryProduct = "SELECT * FROM as_products WHERE productName LIKE '%$q%' AND status = 'Y' ORDER BY productName ASC LIMIT $posisi,$batas";
	}
	elseif ($sort == '2')
	{
		$queryProduct = "SELECT * FROM as_products WHERE productName LIKE '%$q%' AND status = 'Y' ORDER BY productName DESC LIMIT $posisi,$batas";
	}
	elseif ($sort == '3')
	{
		$queryProduct = "SELECT * FROM as_products WHERE productName LIKE '%$q%' AND status = 'Y' ORDER BY salePrice ASC LIMIT $posisi,$batas";
	}
	elseif ($sort == '4')
	{
		$queryProduct = "SELECT * FROM as_products WHERE productName LIKE '%$q%' AND status = 'Y' ORDER BY salePrice DESC LIMIT $posisi,$batas";
	}
	else
	{
		$queryProduct = "SELECT * FROM as_products WHERE productName LIKE '%$q%' AND status = 'Y' ORDER BY createdDate DESC LIMIT $posisi,$batas";
	}
	
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$numsProduct = mysqli_num_rows($sqlProduct);
	
	$smarty->assign("numsProduct", $numsProduct);
	
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
	
	$queryJmlData = "SELECT * FROM as_products WHERE productName LIKE '%$q%' AND status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProducts", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Pencarian produk");
	
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
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
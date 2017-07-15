<?php
include "header.php";
$page = "ketentuan_layanan.tpl";

$queryTerm = "SELECT * FROM as_policy WHERE status = 'Y' AND policyID = '1'";
$sqlTerm = mysqli_query($connect, $queryTerm);
$dataTerm = mysqli_fetch_array($sqlTerm);

$smarty->assign("policyID", $dataTerm['policyID']);
$smarty->assign("pageTitle", $dataTerm['pageTitle']);
$smarty->assign("description", $dataTerm['description']);

$smarty->assign("metaTitle", "Ketentuan & Layanan");

// showing up the best seller product
$queryBestProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY sold DESC LIMIT 5";
$sqlBestProduct = mysqli_query($connect, $queryBestProduct);

while ($dtBestProduct = mysqli_fetch_array($sqlBestProduct))
{
	$dataBestProduct[] = array(	'productID' => $dtBestProduct['productID'],
								'productName' => $dtBestProduct['productName'],
								'productSeo' => $dtBestProduct['productSeo'],
								'salePrice' => format_rupiah($dtBestProduct['salePrice']),
								'discountPrice' => format_rupiah($dtBestProduct['discountPrice']),
								'image1' => $dtBestProduct['image1']);
}

$smarty->assign("dataBestProduct", $dataBestProduct);
	
include "footer.php";
?>
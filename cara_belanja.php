<?php
include "header.php";
$page = "cara_belanja.tpl";

$queryBelanja = "SELECT * FROM as_howtobuy WHERE status = 'Y' AND howID = '1'";
$sqlBelanja = mysqli_query($connect, $queryBelanja);
$dataBelanja = mysqli_fetch_array($sqlBelanja);

$smarty->assign("howID", $dataBelanja['profileID']);
$smarty->assign("pageTitle", $dataBelanja['pageTitle']);
$smarty->assign("description", $dataBelanja['description']);

$smarty->assign("metaTitle", "Cara Berbelanja");

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
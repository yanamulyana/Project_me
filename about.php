<?php
include "header.php";
$page = "about.tpl";

$queryAbout = "SELECT * FROM as_profiles WHERE status = 'Y' AND profileID = '1'";
$sqlAbout = mysqli_query($connect, $queryAbout);
$dataAbout = mysqli_fetch_array($sqlAbout);

$smarty->assign("profileID", $dataAbout['profileID']);
$smarty->assign("pageTitle", $dataAbout['pageTitle']);
$smarty->assign("image", $dataAbout['image']);
$smarty->assign("description", $dataAbout['description']);

$smarty->assign("metaTitle", "Tentang Kami");

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
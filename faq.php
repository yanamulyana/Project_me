<?php
include "header.php";
$page = "faq.tpl";

$queryFaq = "SELECT * FROM as_faq WHERE status = 'Y' AND faqID = '1'";
$sqlFaq = mysqli_query($connect, $queryFaq);
$dataFaq = mysqli_fetch_array($sqlFaq);

$smarty->assign("faqID", $dataFaq['faqID']);
$smarty->assign("pageTitle", $dataFaq['pageTitle']);
$smarty->assign("description", $dataFaq['description']);

$smarty->assign("metaTitle", "FAQ");

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
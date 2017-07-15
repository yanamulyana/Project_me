<?php
include "header.php";
$page = "home.tpl";

if ($_SESSION['sessFacebook'] == '1')
{
	header("Location: edit-account.html");
}

$smarty->assign("metaTitle", "Selamat datang di Anaku.com");

$smarty->assign("msgNewsletter", $_SESSION['sessNewsletter']);
$_SESSION['sessNewsletter'] = "";

// showing up the promotion
$queryPromo = "SELECT * FROM as_promos WHERE status = 'Y' ORDER BY createdDate DESC";
$sqlPromo = mysqli_query($connect, $queryPromo);
$numsPromo = mysqli_num_rows($sqlPromo);
while ($dtPromo = mysqli_fetch_array($sqlPromo))
{
	$dataPromo[] = array(	'promoID' => $dtPromo['promoID'],
							'title' => $dtPromo['title'],
							'title_seo' => $dtPromo['title_seo'],
							'description' => strip_tags(substr($dtPromo['description'], 0, 200)),
							'url' => $dtPromo['url'],
							'image' => $dtPromo['image']);
}

$smarty->assign("dataPromo", $dataPromo);
$smarty->assign("numsPromo", $numsPromo);

// showing up the new product
$queryNewProduct = "SELECT productID, qty, productName, salePriceManagement, productSeo, resellerPrice, specialPrice, buyPrice, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' AND qty != '0' ORDER BY createdDate DESC LIMIT 4";
$sqlNewProduct = mysqli_query($connect, $queryNewProduct);

while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
{
	if ($dtNewProduct['salePriceManagement'] == '1')
	{
		$salePrice = $dtNewProduct['salePrice'];
		$discountPrice = $dtNewProduct['discountPrice'];
		$resellerPrice = $dtNewProduct['resellerPrice'];
		$specialPrice = $dtNewProduct['specialPrice'];
	}

	elseif ($dtNewProduct['salePriceManagement'] == '2')
	{
		$addSalePrice = $dtNewProduct['buyPrice'] + $dtNewProduct['salePrice'];
		$addDiscountPrice = $dtNewProduct['buyPrice'] + $dtNewProduct['discountPrice'];
		$addResellerPrice = $dtNewProduct['buyPrice'] + $dtNewProduct['resellerPrice'];
		$addSpecialPrice = $dtNewProduct['buyPrice'] + $dtNewProduct['specialPrice'];
		
		$salePrice = pembulatan($addSalePrice);
		$discountPrice = pembulatan($addDiscountPrice);
		$resellerPrice = pembulatan($addResellerPrice);
		$specialPrice = pembulatan($addSpecialPrice);
	}
	
	elseif ($dtNewProduct['salePriceManagement'] == '3')
	{
		$buyPrice = pembulatan($dtNewProduct['buyPrice']);
			
		$addSalePrice = $dtNewProduct['buyPrice'] + ($buyPrice * ($dtNewProduct['salePrice']/100));
		$addDiscountPrice = $dtNewProduct['buyPrice'] + ($buyPrice * ($dtNewProduct['discountPrice']/100));
		$addResellerPrice = $dtNewProduct['buyPrice'] + ($buyPrice * ($dtNewProduct['resellerPrice']/100));
		$addSpecialPrice = $dtNewProduct['buyPrice'] + ($buyPrice * ($dtNewProduct['specialPrice']/100));
		
		$salePrice = pembulatan($addSalePrice);
		$discountPrice = pembulatan($addDiscountPrice);
		$resellerPrice = pembulatan($addResellerPrice);
		$specialPrice = pembulatan($addSpecialPrice);
	}
	
	else
	{
		$salePrice = 0;
		$discountPrice = 0;
		$resellerPrice = 0;
		$specialPrice = 0;
	}
	
	$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
								'productName' => $dtNewProduct['productName'],
								'productSeo' => $dtNewProduct['productSeo'],
								'buyPrice' => $dtNewProduct['buyPrice'],
								'salePrice' => $salePrice,
								'discountPrice' => $discountPrice,
								'salePriceRp' => format_rupiah($salePrice),
								'discountPriceRp' => format_rupiah($discountPrice),
								'resellerPrice' => $resellerPrice,
								'specialPrice' => $specialPrice,
								'resellerPriceRp' => format_rupiah($resellerPrice),
								'specialPriceRp' => format_rupiah($specialPrice),
								'qty' => $dtNewProduct['qty'],
								'image1' => $dtNewProduct['image1']);
}

$smarty->assign("dataNewProduct", $dataNewProduct);

// showing up the new product
$queryNewProduct2 = "SELECT productID, productName, salePriceManagement, qty, productSeo, salePrice, buyPrice, discountPrice, image1 FROM as_products WHERE status = 'Y' AND qty != '0' ORDER BY createdDate DESC LIMIT 4";
$sqlNewProduct2 = mysqli_query($connect, $queryNewProduct2);

while ($dtNewProduct2 = mysqli_fetch_array($sqlNewProduct2))
{
	if ($dtNewProduct2['salePriceManagement'] == '1')
	{
		$salePrice2 = $dtNewProduct2['salePrice'];
		$discountPrice2 = $dtNewProduct2['discountPrice'];
		$resellerPrice2 = $dtNewProduct2['resellerPrice'];
		$specialPrice2 = $dtNewProduct2['specialPrice'];
	}

	elseif ($dtNewProduct2['salePriceManagement'] == '2')
	{
		$addSalePrice2 = $dtNewProduct2['buyPrice'] + $dtNewProduct2['salePrice'];
		$addDiscountPrice2 = $dtNewProduct2['buyPrice'] + $dtNewProduct2['discountPrice'];
		$addResellerPrice2 = $dtNewProduct2['buyPrice'] + $dtNewProduct2['resellerPrice'];
		$addSpecialPrice2 = $dtNewProduct2['buyPrice'] + $dtNewProduct2['specialPrice'];
		
		$salePrice2 = pembulatan($addSalePrice2);
		$discountPrice2 = pembulatan($addDiscountPrice2);
		$resellerPrice2 = pembulatan($addResellerPrice2);
		$specialPrice2 = pembulatan($addSpecialPrice2);
	}
	
	elseif ($dtNewProduct2['salePriceManagement'] == '3')
	{
		$buyPrice2 = pembulatan($dtNewProduct2['buyPrice']);
			
		$addSalePrice2 = $dtNewProduct2['buyPrice'] + ($buyPrice2 * ($dtNewProduct2['salePrice']/100));
		$addDiscountPrice2 = $dtNewProduct2['buyPrice'] + ($buyPrice2 * ($dtNewProduct2['discountPrice']/100));
		$addResellerPrice2 = $dtNewProduct2['buyPrice'] + ($buyPrice2 * ($dtNewProduct2['resellerPrice']/100));
		$addSpecialPrice2 = $dtNewProduct2['buyPrice'] + ($buyPrice2 * ($dtNewProduct2['specialPrice']/100));
		
		$salePrice2 = pembulatan($addSalePrice2);
		$discountPrice2 = pembulatan($addDiscountPrice2);
		$resellerPrice2 = pembulatan($addResellerPrice2);
		$specialPrice2 = pembulatan($addSpecialPrice2);
	}
	
	else
	{
		$salePrice2 = 0;
		$discountPrice2 = 0;
		$resellerPrice2 = 0;
		$specialPrice2 = 0;
	}
	
	$dataNewProduct2[] = array(	'productID' => $dtNewProduct2['productID'],
								'productName' => $dtNewProduct2['productName'],
								'productSeo' => $dtNewProduct2['productSeo'],
								'buyPrice' => $dtNewProduct2['buyPrice'],
								'salePrice' => $salePrice2,
								'discountPrice' => $discountPrice2,
								'salePriceRp' => format_rupiah($salePrice2),
								'discountPriceRp' => format_rupiah($discountPrice2),
								'resellerPrice' => $resellerPrice2,
								'specialPrice' => $specialPrice2,
								'resellerPriceRp' => format_rupiah($resellerPrice2),
								'specialPriceRp' => format_rupiah($specialPrice2),
								'qty' => $dtNewProduct2['qty'],
								'image1' => $dtNewProduct2['image1']);
}

$smarty->assign("dataNewProduct2", $dataNewProduct2);

// showing up the best seller product
$queryBestProduct = "SELECT productID, productName, salePriceManagement, productSeo, qty, salePrice, buyPrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY sold DESC LIMIT 4";
$sqlBestProduct = mysqli_query($connect, $queryBestProduct);

while ($dtBestProduct = mysqli_fetch_array($sqlBestProduct))
{
	if ($dtBestProduct['salePriceManagement'] == '1')
	{
		$salePriceBest = $dtBestProduct['salePrice'];
		$discountPriceBest = $dtBestProduct['discountPrice'];
		$resellerPriceBest = $dtBestProduct['resellerPrice'];
		$specialPriceBest = $dtBestProduct['specialPrice'];
	}

	elseif ($dtBestProduct['salePriceManagement'] == '2')
	{
		$addSalePriceBest = $dtBestProduct['buyPrice'] + $dtBestProduct['salePrice'];
		$addDiscountPriceBest = $dtBestProduct['buyPrice'] + $dtBestProduct['discountPrice'];
		$addResellerPriceBest = $dtBestProduct['buyPrice'] + $dtBestProduct['resellerPrice'];
		$addSpecialPriceBest = $dtBestProduct['buyPrice'] + $dtBestProduct['specialPrice'];
		
		$salePriceBest = pembulatan($addSalePriceBest);
		$discountPriceBest = pembulatan($addDiscountPriceBest);
		$resellerPriceBest = pembulatan($addResellerPriceBest);
		$specialPriceBest = pembulatan($addSpecialPriceBest);
	}
	
	elseif ($dtBestProduct['salePriceManagement'] == '3')
	{
		$buyPriceBest = pembulatan($dtBestProduct['buyPrice']);
			
		$addSalePriceBest = $dtBestProduct['buyPrice'] + ($buyPriceBest * ($dtBestProduct['salePrice']/100));
		$addDiscountPriceBest = $dtBestProduct['buyPrice'] + ($buyPriceBest * ($dtBestProduct['discountPrice']/100));
		$addResellerPriceBest = $dtBestProduct['buyPrice'] + ($buyPriceBest * ($dtBestProduct['resellerPrice']/100));
		$addSpecialPriceBest = $dtBestProduct['buyPrice'] + ($buyPriceBest * ($dtBestProduct['specialPrice']/100));
		
		$salePriceBest = pembulatan($addSalePriceBest);
		$discountPriceBest = pembulatan($addDiscountPriceBest);
		$resellerPriceBest = pembulatan($addResellerPriceBest);
		$specialPriceBest = pembulatan($addSpecialPriceBest);
	}
	
	else
	{
		$salePriceBest = 0;
		$discountPriceBest = 0;
		$resellerPriceBest = 0;
		$specialPriceBest = 0;
	}
	
	$dataBestProduct[] = array(	'productID' => $dtBestProduct['productID'],
								'productName' => $dtBestProduct['productName'],
								'productSeo' => $dtBestProduct['productSeo'],
								'buyPrice' => $dtBestProduct['buyPrice'],
								'salePrice' => $salePriceBest,
								'discountPrice' => $discountPriceBest,
								'salePriceRp' => format_rupiah($salePriceBest),
								'discountPriceRp' => format_rupiah($discountPriceBest),
								'resellerPrice' => $resellerPriceBest,
								'specialPrice' => $specialPriceBest,
								'resellerPriceRp' => format_rupiah($resellerPriceBest),
								'specialPriceRp' => format_rupiah($specialPriceBest),
								'qty' => $dtBestProduct['qty'],
								'image1' => $dtBestProduct['image1']);
}

$smarty->assign("dataBestProduct", $dataBestProduct);

// showing up the best seller product
$queryBestProduct2 = "SELECT productID, salePriceManagement, productName, resellerPrice, specialPrice, qty, productSeo, salePrice, buyPrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY sold DESC LIMIT 4,4";
$sqlBestProduct2 = mysqli_query($connect, $queryBestProduct2);

while ($dtBestProduct2 = mysqli_fetch_array($sqlBestProduct2))
{
	if ($dtBestProduct2['salePriceManagement'] == '1')
	{
		$salePriceBest2 = $dtBestProduct2['salePrice'];
		$discountPriceBest2 = $dtBestProduct2['discountPrice'];
		$resellerPriceBest2 = $dtBestProduct2['resellerPrice'];
		$specialPriceBest2 = $dtBestProduct2['specialPrice'];
	}

	elseif ($dtBestProduct2['salePriceManagement'] == '2')
	{
		$addSalePriceBest2 = $dtBestProduct2['buyPrice'] + $dtBestProduct2['salePrice'];
		$addDiscountPriceBest2 = $dtBestProduct2['buyPrice'] + $dtBestProduct2['discountPrice'];
		$addResellerPriceBest2 = $dtBestProduct2['buyPrice'] + $dtBestProduct2['resellerPrice'];
		$addSpecialPriceBest2 = $dtBestProduct2['buyPrice'] + $dtBestProduct2['specialPrice'];
		
		$salePriceBest2 = pembulatan($addSalePriceBest2);
		$discountPriceBest2 = pembulatan($addDiscountPriceBest2);
		$resellerPriceBest2 = pembulatan($addResellerPriceBest2);
		$specialPriceBest2 = pembulatan($addSpecialPriceBest2);
	}
	
	elseif ($dtBestProduct2['salePriceManagement'] == '3')
	{
		$buyPriceBest2 = pembulatan($dtBestProduct['buyPrice']);
			
		$addSalePriceBest2 = $dtBestProduct2['buyPrice'] + ($buyPriceBest2 * ($dtBestProduct2['salePrice']/100));
		$addDiscountPriceBest2 = $dtBestProduct2['buyPrice'] + ($buyPriceBest2 * ($dtBestProduct2['discountPrice']/100));
		$addResellerPriceBest2 = $dtBestProduct2['buyPrice'] + ($buyPriceBest2 * ($dtBestProduct2['resellerPrice']/100));
		$addSpecialPriceBest2 = $dtBestProduct2['buyPrice'] + ($buyPriceBest2 * ($dtBestProduct2['specialPrice']/100));
		
		$salePriceBest2 = pembulatan($addSalePriceBest2);
		$discountPriceBest2 = pembulatan($addDiscountPriceBest2);
		$resellerPriceBest2 = pembulatan($addResellerPriceBest2);
		$specialPriceBest2 = pembulatan($addSpecialPriceBest2);
	}
	
	else
	{
		$salePriceBest2 = 0;
		$discountPriceBest2 = 0;
		$resellerPriceBest2 = 0;
		$specialPriceBest2 = 0;
	}
	
	$dataBestProduct2[] = array('productID' => $dtBestProduct2['productID'],
								'productName' => $dtBestProduct2['productName'],
								'productSeo' => $dtBestProduct2['productSeo'],
								'buyPrice' => $dtBestProduct2['buyPrice'],
								'salePrice' => $salePriceBest2,
								'discountPrice' => $discountPriceBest2,
								'salePriceRp' => format_rupiah($salePriceBest2),
								'discountPriceRp' => format_rupiah($discountPriceBest2),
								'resellerPrice' => $resellerPriceBest2,
								'specialPrice' => $specialPriceBest2,
								'resellerPriceRp' => format_rupiah($resellerPriceBest2),
								'specialPriceRp' => format_rupiah($specialPriceBest2),
								'qty' => $dtBestProduct2['qty'],
								'image1' => $dtBestProduct2['image1']);
}

$smarty->assign("dataBestProduct2", $dataBestProduct2);

$smarty->assign("popup", $_SESSION['sessPopUp']);
$smarty->assign("referer", $_SESSION['referer']);
$_SESSION['sessPopUp'] = "";
include "footer.php";
?>
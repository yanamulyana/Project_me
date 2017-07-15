<?php
date_default_timezone_set("ASIA/JAKARTA");
session_start();
error_reporting(0);
include "config/connection.php";
include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/fungsi_rupiah.php";
include "config/fungsi_bulat.php";
include "config/debug.php";

// include all files are needed
require('libs/Smarty.class.php');

// create smarty new object
$smarty = new Smarty;

$invoice = $_SESSION['invoice'];
if ($invoice == "")
{
	$_SESSION['invoice'] = date('ymdHis');
	$invoice = $_SESSION['invoice'];
}

$smarty->assign("sessMemberID", $_SESSION['sessMemberID']);
$smarty->assign("sessFirstName", $_SESSION['sessFirstName']);
$smarty->assign("sessLastName", $_SESSION['sessLastName']);
$smarty->assign("sessEmail", $_SESSION['sessEmail']);
$smarty->assign("sessLevel", $_SESSION['sessLevel']);
$smarty->assign("sessRequirement", $_SESSION['sessRequirement']);

$sessMemberID = $_SESSION['sessMemberID'];
$sessEmail = $_SESSION['sessEmail'];

$queryNavMember = "SELECT firstName, lastName, gender, address, provinceID, cityID FROM as_members WHERE memberID = '$sessMemberID'";
$sqlNavMember = mysqli_query($connect, $queryNavMember);
$dataNavMember = mysqli_fetch_array($sqlNavMember);

$smarty->assign("invoice", $invoice);

$year = date('Y');

// showing up the brand
$queryNavBrand = "SELECT * FROM as_brands WHERE status = 'Y' ORDER BY brandName ASC";
$sqlNavBrand = mysqli_query($connect, $queryNavBrand);

while ($dtBrand = mysqli_fetch_array($sqlNavBrand))
{
	$numsNavBrand = mysqli_num_rows(mysqli_query($connect, "SELECT productID FROM as_products WHERE status = 'Y' AND brandID = '$dtBrand[brandID]'"));
	
	$dataNavBrand[] = array('brandID' => $dtBrand['brandID'],
							'brandName' => $dtBrand['brandName'],
							'brandSeo' => $dtBrand['brandSeo'],
							'numsNavBrand' => $numsNavBrand);
}

$smarty->assign("dataNavBrand", $dataNavBrand);

// showing up the categories
$queryNavCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC LIMIT 6";
$queryNavCategory2 = "SELECT * FROM as_categories WHERE status = 'Y'";
$queryNavCategory3 = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC LIMIT 6,100";
$sqlNavCategory = mysqli_query($connect, $queryNavCategory);
$sqlNavCategory2 = mysqli_query($connect, $queryNavCategory2);
$sqlNavCategory3 = mysqli_query($connect, $queryNavCategory3);
$numsNavCategory = mysqli_num_rows($sqlNavCategory2);

$smarty->assign("numsNavCategory", $numsNavCategory);

$k = 1;
while ($dtNavCategory = mysqli_fetch_array($sqlNavCategory))
{
	$dataNavSubCategory = array();
	$queryNavSubCategory = "SELECT * FROM as_sub_categories WHERE status = 'Y' AND categoryID = '$dtNavCategory[categoryID]' ORDER BY subCategoryName ASC";
	$sqlNavSubCategory = mysqli_query($connect, $queryNavSubCategory);
	$numsNavSubCategory = mysqli_num_rows($sqlNavSubCategory);
	while ($dtNavSubCategory = mysqli_fetch_array($sqlNavSubCategory))
	{
		$dataNavSubCategory[] = array(	'subCategoryID' => $dtNavSubCategory['subCategoryID'],
										'subCategoryName' => $dtNavSubCategory['subCategoryName'],
										'subCategorySeo' => $dtNavSubCategory['subCategorySeo']);
	}
	
	$dataNavCategory[] = array(	'categoryID' => $dtNavCategory['categoryID'],
								'categoryName' => $dtNavCategory['categoryName'],
								'categorySeo' => $dtNavCategory['categorySeo'],
								'dataNavSubCategory' => $dataNavSubCategory,
								'numsNavSubCategory' => $numsNavSubCategory);
}

while ($dtNavCategory2 = mysqli_fetch_array($sqlNavCategory3))
{
	$dataNavCategory2[] = array(	'categoryID' => $dtNavCategory2['categoryID'],
									'categoryName' => $dtNavCategory2['categoryName'],
									'categorySeo' => $dtNavCategory2['categorySeo']);
}

$smarty->assign("dataNavCategory", $dataNavCategory);

$smarty->assign("dataNavCategory2", $dataNavCategory2);

// total item in cart
$queryTotalItem = "SELECT SUM(qty) as totalqty, SUM(subtotal) as subtotal FROM as_carts WHERE invoiceID = '$invoice'";
$sqlTotalItem = mysqli_query($connect, $queryTotalItem);
$dataTotalItem = mysqli_fetch_array($sqlTotalItem);

$smarty->assign("totalItem", $dataTotalItem['totalqty']);
$smarty->assign("totalSubtotal", format_rupiah($dataTotalItem['subtotal']));

// showing the cart
$queryNavCart = "SELECT A.cartID, A.productID, A.price, A.qty, A.subtotal, B.weight, B.productSeo, B.productName, B.image1
				FROM as_carts A INNER JOIN as_products B ON A.productID=B.productID
				WHERE A.invoiceID = '$invoice'";
$sqlNavCart = mysqli_query($connect, $queryNavCart);
$querySum = "SELECT SUM(qty) as total FROM as_carts WHERE invoiceID = '$invoice'";
$sqlSum = mysqli_query($connect, $querySum);
$numsSum = mysqli_fetch_array($sqlSum);

$smarty->assign("numsSum", $numsSum['total']);

while ($dtNavCart = mysqli_fetch_array($sqlNavCart))
{
	$qtyWeight = $dtNavCart['qty'] * $dtNavCart['weight'];
	
	$dataNavCart[] = array(	'cartID' => $dtNavCart['cartID'],
							'productID' => $dtNavCart['productID'],
							'price' => $dtNavCart['price'],
							'priceRp' => format_rupiah($dtNavCart['price']),
							'qty' => $dtNavCart['qty'],
							'subtotal' => $dtNavCart['subtotal'],
							'subtotalRp' => format_rupiah($dtNavCart['subtotal']),
							'productName' => $dtNavCart['productName'],
							'image' => $dtNavCart['image1']);
	$navGrandtotal += $dtNavCart['subtotal'];
	$navWeight += $qtyWeight;
}

$smarty->assign("navGrandtotal", $navGrandtotal);
$smarty->assign("navGrandtotalRp", format_rupiah($navGrandtotal));
$smarty->assign("dataNavCart", $dataNavCart);
$smarty->assign("navWeight", $navWeight);

// showing up the contact
$queryProfile = "SELECT * FROM as_profiles WHERE profileID = '1'";
$sqlProfile = mysqli_query($connect, $queryProfile);
$dataProfile = mysqli_fetch_array($sqlProfile);

$smarty->assign("profileAddress", $dataProfile['address']);
$smarty->assign("profileCompanyName", $dataProfile['companyName']);
$smarty->assign("profilePhone", $dataProfile['phone']);
$smarty->assign("profileFax", $dataProfile['fax']);
$smarty->assign("profileEmail", $dataProfile['email']);
$smarty->assign("profileFacebook", $dataProfile['facebook']);
$smarty->assign("profileTwitter", $dataProfile['twitter']);
$smarty->assign("server", $_SERVER['HTTP_REFERER']);

$smarty->assign("categoryID", $_GET['categoryID']);
$smarty->assign("sessCart", $_SESSION['sessCart']);
$_SESSION['sessCart'] = "";
?>
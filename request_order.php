<?php
// include header
include "header.php";
// set the tpl page
$page = "request_order.tpl";

// get variable
$module = $_GET['mod'];
$act = $_GET['act'];
	
if ($module == 'request' && $act == 'order')
{
	$productID = mysqli_real_escape_string($connect, $_GET['productID']);
	
	$smarty->assign("productID", $productID);
} //close bracket

// assign code to the tpl
$smarty->assign("module", $_GET['mod']);
$smarty->assign("act", $_GET['act']);

// include footer
include "footer.php";
?>
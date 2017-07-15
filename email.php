<?php
// include header
include "header.php";
// set the tpl page
$page = "email.tpl";

// get variable
$module = $_GET['mod'];
$act = $_GET['act'];
	
if ($module == 'tell' && $act == 'me')
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
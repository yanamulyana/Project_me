<?php
include "header.php";
$page = "voucher.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is voucher and act is update
if ($module == 'voucher' && $act == 'update')
{
	$voucherID = $_POST['voucherID'];
	$pageTitle = mysqli_real_escape_string($connect, $_POST['pageTitle']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryVoucher = "UPDATE as_voucher SET 	pageTitle = '$pageTitle',
											description = '$description',
											status = '$status',
											modifiedDate = '$modifiedDate',
											modifiedUserID = '$sessUserID'
											WHERE voucherID = '$voucherID'";
	mysqli_query($connect, $queryVoucher);
	
	$_SESSION['sessVoucher'] = 1;
	
	header("Location: voucher.php");
}

else
{
	$queryVoucher = "SELECT * FROM as_voucher WHERE voucherID = '1'";
	$sqlVoucher = mysqli_query($connect, $queryVoucher);
	$dataVoucher = mysqli_fetch_array($sqlVoucher);
	
	$smarty->assign("voucherID", $dataVoucher['voucherID']);
	$smarty->assign("pageTitle", $dataVoucher['pageTitle']);
	$smarty->assign("description", $dataVoucher['description']);
	$smarty->assign("status", $dataVoucher['status']);
	
	$smarty->assign("metaTitle", "Voucher");
	
	$smarty->assign("msg", $_SESSION['sessVoucher']);
	$_SESSION['sessVoucher'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
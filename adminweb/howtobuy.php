<?php
include "header.php";
$page = "howtobuy.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is howtobuy and act is update
if ($module == 'howtobuy' && $act == 'update')
{
	$howID = $_POST['howID'];
	$pageTitle = mysqli_real_escape_string($connect, $_POST['pageTitle']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryHow = "UPDATE as_howtobuy SET	pageTitle = '$pageTitle',
										description = '$description',
										status = '$status',
										modifiedDate = '$modifiedDate',
										modifiedUserID = '$sessUserID'
										WHERE howID = '$howID'";
	
	mysqli_query($connect, $queryHow);
	
	$_SESSION['sessHow'] = 1;
	
	header("Location: howtobuy.php");
}

else
{
	$smarty->assign("msg", $_SESSION['sessHow']);
	$_SESSION['sessHow'] = "";
	
	// showing up the howtobuy
	$queryHow = "SELECT * FROM as_howtobuy WHERE howID = '1'";
	$sqlHow = mysqli_query($connect, $queryHow);
	$dataHow = mysqli_fetch_array($sqlHow);
	
	$smarty->assign("howID", $dataHow['howID']);
	$smarty->assign("pageTitle", $dataHow['pageTitle']);
	$smarty->assign("description", $dataHow['description']);
	$smarty->assign("status", $dataHow['status']);
	
	$smarty->assign("metaTitle", "Cara Pembelian");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
<?php
include "header.php";
$page = "policy.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is policy and act is update
if ($module == 'policy' && $act == 'update')
{
	$policyID = $_POST['policyID'];
	$pageTitle = mysqli_real_escape_string($connect, $_POST['pageTitle']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryPolicy = "UPDATE as_policy SET	pageTitle = '$pageTitle',
											description = '$description',
											status = '$status',
											modifiedDate = '$modifiedDate',
											modifiedUserID = '$sessUserID'
											WHERE policyID = '$policyID'";
	
	mysqli_query($connect, $queryPolicy);
	
	$_SESSION['sessPolicy'] = 1;
	
	header("Location: policy.php");
}

else
{
	$smarty->assign("msg", $_SESSION['sessPolicy']);
	$_SESSION['sessPolicy'] = "";
	
	// showing up the policy
	$queryPolicy = "SELECT * FROM as_policy WHERE policyID = '1'";
	$sqlPolicy = mysqli_query($connect, $queryPolicy);
	$dataPolicy = mysqli_fetch_array($sqlPolicy);
	
	$smarty->assign("policyID", $dataPolicy['policyID']);
	$smarty->assign("pageTitle", $dataPolicy['pageTitle']);
	$smarty->assign("description", $dataPolicy['description']);
	$smarty->assign("status", $dataPolicy['status']);
	
	$smarty->assign("metaTitle", "Ketentuan Layanan");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
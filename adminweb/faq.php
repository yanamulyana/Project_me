<?php
include "header.php";
$page = "faq.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is faq and act is update
if ($module == 'faq' && $act == 'update')
{
	$faqID = $_POST['faqID'];
	$pageTitle = mysqli_real_escape_string($connect, $_POST['pageTitle']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryFaq = "UPDATE as_faq SET	pageTitle = '$pageTitle',
									description = '$description',
									status = '$status',
									modifiedDate = '$modifiedDate',
									modifiedUserID = '$sessUserID'
									WHERE faqID = '$faqID'";
	
	mysqli_query($connect, $queryFaq);
	
	$_SESSION['sessFaq'] = 1;
	
	header("Location: faq.php");
}

else
{
	
	$smarty->assign("msg", $_SESSION['sessFaq']);
	$_SESSION['sessFaq'] = "";
	
	// showing up the faq
	$queryFaq = "SELECT * FROM as_faq WHERE faqID = '1'";
	$sqlFaq = mysqli_query($connect, $queryFaq);
	$dataFaq = mysqli_fetch_array($sqlFaq);
	
	$smarty->assign("faqID", $dataFaq['faqID']);
	$smarty->assign("pageTitle", $dataFaq['pageTitle']);
	$smarty->assign("description", $dataFaq['description']);
	$smarty->assign("status", $dataFaq['status']);
	
	$smarty->assign("metaTitle", "FAQ");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
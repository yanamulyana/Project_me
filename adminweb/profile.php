<?php
include "header.php";
$page = "profile.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is profile and act is update
if ($module == 'profile' && $act == 'update')
{
	$profileID = $_POST['profileID'];
	$pageTitle = mysqli_real_escape_string($connect, $_POST['pageTitle']);
	$companyName = mysqli_real_escape_string($connect, $_POST['companyName']);
	$senderName = mysqli_real_escape_string($connect, $_POST['senderName']);
	$filename = $_POST['filename'];
	$oldfile = $_POST['oldfile'];
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$status = $_POST['status'];
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$phone = mysqli_real_escape_string($connect, $_POST['phone']);
	$fax = mysqli_real_escape_string($connect, $_POST['fax']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$facebook = mysqli_real_escape_string($connect, $_POST['facebook']);
	$twitter = mysqli_real_escape_string($connect, $_POST['twitter']);
	$modifiedDate = date('Y-m-d H:i:s');
	
	if ($filename != "")
	{
		unlink("../images/profile/".$oldfile);
		
		$queryProfile = "UPDATE as_profiles SET	pageTitle = '$pageTitle',
												companyName = '$companyName',
												senderName = '$senderName',
												image = '$filename',
												description = '$description',
												address = '$address',
												phone = '$phone',
												fax = '$fax',
												email = '$email',
												facebook = '$facebook',
												twitter = '$twitter',
												status = '$status',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE profileID = '$profileID'";
	}
	else
	{
		$queryProfile = "UPDATE as_profiles SET	pageTitle = '$pageTitle',
												companyName = '$companyName',
												senderName = '$senderName',
												description = '$description',
												address = '$address',
												phone = '$phone',
												fax = '$fax',
												email = '$email',
												facebook = '$facebook',
												twitter = '$twitter',
												status = '$status',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE profileID = '$profileID'";
	}
	
	
	mysqli_query($connect, $queryProfile);
	
	$_SESSION['sessProfile'] = 1;
	
	header("Location: profile.php");
}

else
{
	
	$smarty->assign("msg", $_SESSION['sessProfile']);
	$_SESSION['sessProfile'] = "";
	
	// showing up the profile
	$queryProfile = "SELECT * FROM as_profiles WHERE profileID = '1'";
	$sqlProfile = mysqli_query($connect, $queryProfile);
	$dataProfile = mysqli_fetch_array($sqlProfile);
	
	$smarty->assign("profileID", $dataProfile['profileID']);
	$smarty->assign("pageTitle", $dataProfile['pageTitle']);
	$smarty->assign("companyName", $dataProfile['companyName']);
	$smarty->assign("senderName", $dataProfile['senderName']);
	$smarty->assign("image", $dataProfile['image']);
	$smarty->assign("description", $dataProfile['description']);
	$smarty->assign("status", $dataProfile['status']);
	$smarty->assign("address", $dataProfile['address']);
	$smarty->assign("phone", $dataProfile['phone']);
	$smarty->assign("fax", $dataProfile['fax']);
	$smarty->assign("email", $dataProfile['email']);
	$smarty->assign("facebook", $dataProfile['facebook']);
	$smarty->assign("twitter", $dataProfile['twitter']);
	
	$smarty->assign("metaTitle", "Profile");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
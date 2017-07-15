<?php
include "header.php";
$page = "change_password.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is password and act is update
if ($module == 'password' && $act == 'update')
{
	$currentPassword = md5($_POST['currentPassword']);
	$newPassword = md5($_POST['newPassword']);
	$confirmPassword = md5($_POST['confirmPassword']);
	
	$queryUser = "SELECT password FROM as_users WHERE userID = '$sessUserID'";
	$sqlUser = mysqli_query($connect, $queryUser);
	$dataUser = mysqli_fetch_array($sqlUser);
	
	if ($dataUser['password'] != $currentPassword)
	{
		$_SESSION['sessChange'] = 1;
		
		header("Location: change_password.php");
	}
	else
	{
		if ($newPassword != $confirmPassword)
		{
			$_SESSION['sessChange'] = 2;
			
			header("Location: change_password.php");
		}
		else
		{
			$queryUpdate = "UPDATE as_users SET password = '$confirmPassword' WHERE userID = '$sessUserID'";
			mysqli_query($connect, $queryUpdate);
			
			$_SESSION['sessChange'] = 3;
			
			header("Location: change_password.php");
		}
	}
}

else
{
	$smarty->assign("msg", $_SESSION['sessChange']);
	
	$_SESSION['sessChange'] = "";
	$smarty->assign("metaTitle", "Ubah Password");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
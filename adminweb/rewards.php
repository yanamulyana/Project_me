<?php
include "header.php";
$page = "rewards.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is reward and act is update
if ($module == 'reward' && $act == 'update')
{
	$rewardID = $_POST['rewardID'];
	$pageTitle = mysqli_real_escape_string($connect, $_POST['pageTitle']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryReward = "UPDATE as_reward SET 	pageTitle = '$pageTitle',
											description = '$description',
											status = '$status',
											modifiedDate = '$modifiedDate',
											modifiedUserID = '$sessUserID'
											WHERE rewardID = '$rewardID'";
	mysqli_query($connect, $queryReward);
	
	$_SESSION['sessReward'] = 1;
	
	header("Location: rewards.php");
}

else
{
	$queryReward = "SELECT * FROM as_reward WHERE rewardID = '1'";
	$sqlReward = mysqli_query($connect, $queryReward);
	$dataReward = mysqli_fetch_array($sqlReward);
	
	$smarty->assign("rewardID", $dataReward['rewardID']);
	$smarty->assign("pageTitle", $dataReward['pageTitle']);
	$smarty->assign("description", $dataReward['description']);
	$smarty->assign("status", $dataReward['status']);
	
	$smarty->assign("metaTitle", "Reward");
	
	$smarty->assign("msg", $_SESSION['sessReward']);
	$_SESSION['sessReward'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
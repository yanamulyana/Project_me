<?php
include "header.php";
$page = "reward.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}


// if mod is reward and act is add
if ($module == 'reward' && $act == 'add')
{
	$smarty->assign("metaTitle", "Add Reward");
}

// if mod is reward and act is import
elseif ($module == 'reward' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Poin Reward");
}

// if mod is reward and act is input
elseif ($module == 'reward' && $act == 'input')
{
	$pointName = mysqli_real_escape_string($connect, $_POST['pointName']);
	$minPoint = $_POST['minPoint'];
	$minTrx = $_POST['minTrx'];
	$coupon = $_POST['coupon'];
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryReward = "INSERT INTO as_points (	pointName,
											minPoint,
											minTrx,
											coupon,
											description,
											status,
											createdDate,
											createdUserID,
											modifiedDate,
											modifiedUserID)
									VALUES(	'$pointName',
											'$minPoint',
											'$minTrx',
											'$coupon',
											'$description',
											'$status',
											'$createdDate',
											'$sessUserID',
											'',
											'')";
	mysqli_query($connect, $queryReward);
	
	$_SESSION['sessReward'] = 1;
	
	header("Location: reward.php");
}

// if mod is reward and act is edit
elseif ($module == 'reward' && $act == 'edit')
{
	$pointID = $_GET['pointID'];
	
	// showing up the reward
	$queryReward = "SELECT * FROM as_points WHERE pointID = '$pointID'";
	$sqlReward = mysqli_query($connect, $queryReward);
	$dataReward = mysqli_fetch_array($sqlReward);
	
	$smarty->assign("pointID", $dataReward['pointID']);
	$smarty->assign("pointName", $dataReward['pointName']);
	$smarty->assign("minPoint", $dataReward['minPoint']);
	$smarty->assign("minTrx", $dataReward['minTrx']);
	$smarty->assign("coupon", $dataReward['coupon']);
	$smarty->assign("description", $dataReward['description']);
	$smarty->assign("status", $dataReward['status']);
	
	$smarty->assign("metaTitle", "Edit Reward");
}

// if mod is reward and act is update
elseif ($module == 'reward' && $act == 'update')
{
	$pointID = $_POST['pointID'];
	$pointName = mysqli_real_escape_string($connect, $_POST['pointName']);
	$minPoint = $_POST['minPoint'];
	$minTrx = $_POST['minTrx'];
	$coupon = $_POST['coupon'];
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryReward = "UPDATE as_points SET 	pointName = '$pointName',
											minPoint = '$minPoint',
											minTrx = '$minTrx',
											coupon = '$coupon',
											description = '$description',
											status = '$status',
											modifiedDate = '$modifiedDate',
											modifiedUserID = '$sessUserID'
											WHERE pointID = '$pointID'";
	mysqli_query($connect, $queryReward);
	
	$_SESSION['sessReward'] = 2;
	
	header("Location: reward.php");
}

// if mod is reward and act is delete
elseif ($module == 'reward' && $act == 'delete')
{
	$pointID = $_GET['pointID'];
	
	$queryReward = "DELETE FROM as_points WHERE pointID = '$pointID'";
	mysqli_query($connect, $queryReward);
	
	$_SESSION['sessReward'] = 3;
	
	header("Location: reward.php");
}

else
{
	// showing up the reward admin
	$p = new PagingAdminReward;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the reward
	$queryReward = "SELECT * FROM as_points ORDER BY pointID ASC LIMIT $posisi,$batas";
	$sqlReward = mysqli_query($connect, $queryReward);
	
	$i = 1;
	while ($dtReward = mysqli_fetch_array($sqlReward))
	{
		if ($dtReward['status'] == 'Y')
		{
			$status = "Akfif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataReward[] = array(	'pointID' => $dtReward['pointID'],
								'pointName' => $dtReward['pointName'],
								'minPoint' => $dtReward['minPoint'],
								'minTrx' => format_rupiah($dtReward['minTrx']),
								'coupon' => format_rupiah($dtReward['coupon']),
								'description' => nl2br($dtReward['description']),
								'status' => $status,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataReward", $dataReward);
	
	$queryJmlData = "SELECT * FROM as_points";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsPoint", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Reward");
	
	$smarty->assign("msg", $_SESSION['sessReward']);
	$_SESSION['sessReward'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
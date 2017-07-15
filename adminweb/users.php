<?php
include "header.php";
$page = "users.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is user and act is add
if ($module == 'user' && $act == 'add')
{
	$smarty->assign("metaTitle", "Add User");
}

// if mod is user and act is input
elseif ($module == 'user' && $act == 'input')
{
	$fullName = mysqli_real_escape_string($connect, $_POST['fullName']);
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$cellphone = mysqli_real_escape_string($connect, $_POST['cellphone']);
	$blocked = $_POST['block'];
	$account = mysqli_real_escape_string($connect, $_POST['account']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$password = md5($_POST['password']);
	$createdDate = date('Y-m-d H:i:s');
	
	$queryUser = "INSERT INTO as_users (	fullName,
											address,
											cellphone,
											blocked,
											account,
											email,
											username,
											password,
											createdDate,
											createdUserID)
									VALUES(	'$fullName',
											'$address',
											'$cellphone',
											'$blocked',
											'$account',
											'$email',
											'$username',
											'$password',
											'$createdDate',
											'$sessUserID')";
	mysqli_query($connect, $queryUser);
	
	header("Location: users.php?msg=1");
}

// if mod is user and act is delete
elseif ($module == 'user' && $act == 'delete')
{
	$userID = $_GET['userID'];
	
	if ($userID == "1")
	{
		echo "You do not have authorization to delete this user.";
		exit();
	}
	
	else
	{
	
		$queryUser = "DELETE FROM as_users WHERE userID = '$userID'";
		mysqli_query($connect, $queryUser);
		
		header("Location: users.php?msg=3");
	}
}

// if mod is user and act is view 
elseif ($module == 'user' && $act == 'view')
{
	$userID = $_GET['userID'];
	
	$queryUser = "SELECT * FROM as_users WHERE userID = '$userID'";
	$sqlUser = mysqli_query($connect, $queryUser);
	$dataUser = mysqli_fetch_array($sqlUser);
	
	$smarty->assign("userID", $dataUser['userID']);
	$smarty->assign("fullName", $dataUser['fullName']);
	$smarty->assign("address", $dataUser['address']);
	$smarty->assign("cellphone", $dataUser['cellphone']);
	$smarty->assign("blocked", $dataUser['blocked']);
	$smarty->assign("account", $dataUser['account']);
	$smarty->assign("email", $dataUser['email']);
	$smarty->assign("username", $dataUser['username']);
	
	$smarty->assign("metaTitle", "View User");
}

// if mod is user and act is edit
elseif ($module == 'user' && $act == 'edit')
{
	$userID = $_GET['userID'];
	
	if ($userID == "1")
	{
		echo "You do not have authorization to edit this user.";
		exit();
	}
	
	$queryUser = "SELECT * FROM as_users WHERE userID = '$userID'";
	$sqlUser = mysqli_query($connect, $queryUser);
	$dataUser = mysqli_fetch_array($sqlUser);
	
	
	$smarty->assign("userID", $dataUser['userID']);
	$smarty->assign("fullName", $dataUser['fullName']);
	$smarty->assign("address", $dataUser['address']);
	$smarty->assign("cellphone", $dataUser['cellphone']);
	$smarty->assign("blocked", $dataUser['blocked']);
	$smarty->assign("account", $dataUser['account']);
	$smarty->assign("email", $dataUser['email']);
	$smarty->assign("username", $dataUser['username']);
	
	$smarty->assign("metaTitle", "Edit User");
}

// if mod is user and act is update
elseif ($module == 'user' && $act == 'update')
{
	$userID = $_POST['userID'];
	
	$fullName = mysqli_real_escape_string($connect, $_POST['fullName']);
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$cellphone = mysqli_real_escape_string($connect, $_POST['cellphone']);
	$blocked = $_POST['block'];
	$account = mysqli_real_escape_string($connect, $_POST['account']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryUser = "UPDATE as_users SET	fullName = '$fullName',
										address = '$address',
										cellphone = '$cellphone',
										blocked = '$blocked',
										account = '$account',
										email = '$email',
										modifiedDate = '$modifiedDate',
										modifiedUserID = '$sessUserID'
										WHERE userID = '$userID'";
	mysqli_query($connect, $queryUser);
	
	header("Location: users.php?msg=2");
}

// if mod is user and act is search
elseif ($module == 'user' && $act == 'search')
{
	$q = mysqli_real_escape_string($connect, $_GET['q']);
	
	$smarty->assign("q", $q);
	
	// showing up the admin user search
	$p = new PagingUserSearch;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryUser = "SELECT * FROM as_users WHERE userID != '1' AND username LIKE '%$q%' ORDER BY createdDate DESC LIMIT $posisi,$batas";
	$sqlUser = mysqli_query($connect, $queryUser);
	$i = 1 + $posisi;
	while ($dtUser = mysqli_fetch_array($sqlUser))
	{
		$dataUser[] = array(	'userID' => $dtUser['userID'],
								'username' => $dtUser['username'],
								'fullName' => $dtUser['fullName'],
								'cellphone' => $dtUser['cellphone'],
								'email' => $dtUser['email'],
								'blocked' => $dtUser['blocked'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataUser", $dataUser);
	
	$queryJmlData = "SELECT userID FROM as_users WHERE userID != '1' AND username LIKE '%$q%'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsUser", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Find User");
	
	$smarty->assign("msg", $_GET['msg']);
}

else
{
	// showing up the admin user
	$p = new PagingUser;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryUser = "SELECT * FROM as_users WHERE userID != '1' ORDER BY createdDate DESC LIMIT $posisi,$batas";
	$sqlUser = mysqli_query($connect, $queryUser);
	$i = 1 + $posisi;
	while ($dtUser = mysqli_fetch_array($sqlUser))
	{
		$dataUser[] = array(	'userID' => $dtUser['userID'],
								'username' => $dtUser['username'],
								'fullName' => $dtUser['fullName'],
								'cellphone' => $dtUser['cellphone'],
								'email' => $dtUser['email'],
								'blocked' => $dtUser['blocked'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataUser", $dataUser);
	
	$queryJmlData = "SELECT userID FROM as_users WHERE userID != '1'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsUser", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Find User");
	
	$smarty->assign("msg", $_GET['msg']);
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
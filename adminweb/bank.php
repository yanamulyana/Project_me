<?php
include "header.php";
$page = "bank.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is bank and act is add
if ($module == 'bank' && $act == 'add')
{
	$smarty->assign("metaTitle", "Tambah Bank");
}

// if mod is bank and act is input
elseif ($module == 'bank' && $act == 'input')
{
	
	$bankName = mysqli_real_escape_string($connect, $_POST['bankName']);
	$accountNo = mysqli_real_escape_string($connect, $_POST['accountNo']);
	$accountName = mysqli_real_escape_string($connect, $_POST['accountName']);
	$branch = mysqli_real_escape_string($connect, $_POST['branch']);
	$balance = mysqli_real_escape_string($connect, $_POST['balance']);
	$status = $_POST['status'];
	$display = $_POST['display'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryBank = "INSERT INTO as_banks (	bankName,
											accountNo,
											accountName,
											branch,
											balance,
											endBalance,
											display,
											status,
											createdDate,
											createdUserID,
											modifiedDate,
											modifiedUserID)
									VALUES(	'$bankName',
											'$accountNo',
											'$accountName',
											'$branch',
											'$balance',
											'$balance',
											'$display',
											'$status',
											'$createdDate',
											'$sessUserID',
											'',
											'')";
	mysqli_query($connect, $queryBank);
	
	$_SESSION['sessBank'] = 1;
	
	header("Location: bank.php");
}

// if mod is bank and act is edit
elseif ($module == 'bank' && $act == 'edit')
{
	
	$bankID = $_GET['bankID'];
	
	// showing up the bank
	$queryBank = "SELECT * FROM as_banks WHERE bankID = '$bankID'";
	$sqlBank = mysqli_query($connect, $queryBank);
	$dataBank = mysqli_fetch_array($sqlBank);
	
	$smarty->assign("bankID", $dataBank['bankID']);
	$smarty->assign("bankName", $dataBank['bankName']);
	$smarty->assign("accountNo", $dataBank['accountNo']);
	$smarty->assign("accountName", $dataBank['accountName']);
	$smarty->assign("branch", $dataBank['branch']);
	$smarty->assign("endBalance", $dataBank['endBalance']);
	$smarty->assign("balance", $dataBank['balance']);
	$smarty->assign("display", $dataBank['display']);
	$smarty->assign("status", $dataBank['status']);
	
	$smarty->assign("metaTitle", "Edit Bank");
}

// if mod is bank and act is update
elseif ($module == 'bank' && $act == 'update')
{
	
	$bankID = $_POST['bankID'];
	$bankName = mysqli_real_escape_string($connect, $_POST['bankName']);
	$accountNo = mysqli_real_escape_string($connect, $_POST['accountNo']);
	$accountName = mysqli_real_escape_string($connect, $_POST['accountName']);
	$branch = mysqli_real_escape_string($connect, $_POST['branch']);
	$balance = mysqli_real_escape_string($connect, $_POST['balance']);
	$status = $_POST['status'];
	$display = $_POST['display'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryBank = "UPDATE as_banks SET	bankName = '$bankName',
										accountNo = '$accountNo',
										accountName = '$accountName',
										branch = '$branch',
										balance = '$balance',
										display = '$display',
										status = '$status',
										modifiedDate = '$modifiedDate',
										modifiedUserID = '$sessUserID'
										WHERE bankID = '$bankID'";
	mysqli_query($connect, $queryBank);
	
	$_SESSION['sessBank'] = 2;
	
	header("Location: bank.php");
}

// if mod is bank and act is delete
elseif ($module == 'bank' && $act == 'delete')
{
	$bankID = $_GET['bankID'];
	
	$queryBank = "DELETE FROM as_banks WHERE bankID = '$bankID'";
	mysqli_query($connect, $queryBank);
	
	$queryBalance = "DELETE FROM as_balances WHERE bankID = '$bankID'";
	mysqli_query($connect, $queryBalance);
	
	$_SESSION['sessBank'] = 3;
	
	header("Location: bank.php");
}

else
{
	// showing up the banks
	$queryBank = "SELECT * FROM as_banks ORDER BY bankName ASC";
	$sqlBank = mysqli_query($connect, $queryBank);
	$numsBank = mysqli_num_rows($sqlBank);
	$smarty->assign("numsBank", $numsBank);
	
	$i = 1;
	while ($dtBank = mysqli_fetch_array($sqlBank))
	{
		if ($dtBank['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		if ($dtBank['display'] == 'Y')
		{
			$display = "Ya";
		}
		else
		{
			$display = "Tidak";
		}
		
		$dataBank[] = array(	'bankID' => $dtBank['bankID'],
								'bankName' => $dtBank['bankName'],
								'accountNo' => $dtBank['accountNo'],
								'accountName' => $dtBank['accountName'],
								'branch' => $dtBank['branch'],
								'balance' => format_rupiah($dtBank['balance']),
								'endBalance' => format_rupiah($dtBank['endBalance']),
								'status' => $status,
								'display' => $display,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataBank", $dataBank);
	
	$smarty->assign("metaTitle", "Manajemen Bank");
	
	$smarty->assign("msg", $_SESSION['sessBank']);
	$_SESSION['sessBank'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
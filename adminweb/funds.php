<?php
include "header.php";
$page = "funds.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

if ($_SESSION['sessLevel'] != '6')
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is fund and act is add
if ($module == 'fund' && $act == 'add')
{
	$queryAccount = "SELECT * FROM as_accounts WHERE status = 'Y' ORDER BY accountName ASC";
	$sqlAccount = mysqli_query($connect, $queryAccount);
	while ($dtAccount = mysqli_fetch_array($sqlAccount))
	{
		$dataAccount[] = array(	'accountID' => $dtAccount['accountID'],
								'accountName' => $dtAccount['accountName'],
								'accountCode' => $dtAccount['accountCode']);
	}
	$smarty->assign("dataAccount", $dataAccount);
	
	// bank
	$queryBank = "SELECT * FROM as_banks WHERE status = 'Y' ORDER BY bankName ASC";
	$sqlBank = mysqli_query($connect, $queryBank);
	while ($dtBank = mysqli_fetch_array($sqlBank))
	{
		$dataBank[] = array(	'bankID' => $dtBank['bankID'],
								'bankName' => $dtBank['bankName'],
								'accountNo' => $dtBank['accountNo'],
								'accountName' => $dtBank['accountName']);
	}
	
	$smarty->assign("dataBank", $dataBank);
	
	$smarty->assign("metaTitle", "Tambah Pengeluaran Biaya");
}

// if mod is fund and act is input
elseif ($module == 'fund' && $act == 'input')
{
	$accountID = $_POST['accountID'];
	$fundDate = $_POST['fundDate'];
	$amount = $_POST['amount'];
	$bankID = $_POST['bankID'];
	$note = mysqli_real_escape_string($connect, $_POST['note']);
	$createdDate = date('Y-m-d H:i:s');
	$activityDate = date('Y-m-d');
	
	// bank
	$queryBank = "SELECT endBalance FROM as_banks WHERE bankID = '$bankID'";
	$sqlBank = mysqli_query($connect, $queryBank);
	$dataBank = mysqli_fetch_array($sqlBank);
	
	$remainingBalance = $dataBank['endBalance'] - $amount;
	
	$queryFund = "INSERT INTO as_funds (	accountID,
											fundDate,
											amount,
											bankID,
											note,
											createdDate,
											createdUserID,
											modifiedDate,
											modifiedUserID)
									VALUES(	'$accountID',
											'$fundDate',
											'$amount',
											'$bankID',
											'$note',
											'$createdDate',
											'$sessUserID',
											'',
											'')";
	$save = mysqli_query($connect, $queryFund);
	
	if ($save)
	{
		$queryAccount = "SELECT accountCode, accountName FROM as_accounts WHERE accountID = '$accountID'";
		$sqlAccount = mysqli_query($connect, $queryAccount);
		$dataAccount = mysqli_fetch_array($sqlAccount);
		
		$text = $dataAccount['accountCode']." - ".$dataAccount['accountName'];
		$description = mysqli_real_escape_string($connect, $text);
		
		$queryActivities = "INSERT INTO as_activities (	activityDate,
														bankID,
														description,
														status,
														total,
														remainingBalance)
												VALUES(	'$activityDate',
														'$bankID',
														'$description',
														'-',
														'$amount',
														'$remainingBalance')";
		mysqli_query($connect, $queryActivities);
		
		// bank
		$queryBank = "UPDATE as_banks SET endBalance=endBalance-$amount WHERE bankID = '$bankID'";
		mysqli_query($connect, $queryBank);
	}
	
	$_SESSION['sessFund'] = 1;
	
	header("Location: funds.php");
}

// if mod is fund and act is edit
elseif ($module == 'fund' && $act == 'edit')
{
	$fundID = $_GET['fundID'];
	
	// showing up the funds
	$queryFund = "SELECT * FROM as_funds WHERE fundID = '$fundID'";
	$sqlFund = mysqli_query($connect, $queryFund);
	$dataFund = mysqli_fetch_array($sqlFund);
	
	$smarty->assign("fundID", $dataFund['fundID']);
	$smarty->assign("accountID", $dataFund['accountID']);
	$smarty->assign("fundDate", $dataFund['fundDate']);
	$smarty->assign("amount", $dataFund['amount']);
	$smarty->assign("bankID", $dataFund['bankID']);
	$smarty->assign("note", $dataFund['note']);
	
	$queryAccount = "SELECT * FROM as_accounts WHERE status = 'Y' ORDER BY accountName ASC";
	$sqlAccount = mysqli_query($connect, $queryAccount);
	while ($dtAccount = mysqli_fetch_array($sqlAccount))
	{
		$dataAccount[] = array(	'accountID' => $dtAccount['accountID'],
								'accountCode' => $dtAccount['accountCode'],
								'accountName' => $dtAccount['accountName']);
	}
	$smarty->assign("dataAccount", $dataAccount);
	
	// bank
	$queryBank = "SELECT * FROM as_banks WHERE status = 'Y' ORDER BY bankName ASC";
	$sqlBank = mysqli_query($connect, $queryBank);
	while ($dtBank = mysqli_fetch_array($sqlBank))
	{
		$dataBank[] = array(	'bankID' => $dtBank['bankID'],
								'bankName' => $dtBank['bankName'],
								'accountNo' => $dtBank['accountNo'],
								'accountName' => $dtBank['accountName'],
								'balance' => $dtBank['endBalance']);
	}
	
	$smarty->assign("dataBank", $dataBank);
	
	// balance
	$queryBalance = "SELECT endBalance FROM as_banks WHERE bankID = '$dataFund[bankID]'";
	$sqlBalance = mysqli_query($connect, $queryBalance);
	$dataBalance = mysqli_fetch_array($sqlBalance);
	
	$smarty->assign("balance", $dataBalance['endBalance']);
	
	$smarty->assign("metaTitle", "Edit Pengeluaran Biaya");
}

// if mod is fund and act is update
elseif ($module == 'fund' && $act == 'update')
{
	$fundID = $_POST['fundID'];
	$accountID = $_POST['accountID'];
	$fundDate = $_POST['fundDate'];
	$amount = $_POST['amount'];
	$oldBank = explode("#", $_POST['oldBankID']);
	$oldBankID = $oldBank[0];
	$oldAccountID = $oldBank[1];
	$oldBalance = $oldBank[2];
	$oldAmount = $_POST['oldAmount'];
	
	$bankID = $_POST['bankID'];
	$note = mysqli_real_escape_string($connect, $_POST['note']);
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryFund = "UPDATE as_funds SET	accountID = '$accountID',
										fundDate = '$fundDate',
										amount = '$amount',
										bankID = '$bankID',
										note = '$note',
										modifiedDate = '$modifiedDate',
										modifiedUserID = '$sessUserID'
										WHERE fundID = '$fundID'";
	$save = mysqli_query($connect, $queryFund);
	
	if ($save)
	{
		$activityDate = date('Y-m-d');
		
		// old account
		$queryOldAccount = "SELECT accountCode, accountName FROM as_accounts WHERE accountID = '$oldAccountID'";
		$sqlOldAccount = mysqli_query($connect, $queryOldAccount);
		$dataOldAccount = mysqli_fetch_array($sqlOldAccount);
		
		$oldText = "CANCEL ". $dataOldAccount['accountCode']." - ".$dataOldAccount['accountName'];
		$oldDescription = mysqli_real_escape_string($connect, $oldText);
		
		$oldRemainBalance = $oldBalance + $oldAmount;
		
		$queryOldActivities = "INSERT INTO as_activities (	activityDate,
															bankID,
															description,
															status,
															total,
															remainingBalance)
													VALUES(	'$activityDate',
															'$oldBankID',
															'$oldDescription',
															'+',
															'$oldAmount',
															'$oldRemainBalance')";
		$save1 = mysqli_query($connect, $queryOldActivities);
		
		$queryOldBank = "UPDATE as_banks SET endBalance=endBalance+$oldAmount WHERE bankID = '$oldBankID'";
		$save2 = mysqli_query($connect, $queryOldBank);
		
		if ($save2)
		{
			// bank
			$queryNowBank = "SELECT endBalance FROM as_banks WHERE bankID = '$bankID'";
			$sqlNowBank = mysqli_query($connect, $queryNowBank);
			$dataNowBank = mysqli_fetch_array($sqlNowBank);
			
			$balance = $dataNowBank['endBalance'];
			
			// now account
			$queryAccount = "SELECT accountCode, accountName FROM as_accounts WHERE accountID = '$accountID'";
			$sqlAccount = mysqli_query($connect, $queryAccount);
			$dataAccount = mysqli_fetch_array($sqlAccount);
			
			$text = "KOREKSI ".$dataAccount['accountCode']." - ".$dataAccount['accountName'];
			$description = mysqli_real_escape_string($connect, $text);
			
			$remainingBalance = $balance - $amount;
			
			$queryActivities = "INSERT INTO as_activities (	activityDate,
															bankID,
															description,
															status,
															total,
															remainingBalance)
													VALUES(	'$activityDate',
															'$bankID',
															'$description',
															'-',
															'$amount',
															'$remainingBalance')";
			mysqli_query($connect, $queryActivities);
			
			$queryBank = "UPDATE as_banks SET endBalance=endBalance-$amount WHERE bankID = '$bankID'";
			mysqli_query($connect, $queryBank);
		}
	}
	
	$_SESSION['sessFund'] = 2;
	
	header("Location: funds.php");
}

// if mod is fund and act is delete
elseif ($module == 'fund' && $act == 'delete')
{
	$fundID = $_GET['fundID'];
	$activityDate = date('Y-m-d');
	
	$queryFund = "SELECT * FROM as_funds WHERE fundID = '$fundID'";
	$sqlFund = mysqli_query($connect, $queryFund);
	$dataFund = mysqli_fetch_array($sqlFund);
	
	// bank
	$queryBank = "SELECT endBalance FROM as_banks WHERE bankID = '$dataFund[bankID]'";
	$sqlBank = mysqli_query($connect, $queryBank);
	$dataBank = mysqli_fetch_array($sqlBank);
	
	// account
	$queryAccount = "SELECT accountCode, accountName FROM as_accounts WHERE accountID = '$dataFund[accountID]'";
	$sqlAccount = mysqli_query($connect, $queryAccount);
	$dataAccount = mysqli_fetch_array($sqlAccount);
	
	$text = "CANCEL ".$dataAccount['accountCode']." - ".$dataAccount['accountName'];
	$description = mysqli_real_escape_string($connect, $text);
	
	$remainingBalance = $dataBank['endBalance'] + $dataFund['amount'];
	
	$queryActivity = "INSERT INTO as_activities (	activityDate,
													bankID,
													description,
													status,
													total,
													remainingBalance)
											VALUES(	'$activityDate',
													'$dataFund[bankID]',
													'$description',
													'+',
													'$dataFund[amount]',
													'$remainingBalance')";
	$success = mysqli_query($connect, $queryActivity);
	
	if ($success)
	{
		$amount = $dataFund['amount'];
		$queryUpdate = "UPDATE as_banks SET endBalance=endBalance+$amount WHERE bankID = '$dataFund[bankID]'";
		mysqli_query($connect, $queryUpdate);	
		
		$queryFund = "DELETE FROM as_funds WHERE fundID = '$fundID'";
		mysqli_query($connect, $queryFund);
	}
	
	$_SESSION['sessFund'] = 3;
	
	header("Location: funds.php");
}

elseif ($module == 'fund' && $act == 'search')
{
	$startDate = $_GET['startDate'];
	$endDate = $_GET['endDate'];
	$smarty->assign("startDate", $startDate);
	$smarty->assign("endDate", $endDate);
	
	// showing up the fund search
	$p = new PagingFundSearch;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the fund
	$queryFund = "SELECT * FROM as_funds WHERE fundDate BETWEEN '$startDate' AND '$endDate' ORDER BY createdDate ASC LIMIT $posisi,$batas";
	$sqlFund = mysqli_query($connect, $queryFund);
	
	$i = 1;
	while ($dtFund = mysqli_fetch_array($sqlFund))
	{
		$queryAccount = "SELECT accountName, accountCode FROM as_accounts WHERE accountID = '$dtFund[accountID]'";
		$sqlAccount = mysqli_query($connect, $queryAccount);
		$dataAccount = mysqli_fetch_array($sqlAccount);
		
		// bank
		$queryBank = "SELECT bankName, accountNo, accountName FROM as_banks WHERE bankID = '$dtFund[bankID]'";
		$sqlBank = mysqli_query($connect, $queryBank);
		$dataBank = mysqli_fetch_array($sqlBank);
		
		$dataFund[] = array(	'fundID' => $dtFund['fundID'],
								'fundDate' => tgl_indo2($dtFund['fundDate']),
								'accountCode' => $dataAccount['accountCode'],
								'accountName' => $dataAccount['accountName'],
								'amount' => format_rupiah($dtFund['amount']),
								'bankName' => $dataBank['bankName'],
								'accountNo' => $dataBank['accountNo'],
								'ac' => $dataBank['accountName'],
								'note' => $dtFund['note'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataFund", $dataFund);
	
	$queryJmlData = "SELECT * FROM as_funds WHERE fundDate BETWEEN '$startDate' AND '$endDate'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsFund", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Pengeluaran Biaya");
}

else
{
	// showing up the fund
	$queryFund = "SELECT * FROM as_funds ORDER BY fundDate DESC LIMIT 10";
	$sqlFund = mysqli_query($connect, $queryFund);
	
	$i = 1;
	while ($dtFund = mysqli_fetch_array($sqlFund))
	{
		$queryAccount = "SELECT accountName, accountCode FROM as_accounts WHERE accountID = '$dtFund[accountID]'";
		$sqlAccount = mysqli_query($connect, $queryAccount);
		$dataAccount = mysqli_fetch_array($sqlAccount);
		
		// bank
		$queryBank = "SELECT bankName, accountNo, accountName FROM as_banks WHERE bankID = '$dtFund[bankID]'";
		$sqlBank = mysqli_query($connect, $queryBank);
		$dataBank = mysqli_fetch_array($sqlBank);
		
		$dataFund[] = array(	'fundID' => $dtFund['fundID'],
								'fundDate' => tgl_indo2($dtFund['fundDate']),
								'accountCode' => $dataAccount['accountCode'],
								'accountName' => $dataAccount['accountName'],
								'amount' => format_rupiah($dtFund['amount']),
								'bankName' => $dataBank['bankName'],
								'accountNo' => $dataBank['accountNo'],
								'ac' => $dataBank['accountName'],
								'note' => $dtFund['note'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataFund", $dataFund);
	
	$smarty->assign("metaTitle", "Pengeluaran Biaya");
	
	$smarty->assign("msg", $_SESSION['sessFund']);
	$_SESSION['sessFund'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
<?php
// include header
include "header.php";
// set the tpl page
$page = "list_debts_payment.tpl";

$module = $_GET['module'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

if ($_SESSION['sessLevel'] != '1')
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

else 
{
	if ($module == 'list' && $act == 'detail')
	{
		$paymentID = mysqli_real_escape_string($connect, $_GET['paymentID']);
		$paymentNo = mysqli_real_escape_string($connect, $_GET['paymentNo']);
		
		$queryPayment = "SELECT * FROM as_debt_payments WHERE paymentID = '$paymentID' AND paymentNo = '$paymentNo'";
		$sqlPayment = mysqli_query($connect, $queryPayment);
		$dataPayment = mysqli_fetch_array($sqlPayment);
		
		// bank 
		$queryBank = "SELECT * FROM as_banks WHERE bankID = '$dataPayment[bankID]'";
		$sqlBank = mysqli_query($connect, $queryBank);
		$dataBank = mysqli_fetch_array($sqlBank);
		
		// supplier
		$querySupplier = "SELECT supplierName FROM as_suppliers WHERE supplierID = '$dataPayment[supplierID]'";
		$sqlSupplier = mysqli_query($connect, $querySupplier);
		$dataSupplier = mysqli_fetch_array($sqlSupplier);
		
		$smarty->assign("paymentID", $dataPayment['paymentID']);
		$smarty->assign("paymentNo", $dataPayment['paymentNo']);
		$smarty->assign("paymentDate", tgl_indo2($dataPayment['paymentDate']));
		$smarty->assign("bankName", $dataBank['bankName']);
		$smarty->assign("accountNo", $dataBank['accountNo']);
		$smarty->assign("accountName", $dataBank['accountName']);
		$smarty->assign("total", format_rupiah($dataPayment['total']));
		$smarty->assign("supplierName", $dataSupplier['supplierName']);
		$smarty->assign("ref", $dataPayment['ref']);
		$smarty->assign("note", $dataPayment['note']);
		
		$i = 1;
		$queryDetail = "SELECT * FROM as_debt_payments A INNER JOIN as_detail_debt_payments B ON A.paymentID = B.paymentID
					WHERE A.paymentID = '$paymentID' AND A.paymentNo = '$paymentNo' ORDER BY A.createdDate ASC";
		$sqlDetail = mysqli_query($connect, $queryDetail);
		while ($dtDetail = mysqli_fetch_array($sqlDetail))
		{
			$queryDebt = "SELECT invoiceID, invoiceSupplier, expiryDate, grandtotal, incomingTotal FROM as_debts WHERE invoiceID = '$dtDetail[invoiceNo]'";
			$sqlDebt = mysqli_query($connect, $queryDebt);
			$dataDebt = mysqli_fetch_array($sqlDebt);
			
			$sisa = $dataDebt['grandtotal'] - $dataDebt['incomingTotal'];
			
			$dataDetail[] = array(	'paymentID' => $dtDetail['paymentID'],
									'paymentNo' => $dtDetail['paymentNo'],
									'invoiceNo' => $dtDetail['invoiceNo'],
									'invoiceSupplier' => $dataDebt['invoiceSupplier'],
									'paymentDate' => tgl_indo2($dtDetail['paymentDate']),
									'debtExpireDate' => tgl_indo2($dataDebt['expiryDate']),
									'debtTotal' => format_rupiah($dataDebt['grandtotal']),
									'sisa' => format_rupiah($sisa),
									'total' => format_rupiah($dtDetail['total']),
									'ref' => $dtDetail['ref'],
									'no' => $i);
			
			$i++;
		}
		
		// assign to the tpl
		$smarty->assign("dataDetail", $dataDetail);
		
		$smarty->assign("metaTitle", "Data Pembayaran Hutang");
		$smarty->assign("breadcumbTitle", "Data Pembayaran Hutang");
		$smarty->assign("breadcumbTitleSmall", "Halaman untuk menampilkan data pembayaran hutang kepada supplier.");
		$smarty->assign("breadcumbMenuName", "Data Pembayaran");
		$smarty->assign("breadcumbMenuSubName", "Hutang");
	}

	// delete
	elseif ($module == 'list' && $act == 'delete')
	{
		$paymentID = mysqli_real_escape_string($connect, $_GET['paymentID']);
		$paymentNo = mysqli_real_escape_string($connect, $_GET['paymentNo']);
		
		$queryDetailPayment = "SELECT * FROM as_detail_debt_payments WHERE paymentID = '$paymentID' AND paymentNo = '$paymentNo'";
		$sqlDetailPayment = mysqli_query($connect, $queryDetailPayment);
		$numsDetailPayment = mysqli_num_rows($sqlDetailPayment);
		
		if ($numsDetailPayment == '0')
		{
			echo "Data tidak ditemukan";
			exit();
		}
		
		while ($dataDetailPayment = mysqli_fetch_array($sqlDetailPayment))
		{
			$total = $dataDetailPayment['total'];
			
			$queryDebt = "UPDATE as_debts SET incomingTotal=incomingTotal-$total WHERE invoiceID = '$dataDetailPayment[invoiceNo]'";
			$save = mysqli_query($connect, $queryDebt);
			
			if ($save)
			{
				$queryRec = "SELECT grandtotal, incomingTotal FROM as_debts WHERE invoiceID = '$dataDetailPayment[invoiceNo]'";
				$sqlRec = mysqli_query($connect, $queryRec);
				$dataRec = mysqli_fetch_array($sqlRec);
				
				if ($dataRec['grandtotal'] > $dataRec['incomingTotal'])
				{
					$queryUpdate = "UPDATE as_debts SET status = '1' WHERE invoiceID = '$dataDetailPayment[invoiceNo]'";
					mysqli_query($connect, $queryUpdate);
				}
			}
		} 
		
		// return to Bank
		$queryDebtPayment = "SELECT bankID, total FROM as_debt_payments WHERE paymentID = '$paymentID' AND paymentNo = '$paymentNo'";
		$sqlDebtPayment = mysqli_query($connect, $queryDebtPayment);
		$dataDebtPayment = mysqli_fetch_array($sqlDebtPayment);
		
		// bank
		$queryBank = "SELECT endBalance FROM as_banks WHERE bankID = '$dataDebtPayment[bankID]'";
		$sqlBank = mysqli_query($connect, $queryBank);
		$dataBank = mysqli_fetch_array($sqlBank);
		
		// update balance
		$total = $dataDebtPayment['total'];
		$remainingBalance = $total + $dataBank['endBalance'];
		$queryBalance = "UPDATE as_banks SET endBalance=endBalance+$total WHERE bankID = '$dataDebtPayment[bankID]'";
		mysqli_query($connect, $queryBalance);
		
		// activities
		$activityDate = date('Y-m-d');
		$description = "CANCEL PEMBAYARAN HUTANG NO PAYMENT #".$paymentNo;
		$queryActivity = "INSERT INTO as_activities (	activityDate,
														bankID,
														description,
														status,
														total,
														remainingBalance)
												VALUES(	'$activityDate',
														'$dataDebtPayment[bankID]',
														'$description',
														'+',
														'$total',
														'$remainingBalance')";
		mysqli_query($connect, $queryActivity);
		
		$queryDeleteDebt = "DELETE FROM as_debt_payments WHERE paymentID = '$paymentID' AND paymentNo = '$paymentNo'";
		$success = mysqli_query($connect, $queryDeleteDebt);
		
		if ($success)
		{
			$queryDelDetail = "DELETE FROM as_detail_debt_payments WHERE paymentID = '$paymentID' AND paymentNo = '$paymentNo'";
			mysqli_query($connect, $queryDelDetail);
		}
		
		header("Location: list_debts_payment.php");
	}
	
	elseif ($module == 'list' && $act == 'search')
	{
		$sDate = explode("-", mysqli_real_escape_string($connect, $_GET['startDate']));
		$startDate = $sDate[2]."-".$sDate[1]."-".$sDate[0];
		$eDate = explode("-", mysqli_real_escape_string($connect, $_GET['endDate']));
		$endDate = $eDate[2]."-".$eDate[1]."-".$eDate[0];
		$paymentNo = mysqli_real_escape_string($connect, $_GET['paymentNo']);
		$supplierID = $_GET['supplierID'];
		
		$smarty->assign("supplierID", $supplierID);
		$smarty->assign("paymentNo", $paymentNo);
		$smarty->assign("startDate", $_GET['startDate']);
		$smarty->assign("endDate", $_GET['endDate']);
		
		// showing up the debts data
		if ($_GET['startDate'] != '' && $_GET['endDate'] != '')
		{
			if ($paymentNo != '' && $supplierID == '')
			{
				$queryList = "SELECT * FROM as_debt_payments WHERE paymentNo LIKE '%$paymentNo%' AND paymentDate BETWEEN '$startDate' AND '$endDate' ORDER BY createdDate DESC";
				$queryCountDebt = "SELECT * FROM as_debt_payments WHERE paymentNo LIKE '%$paymentNo%' AND paymentDate BETWEEN '$startDate' AND '$endDate'";
			}
			elseif ($paymentNo == '' && $supplierID != '')
			{
				$queryList = "SELECT * FROM as_debt_payments WHERE supplierID = '$supplierID' AND paymentDate BETWEEN '$startDate' AND '$endDate' ORDER BY createdDate DESC";
				$queryCountDebt = "SELECT * FROM as_debt_payments WHERE supplierID = '$supplierID' AND paymentDate BETWEEN '$startDate' AND '$endDate'";
			}
			elseif ($paymentNo != '' && $supplierID != '')
			{
				$queryList = "SELECT * FROM as_debt_payments WHERE paymentNo LIKE '%$paymentNo%' AND supplierID = '$supplierID' AND paymentDate BETWEEN '$startDate' AND '$endDate' ORDER BY createdDate DESC";
				$queryCountDebt = "SELECT * FROM as_debt_payments WHERE paymentNo LIKE '%$paymentNo%' AND supplierID = '$supplierID' AND paymentDate BETWEEN '$startDate' AND '$endDate'";
			}
			else
			{
				$queryList = "SELECT * FROM as_debt_payments WHERE paymentDate BETWEEN '$startDate' AND '$endDate' ORDER BY createdDate DESC";
				$queryCountDebt = "SELECT * FROM as_debt_payments WHERE paymentDate BETWEEN '$startDate' AND '$endDate'";
			}
		}
		else
		{
			if ($paymentNo != '' && $supplierID == '')
			{
				$queryList = "SELECT * FROM as_debt_payments WHERE paymentNo LIKE '%$paymentNo%' ORDER BY createdDate DESC";
				$queryCountDebt = "SELECT * FROM as_debt_payments WHERE paymentNo LIKE '%$paymentNo%'";
			}
			elseif ($paymentNo == '' && $supplierID != '')
			{
				$queryList = "SELECT * FROM as_debt_payments WHERE supplierID = '$supplierID' ORDER BY createdDate DESC";
				$queryCountDebt = "SELECT * FROM as_debt_payments WHERE supplierID = '$supplierID'";
			}
			elseif ($paymentNo != '' && $supplierID != '')
			{
				$queryList = "SELECT * FROM as_debt_payments WHERE paymentNo LIKE '%$paymentNo%' AND supplierID = '$supplierID' ORDER BY createdDate DESC";
				$queryCountDebt = "SELECT * FROM as_debt_payments WHERE paymentNo LIKE '%$paymentNo%' AND supplierID = '$supplierID'";
			}
			else
			{
				$queryList = "SELECT * FROM as_debt_payments ORDER BY createdDate DESC";
				$queryCountDebt = "SELECT * FROM as_debt_payments";
			}
		}
		
		$sqlList = mysqli_query($connect, $queryList);
		
		// fetch data
		$i = 1;
		while ($dtList = mysqli_fetch_array($sqlList))
		{
			// supplier
			$querySupp = "SELECT supplierName FROM as_suppliers WHERE supplierID = '$dtList[supplierID]'";
			$sqlSupp = mysqli_query($connect, $querySupp);
			$dataSupp = mysqli_fetch_array($sqlSupp);
			
			// bank
			$queryBank = "SELECT * FROM as_banks WHERE bankID = '$dtList[bankID]'";
			$sqlBank = mysqli_query($connect, $queryBank);
			$dataBank = mysqli_fetch_array($sqlBank);
			
			$dataList[] = array(	'paymentID' => $dtList['paymentID'],
									'paymentNo' => $dtList['paymentNo'],
									'paymentDate' => tgl_indo2($dtList['paymentDate']),
									'total' => format_rupiah($dtList['total']),
									'supplierName' => $dataSupp['supplierName'],
									'bankName' => $dataBank['bankName'],
									'accountNo' => $dataBank['accountNo'],
									'accountName' => $dataBank['accountName'],
									'ref' => $dtList['ref'],
									'note' => $dtList['note'],
									'no' => $i);
			$i++;
		}
		
		$smarty->assign("dataList", $dataList);
		
		$smarty->assign("metaTitle", "Data Pembayaran Hutang");
		$smarty->assign("breadcumbTitle", "Data Pembayaran Hutang");
		$smarty->assign("breadcumbTitleSmall", "Halaman untuk menampilkan data pembayaran hutang kepada supplier.");
		$smarty->assign("breadcumbMenuName", "Data Pembayaran");
		$smarty->assign("breadcumbMenuSubName", "Hutang");
		
		// show the supplier data
		$querySupplier = "SELECT * FROM as_suppliers WHERE status = 'Y' ORDER BY supplierName ASC";
		$sqlSupplier = mysqli_query($connect, $querySupplier);
		
		while ($dtSupplier = mysqli_fetch_array($sqlSupplier))
		{
			$dataSupplier[] = array('supplierID' => $dtSupplier['supplierID'],
									'supplierName' => $dtSupplier['supplierName']);
		}
		
		$smarty->assign("dataSupplier", $dataSupplier);
	}
	
	else
	{
		$smarty->assign("startDate", date('d-m-Y'));
		$smarty->assign("endDate", date('d-m-Y'));
		
		// show the supplier data
		$querySupplier = "SELECT * FROM as_suppliers WHERE status = 'Y' ORDER BY supplierName ASC";
		$sqlSupplier = mysqli_query($connect, $querySupplier);
		
		while ($dtSupplier = mysqli_fetch_array($sqlSupplier))
		{
			$dataSupplier[] = array('supplierID' => $dtSupplier['supplierID'],
									'supplierName' => $dtSupplier['supplierName']);
		}
		
		$smarty->assign("dataSupplier", $dataSupplier);
		
		// showing up the debts payment
		$queryList = "SELECT * FROM as_debt_payments ORDER BY createdDate DESC LIMIT 20";
		$sqlList = mysqli_query($connect, $queryList);
		
		// fetch data
		$i = 1;
		while ($dtList = mysqli_fetch_array($sqlList))
		{
			// supplier
			$querySupp = "SELECT supplierName FROM as_suppliers WHERE supplierID = '$dtList[supplierID]'";
			$sqlSupp = mysqli_query($connect, $querySupp);
			$dataSupp = mysqli_fetch_array($sqlSupp);
			
			// bank
			$queryBank = "SELECT * FROM as_banks WHERE bankID = '$dtList[bankID]'";
			$sqlBank = mysqli_query($connect, $queryBank);
			$dataBank = mysqli_fetch_array($sqlBank);
			
			$dataList[] = array(	'paymentID' => $dtList['paymentID'],
									'paymentNo' => $dtList['paymentNo'],
									'paymentDate' => tgl_indo2($dtList['paymentDate']),
									'total' => format_rupiah($dtList['total']),
									'supplierName' => $dataSupp['supplierName'],
									'bankName' => $dataBank['bankName'],
									'accountNo' => $dataBank['accountNo'],
									'accountName' => $dataBank['accountName'],
									'ref' => $dtList['ref'],
									'note' => $dtList['note'],
									'no' => $i);
			$i++;
		}
		
		$smarty->assign("dataList", $dataList);
		
		$smarty->assign("metaTitle", "Data Pembayaran Hutang");
		$smarty->assign("breadcumbTitle", "Data Pembayaran Hutang");
		$smarty->assign("breadcumbTitleSmall", "Halaman untuk menampilkan data pembayaran hutang kepada supplier.");
		$smarty->assign("breadcumbMenuName", "Data Pembayaran");
		$smarty->assign("breadcumbMenuSubName", "Hutang");
	}

	$smarty->assign("module", $module);
	$smarty->assign("act", $act);
}

// include footer
include "footer.php";
?>
<?php
include "header.php";
$page = "confirm.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}


if ($module == 'confirm' && $act == 'detail')
{
	$confirmID = mysqli_real_escape_string($connect, $_GET['confirmID']);
	
	$queryConfirm = "SELECT * FROM as_confirms WHERE confirmID = '$confirmID'";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	$dataConfirm = mysqli_fetch_array($sqlConfirm);
	
	$queryOrder = "SELECT orderID FROM as_orders WHERE invoiceID = '$dataConfirm[invoiceID]'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	$smarty->assign("confirmID", $dataConfirm['confirmID']);
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataConfirm['invoiceID']);
	$smarty->assign("bankTo", $dataConfirm['bankTo']);
	$smarty->assign("transferDate", tgl_indo2($dataConfirm['transferDate']));
	$smarty->assign("amount", format_rupiah($dataConfirm['amount']));
	$smarty->assign("image", $dataConfirm['image']);
	$smarty->assign("note", $dataConfirm['note']);
	
	$smarty->assign("metaTitle", "Konfirmasi Pembayaran");
}

elseif ($module == 'confirm' && $act == 'search')
{
	$startDate = mysqli_real_escape_string($connect, $_GET['startDate']);
	$endDate = mysqli_real_escape_string($connect, $_GET['endDate']);
	
	$smarty->assign("startDate", $startDate);
	$smarty->assign("endDate", $endDate);
	
	// showing up the confirm payment search
	$p = new PagingConfirmPaymentSearch;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the confirm
	if ($startDate != "" && $endDate != "")
	{
		$queryConfirm = "SELECT * FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1' AND A.transferDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT * FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1' AND A.transferDate BETWEEN '$startDate' AND '$endDate'";
	}
	else
	{
		$queryConfirm = "SELECT * FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1' ORDER BY A.createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT * FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1'";
	}
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	
	$i = 1;
	while ($dtConfirm = mysqli_fetch_array($sqlConfirm))
	{
		$queryOrder = "SELECT orderID FROM as_orders WHERE invoiceID = '$dtConfirm[invoiceID]'";
		$sqlOrder = mysqli_query($connect, $queryOrder);
		$dataOrder = mysqli_fetch_array($sqlOrder);
		
		$dataConfirm[] = array(	'confirmID' => $dtConfirm['confirmID'],
								'invoiceID' => $dtConfirm['invoiceID'],
								'orderID' => $dataOrder['orderID'],
								'bankTo' => $dtConfirm['bankTo'],
								'transferDate' => tgl_indo2($dtConfirm['transferDate']),
								'amount' => format_rupiah($dtConfirm['amount']),
								'image' => $dtConfirm['image'],
								'note' => $dtConfirm['note'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataConfirm", $dataConfirm);
	
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsConfirm", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Konfirmasi Pembayaran");
}

else
{
	$smarty->assign("startDate", date('Y-m-d'));
	$smarty->assign("endDate", date('Y-m-d'));
	
	// showing up the confirm payment
	$p = new PagingConfirmPayment;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the confirm
	$queryConfirm = "SELECT * FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1' ORDER BY A.createdDate DESC LIMIT $posisi,$batas";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	
	$i = 1;
	while ($dtConfirm = mysqli_fetch_array($sqlConfirm))
	{
		$queryOrder = "SELECT orderID FROM as_orders WHERE invoiceID = '$dtConfirm[invoiceID]'";
		$sqlOrder = mysqli_query($connect, $queryOrder);
		$dataOrder = mysqli_fetch_array($sqlOrder);
		
		$dataConfirm[] = array(	'confirmID' => $dtConfirm['confirmID'],
								'invoiceID' => $dtConfirm['invoiceID'],
								'orderID' => $dataOrder['orderID'],
								'bankTo' => $dtConfirm['bankTo'],
								'transferDate' => tgl_indo2($dtConfirm['transferDate']),
								'amount' => format_rupiah($dtConfirm['amount']),
								'image' => $dtConfirm['image'],
								'note' => $dtConfirm['note'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataConfirm", $dataConfirm);
	
	$queryJmlData = "SELECT * FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsConfirm", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Konfirmasi Pembayaran");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
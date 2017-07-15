<?php
include "header.php";
$page = "report.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}


if ($module == 'report' && $act == 'search')
{
	$startDate = mysqli_real_escape_string($connect, $_GET['startDate']);
	$endDate = mysqli_real_escape_string($connect, $_GET['endDate']);
	
	$smarty->assign("startDate", $startDate);
	$smarty->assign("endDate", $endDate);
	
	$queryReport = "SELECT A.orderID, A.invoiceID, A.invoiceDate, A.shippingTotal, A.insurance, A.coupon, A.grandtotal, B.receivedName, A.subtotal, B.memberID, B.customerID, A.status FROM as_orders A INNER JOIN as_customers B ON A.customerID = B.customerID WHERE A.status = '4' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' OR A.status = '6' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.invoiceDate DESC LIMIT 100";
	$sqlReport = mysqli_query($connect, $queryReport);
	$i = 1;
	while ($dtReport = mysqli_fetch_array($sqlReport))
	{
		$queryMember = "SELECT firstName, lastName FROM as_members WHERE memberID = '$dtReport[memberID]'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		
		if ($dtReport['status'] == '4')
		{
			$status = "Online";
		}
		else
		{
			$status = "Penjualan Langsung";
		}
		
		$queryOrderDetail = "SELECT SUM(subtotalModal) as modal FROM as_order_details WHERE orderID = '$dtReport[orderID]' AND invoiceID = '$dtReport[invoiceID]'";
		$sqlOrderDetail = mysqli_query($connect, $queryOrderDetail);
		$dataOrderDetail = mysqli_fetch_array($sqlOrderDetail);
		
		$profit = $dtReport['grandtotal'] - ($dtReport['shippingTotal'] + $dtReport['insurance'] + $dataOrderDetail['modal']);
		
		$dataReport[] = array(	'orderID' => $dtReport['orderID'],
								'invoiceID' => $dtReport['invoiceID'],
								'invoiceDate' => tgl_indo2($dtReport['invoiceDate']),
								'receivedName' => $dtReport['receivedName'],
								'status' => $dtReport['status'],
								'statusAlias' => $status,
								'memberName' => $dataMember['firstName']." ".$dataMember['lastName'],
								'subtotal' => format_rupiah($dtReport['subtotal']),
								'shippingTotal' => format_rupiah($dtReport['shippingTotal']),
								'grandtotal' => format_rupiah($dtReport['grandtotal']),
								'profit' => format_rupiah($profit),
								'modal' => format_rupiah($dataOrderDetail['modal']), 
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataReport", $dataReport);
	
	$smarty->assign("metaTitle", "Laporan Penjualan");
}

else
{
	$smarty->assign("startDate", date('Y-m-d'));
	$smarty->assign("endDate", date('Y-m-d'));
	
	$smarty->assign("metaTitle", "Laporan penjualan");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
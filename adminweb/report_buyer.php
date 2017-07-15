<?php
include "header.php";
$page = "report_buyer.tpl";

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
	
	if ($startDate != "" && $endDate != "")
	{
		$queryReport = "SELECT SUM(B.qty) as total, SUM(A.subtotal) as subtotal, SUM(A.shippingTotal) as shippingTotal, SUM(A.grandtotal) as grandtotal, D.firstName, D.lastName, D.cityID FROM as_orders A INNER JOIN as_order_details B ON A.orderID = B.orderID 
						INNER JOIN as_customers C ON A.customerID = C.customerID
						INNER JOIN as_members D ON C.memberID = D.memberID
						WHERE A.status = '4' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' GROUP BY C.memberID ORDER BY total DESC LIMIT 100";
	}
	else
	{
		$queryReport = "SELECT SUM(B.qty) as total, SUM(A.subtotal) as subtotal, SUM(A.shippingTotal) as shippingTotal, SUM(A.grandtotal) as grandtotal, D.firstName, D.lastName, D.cityID FROM as_orders A INNER JOIN as_order_details B ON A.orderID = B.orderID 
						INNER JOIN as_customers C ON A.customerID = C.customerID
						INNER JOIN as_members D ON C.memberID = D.memberID
						WHERE A.status = '4' GROUP BY C.memberID ORDER BY total DESC LIMIT 100";
	}
	
	$sqlReport = mysqli_query($connect, $queryReport);
	$i = 1;
	while ($dtReport = mysqli_fetch_array($sqlReport))
	{
		$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dtReport[cityID]'";
		$sqlCity = mysqli_query($connect, $queryCity);
		$dataCity = mysqli_fetch_array($sqlCity);
		
		$dataReport[] = array(	'firstName' => $dtReport['firstName'],
								'lastName' => $dtReport['lastName'],
								'cityName' => $dataCity['cityName'],
								'total' => format_rupiah($dtReport['total']),
								'subtotal' => format_rupiah($dtReport['subtotal']),
								'shippingTotal' => format_rupiah($dtReport['shippingTotal']),
								'grandtotal' => format_rupiah($dtReport['grandtotal']),
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataReport", $dataReport);
	
	$smarty->assign("metaTitle", "Laporan Pembeli Terbanyak");
}

else
{
	$smarty->assign("startDate", date('Y-m-d'));
	$smarty->assign("endDate", date('Y-m-d'));
	$smarty->assign("metaTitle", "Laporan Pembeli Terbanyak");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
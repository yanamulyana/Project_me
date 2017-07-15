<?php
include "header.php";
$page = "report_best_seller.tpl";

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
		$queryReport = "SELECT SUM(A.qty) as total, A.productCode, A.productName, A.ukuran, C.salePrice, C.discountPrice, C.qty as stock 
					FROM as_order_details A INNER JOIN as_orders B ON A.orderID = B.orderID
					INNER JOIN as_products C ON C.productCode = A.productCode
					WHERE B.status = '4' AND B.invoiceDate BETWEEN '$startDate' AND '$endDate' GROUP BY A.productName ORDER BY total DESC LIMIT 100";
	}
	else
	{
		$queryReport = "SELECT SUM(A.qty) as total, A.productCode, A.productName, A.ukuran, C.salePrice, C.discountPrice, C.qty as stock 
					FROM as_order_details A INNER JOIN as_orders B ON A.orderID = B.orderID
					INNER JOIN as_products C ON C.productCode = A.productCode
					WHERE B.status = '4' GROUP BY A.productName ORDER BY total DESC LIMIT 100";
	}
	
	$sqlReport = mysqli_query($connect, $queryReport);
	$i = 1;
	while ($dtReport = mysqli_fetch_array($sqlReport))
	{
		$dataReport[] = array(	'productCode' => $dtReport['productCode'],
								'productName' => $dtReport['productName'],
								'ukuran' => $dtReport['ukuran'],
								// 'volume' => $dtReport['volume'],
								// 'alcohol' => $dtReport['alcohol'],
								'salePrice' => format_rupiah($dtReport['salePrice']),
								'discountPrice' => format_rupiah($dtReport['discountPrice']),
								'qty' => $dtReport['total'],
								'stock' => $dtReport['stock'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataReport", $dataReport);
	
	$smarty->assign("metaTitle", "Laporan Best Seller");
}

else
{
	$smarty->assign("startDate", date('Y-m-d'));
	$smarty->assign("endDate", date('Y-m-d'));
	$smarty->assign("metaTitle", "Laporan Retur Penjualan");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
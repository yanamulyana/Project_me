<?php
include "header.php";
$page = "report_empty_stock.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

if ($module == 'report' && $act == 'search')
{
	$querySupplier = "SELECT * FROM as_suppliers WHERE status = 'Y' ORDER BY supplierName ASC";
	$sqlSupplier = mysqli_query($connect, $querySupplier);
	while ($dtSupplier = mysqli_fetch_array($sqlSupplier))
	{
		$dataSupplier[] = array(	'supplierID' => $dtSupplier['supplierID'],
									'supplierName' => $dtSupplier['supplierName']);
	}
	$smarty->assign("dataSupplier", $dataSupplier);
	
	$supplierID = mysqli_real_escape_string($connect, $_GET['supplierID']);
	$smarty->assign("supplierID", $supplierID);
	
	if ($supplierID == 'A')
	{
		$queryReport = "SELECT * FROM as_products WHERE qty < requirementQty ORDER BY qty ASC";
	}
	else
	{
		$queryReport = "SELECT * FROM as_products WHERE supplierID = '$supplierID' AND qty < requirementQty ORDER BY qty ASC";
	}
	
	$sqlReport = mysqli_query($connect, $queryReport);
	$i = 1;
	while ($dtReport = mysqli_fetch_array($sqlReport))
	{
		$queryRequestOrder = "SELECT SUM(qty) as qty FROM as_request_order WHERE productID = '$dtReport[productID]'";
		$sqlRequestOrder = mysqli_query($connect, $queryRequestOrder);
		$dataRequestOrder = mysqli_fetch_array($sqlRequestOrder);
		
		$request = $dtReport['requirementQty'] - $dtReport['qty'];
		
		$dataReport[] = array(	'productCode' => $dtReport['productCode'],
								'productName' => $dtReport['productName'],
								'ukuran' => $dtReport['ukuran'],
								// 'volume' => $dtReport['volume'],
								// 'alcohol' => $dtReport['alcohol'],
								'buyPrice' => format_rupiah($dtReport['buyPrice']),
								'qty' => $dtReport['qty'],
								'requestStok' => $dataRequestOrder['qty'],
								'requirementQty' => $dtReport['requirementQty'],
								'request' => $request,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataReport", $dataReport);
	
	$smarty->assign("metaTitle", "Laporan Empty Stock");
}

else
{
	$smarty->assign("metaTitle", "Laporan Empty Stock");
	
	$querySupplier = "SELECT * FROM as_suppliers WHERE status = 'Y' ORDER BY supplierName ASC";
	$sqlSupplier = mysqli_query($connect, $querySupplier);
	while ($dtSupplier = mysqli_fetch_array($sqlSupplier))
	{
		$dataSupplier[] = array(	'supplierID' => $dtSupplier['supplierID'],
									'supplierName' => $dtSupplier['supplierName']);
	}
	$smarty->assign("dataSupplier", $dataSupplier);
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
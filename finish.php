<?php
include "header.php";

$module = $_GET['module'];
$act = $_GET['act'];

if ($module == 'order' && $act == 'finish')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	$queryOrder = "UPDATE as_orders SET status = '4' WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$s = mysqli_query($connect, $queryOrder);
	
	if ($s)
	{
		$_SESSION['sessHistoryFinish'] = 1;
		$_SESSION['sessHistoryInvoice'] = $invoiceID;
	}
	else
	{
		$_SESSION['sessHistoryFinish'] = 2;
		$_SESSION['sessHistoryInvoice'] = "";
	}
	
	header("Location: orderhistory-1.html");
}
exit();
?>
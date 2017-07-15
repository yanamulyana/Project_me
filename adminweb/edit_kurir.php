<?php
include "header.php";
$page = "edit_kurir.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

else
{
	if ($module == 'kurir' && $act == 'edit')
	{
		$queryOrder = "SELECT consignment, courierName FROM as_orders WHERE orderID = '$_GET[orderID]' AND invoiceID = '$_GET[invoiceID]'";
		$sqlOrder = mysqli_query($connect, $queryOrder);
		$dataOrder = mysqli_fetch_array($sqlOrder);
		
		$smarty->assign("orderID", $_GET['orderID']);
		$smarty->assign("invoiceID", $_GET['invoiceID']);
		$smarty->assign("consignment", $dataOrder['consignment']);
		$smarty->assign("courierName", $dataOrder['courierName']);
	}
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
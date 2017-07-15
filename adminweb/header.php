<?php
date_default_timezone_set("ASIA/JAKARTA");
session_start();
error_reporting(0);
include "../config/connection.php";
include "../config/fungsi_indotgl.php";
include "../config/class_paging.php";
include "../config/fungsi_seo.php";
include "../config/fungsi_rupiah.php";
include "../config/debug.php";
include "../config/fungsi_random.php";

// include all files are needed
require('../libs/Smarty.class.php');

// create smarty new object
$smarty = new Smarty;

$year = date('Y');

$sessUserID = $_SESSION['sessUserID'];
$sessUsername = $_SESSION['sessUsername'];

$querySessUser = "SELECT fullName, createdDate FROM as_users WHERE userID = '$sessUserID'";
$sqlSessUser = mysqli_query($connect, $querySessUser);
$dataSessUser = mysqli_fetch_array($sqlSessUser);

$registeredDate = explode(" ", $dataSessUser['createdDate']);

$smarty->assign("sessFullName", $dataSessUser['fullName']);
$smarty->assign("sessUserID", $sessUserID);
$smarty->assign("sessUsername", $sessUsername);
$smarty->assign("registeredDate", tgl_indo2($registeredDate[0])." ".$registeredDate[1]);

$sessBInvoiceID = $_SESSION['sessBInvoiceID'];
if ($sessBInvoiceID == "")
{
	$_SESSION['sessBInvoiceID'] = date('ymdhis');
}

$smarty->assign("sessBInvoiceID", $_SESSION['sessBInvoiceID']);

$sessTInvoiceID = $_SESSION['sessTInvoiceID'];
if ($sessTInvoiceID == "")
{
	$_SESSION['sessTInvoiceID'] = date('ymdhis');
}

$smarty->assign("sessTInvoiceID", $_SESSION['sessTInvoiceID']);

$queryNoticeNewOrder = "SELECT A.orderID, A.invoiceID, C.firstName, C.lastName, A.grandtotal FROM as_orders A INNER JOIN as_customers B ON A.customerID = B.customerID
				INNER JOIN as_members C ON C.memberID = B.memberID WHERE A.status = '1'";
$sqlNoticeNewOrder = mysqli_query($connect, $queryNoticeNewOrder);
$numsNoticeNewOrder = mysqli_num_rows($sqlNoticeNewOrder);

while ($dtNoticeNewOrder = mysqli_fetch_array($sqlNoticeNewOrder))
{
	$dataNoticeNewOrder[] = array(	'orderID' => $dtNoticeNewOrder['orderID'],
									'invoiceID' => $dtNoticeNewOrder['invoiceID'],
									'memberName' => $dtNoticeNewOrder['firstName']." ".$dtNoticeNewOrder['lastName'],
									'grandtotal' => format_rupiah($dtNoticeNewOrder['grandtotal']));
}

$smarty->assign("numsNoticeNewOrder", $numsNoticeNewOrder);
$smarty->assign("dataNoticeNewOrder", $dataNoticeNewOrder);

$queryNavConfirm = "SELECT A.confirmID, A.invoiceID, A.bankTo, A.amount FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1' ORDER BY A.createdDate DESC";
$sqlNavConfirm = mysqli_query($connect, $queryNavConfirm);
$numsNavConfirm = mysqli_num_rows($sqlNavConfirm);
while ($dtNavConfirm = mysqli_fetch_array($sqlNavConfirm))
{
	$dataNavConfirm[] = array(	'confirmID' => $dtNavConfirm['confirmID'],
								'invoiceID' => $dtNavConfirm['invoiceID'],
								'bankTo' => $dtNavConfirm['bankTo'],
								'amount' => format_rupiah($dtNavConfirm['amount']));
}

$smarty->assign("dataNavConfirm", $dataNavConfirm);
$smarty->assign("numsNavConfirm", $numsNavConfirm);
?>
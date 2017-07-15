<?php
include "header.php";
$page = "request_order.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

if ($module == 'request' && $act == 'edit')
{
	$requestID = mysqli_real_escape_string($connect, $_GET['requestID']);
	
	$queryRequest = "SELECT * FROM as_request_order WHERE requestID = '$requestID'";
	$sqlRequest = mysqli_query($connect, $queryRequest);
	$dataRequest = mysqli_fetch_array($sqlRequest);
	
	$queryProduct = "SELECT productID, productSeo, productCode, productName FROM as_products WHERE productID = '$dataRequest[productID]'";
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$dataProduct = mysqli_fetch_array($sqlProduct);
	
	$smarty->assign("requestID", $dataRequest['requestID']);
	$smarty->assign("email", $dataRequest['email']);
	$smarty->assign("hp", $dataRequest['hp']);
	$smarty->assign("qty", $dataRequest['qty']);
	$smarty->assign("productCode", $dataProduct['productCode']);
	$smarty->assign("productID", $dataProduct['productID']);
	$smarty->assign("productSeo", $dataProduct['productSeo']);
	$smarty->assign("productName", $dataProduct['productName']);
	$smarty->assign("status", $dataRequest['status']);
	
	$smarty->assign("metaTitle", "Request Qty");
}

elseif ($module == 'request' && $act == 'confirm')
{
	$requestID = mysqli_real_escape_string($connect, $_POST['requestID']);
	$hp = mysqli_real_escape_string($connect, $_POST['hp']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$subject = mysqli_real_escape_string($connect, $_POST['subject']);
	$body = mysqli_real_escape_string($connect, $_POST['message']);
	
	$queryRequest = "UPDATE as_request_order SET subject = '$subject', description = '$body', status = 'Y' WHERE requestID = '$requestID'";
	$sqlRequest = mysqli_query($connect, $queryRequest);
	
	if ($sqlRequest)
	{
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		$headers .= 'From: no-reply (Anaku.com) <no-reply@Anaku.com>' . "\r\n";
		mail($email, $subject, $body, $headers);
	}
	
	$_SESSION['sessRequest'] = 1;
	
	header("Location: request_order.php");
}

elseif ($module == 'request' && $act == 'search')
{
	$startDate = mysqli_real_escape_string($connect, $_GET['startDate']);
	$endDate = mysqli_real_escape_string($connect, $_GET['endDate']);
	
	$smarty->assign("startDate", $startDate);
	$smarty->assign("endDate", $endDate);
	
	$sd = $startDate." 00:00:01";
	$ed = $endDate." 23:59:59";
	
	// showing up the request order search
	$p = new PagingRequestOrderSearch;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the confirm
	if ($startDate != "" && $endDate != "")
	{
		$queryRequest = "SELECT * FROM as_request_order WHERE createdDate BETWEEN '$sd' AND '$ed' ORDER BY createdDate ASC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT * FROM as_request_order WHERE createdDate BETWEEN '$sd' AND '$ed'";
	}
	
	$sqlRequest = mysqli_query($connect, $queryRequest);
	
	$i = 1;
	while ($dtRequest = mysqli_fetch_array($sqlRequest))
	{
		$queryProduct = "SELECT productID, productSeo, productCode, productName FROM as_products WHERE productID = '$dtRequest[productID]'";
		$sqlProduct = mysqli_query($connect, $queryProduct);
		$dataProduct = mysqli_fetch_array($sqlProduct);
		
		$dataRequest[] = array(	'requestID' => $dtRequest['requestID'],
								'email' => $dtRequest['email'],
								'hp' => $dtRequest['hp'],
								'productID' => $dataProduct['productID'],
								'productSeo' => $dataProduct['productSeo'],
								'productCode' => $dataProduct['productCode'],
								'productName' => $dataProduct['productName'],
								'qty' => $dtRequest['qty'],
								'status' => $dtRequest['status'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataRequest", $dataRequest);
	
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsRequest", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Request Qty");
}

// delete
elseif ($module == 'request' && $act == 'delete')
{
	$requestID = mysqli_real_escape_string($connect, $_GET['requestID']);
	
	$queryRequest = "DELETE FROM as_request_order WHERE requestID = '$requestID'";
	mysqli_query($connect, $queryRequest);
	
	header("Location: request_order.php");
}

else
{
	$smarty->assign("startDate", date('Y-m-d'));
	$smarty->assign("endDate", date('Y-m-d'));
	
	// showing up the request order
	$p = new PagingRequestOrder;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the request
	$queryRequest = "SELECT * FROM as_request_order ORDER BY createdDate ASC LIMIT $posisi,$batas";
	$queryJmlData = "SELECT * FROM as_request_order";
	
	$sqlRequest = mysqli_query($connect, $queryRequest);
	
	$i = 1;
	while ($dtRequest = mysqli_fetch_array($sqlRequest))
	{
		$queryProduct = "SELECT productID, productSeo, productCode, productName FROM as_products WHERE productID = '$dtRequest[productID]'";
		$sqlProduct = mysqli_query($connect, $queryProduct);
		$dataProduct = mysqli_fetch_array($sqlProduct);
		
		$dataRequest[] = array(	'requestID' => $dtRequest['requestID'],
								'email' => $dtRequest['email'],
								'hp' => $dtRequest['hp'],
								'productID' => $dataProduct['productID'],
								'productSeo' => $dataProduct['productSeo'],
								'productCode' => $dataProduct['productCode'],
								'productName' => $dataProduct['productName'],
								'qty' => $dtRequest['qty'],
								'status' => $dtRequest['status'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataRequest", $dataRequest);
	
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsRequest", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Request Qty");
	
	$smarty->assign("msg", $_SESSION['sessRequest']);
	$_SESSION['sessRequest'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
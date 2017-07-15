<?php
include "header.php";
$page = "confirm.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'confirm' && $act == 'input')
{
	$invoiceID = explode("|", $_POST['invoiceID']);
	$bankTo = mysqli_real_escape_string($connect, $_POST['bankTo']);
	$transferDate = mysqli_real_escape_string($connect, $_POST['transferDate']);
	$note = mysqli_real_escape_string($connect, $_POST['note']);
	$createdDate = date('Y-m-d H:i:s');
	
	$uploaddir = 'images/confirms/';
	$md5 = md5(date('ymdhis'));
	$file = $uploaddir .$md5."_".date('Ymdhis')."_".basename($_FILES['filename']['name']);
	$file_name = $md5."_".date('Ymdhis')."_".$_FILES['filename']['name'];
	
	move_uploaded_file($_FILES['filename']['tmp_name'], $file);
	
	$queryConfirm = "INSERT INTO as_confirms (	invoiceID,
												bankTo,
												transferDate,
												amount,
												image,
												note,
												createdDate)
										VALUES(	'$invoiceID[0]',
												'$bankTo',
												'$transferDate',
												'$invoiceID[1]',
												'$file_name',
												'$note',
												'$createdDate')";
	mysqli_query($connect, $queryConfirm);
	
	$_SESSION['sessConfirm'] = 1;
	
	header("Location: confirm.html");
}

else
{
	$smarty->assign("msg", $_SESSION['sessConfirm']);
	$_SESSION['sessConfirm'] = "";
	
	$smarty->assign("metaTitle", "Konfirmasi Pembayaran");
	
	$queryBank = "SELECT * FROM as_banks WHERE status = 'Y' AND display = 'Y' ORDER BY bankName ASC";
	$sqlBank = mysqli_query($connect, $queryBank);
	while ($dtBank = mysqli_fetch_array($sqlBank))
	{
		$dataBank[] = array(	'bankName' => $dtBank['bankName'],
								'accountNo' => $dtBank['accountNo'],
								'accountName' => $dtBank['accountName']);
	}
	
	$smarty->assign("dataBank", $dataBank);
	
	$smarty->assign("default", date('Y-m-d'));
	
	// no invoic
	$queryInvoice = "SELECT A.invoiceID, A.grandtotal, A.orderID FROM as_orders A INNER JOIN as_customers B ON A.customerID = B.customerID WHERE B.memberID = '$sessMemberID' AND A.status = '1' ORDER BY invoiceID ASC";
	$sqlInvoice = mysqli_query($connect, $queryInvoice);
	
	while ($dtInvoice = mysqli_fetch_array($sqlInvoice))
	{
		$queryDetail = "SELECT SUM(qty) as qty FROM as_order_details WHERE orderID = '$dtInvoice[orderID]' AND invoiceID = '$dtInvoice[invoiceID]'";
		$sqlDetail = mysqli_query($connect, $queryDetail);
		$dataDetail = mysqli_fetch_array($sqlDetail);
		
		$dataInvoice[] = array(	'invoiceID' => $dtInvoice['invoiceID'],
								'grandtotal' => format_rupiah($dtInvoice['grandtotal']),
								'grand' => $dtInvoice['grandtotal'],
								'qty' => $dataDetail['qty']
								);
	}
	
	$smarty->assign("dataInvoice", $dataInvoice);
	
	$queryOrder = "SELECT A.customerID, A.invoiceID, B.status, B.invoiceDate, B.orderID, B.grandtotal FROM as_customers A INNER JOIN as_orders B ON A.customerID = B.customerID WHERE A.memberID = '$sessMemberID' ORDER BY B.invoiceID DESC LIMIT 5";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$i = 1 + $posisi;
	while ($dtOrder = mysqli_fetch_array($sqlOrder))
	{
		if ($dtOrder['status'] == '1')
		{
			$status = "Dalam Pengajuan";
		}
		elseif ($dtOrder['status'] == '2')
		{
			$status = "Sedang Diproses";
		}
		elseif ($dtOrder['status'] == '3')
		{
			$status = "Sedang Dikirim";
		}
		elseif ($dtOrder['status'] == '4')
		{
			$status = "Terkirim";
		}
		else
		{
			$status = "Transaksi Batal";
		}
		
		$queryTestimonial = "SELECT testimonialID FROM as_testimonials WHERE orderID = '$dtOrder[orderID]' AND status = 'Y'";
		$sqlTestimonial = mysqli_query($connect, $queryTestimonial);
		$numsTestimonial = mysqli_num_rows($sqlTestimonial);
		
		$dataOrder[] = array(	'customerID' => $dtOrder['customerID'],
								'invoiceID' => $dtOrder['invoiceID'],
								'grandtotal' => format_rupiah($dtOrder['grandtotal']),
								'invoiceDate' => tgl_indo2($dtOrder['invoiceDate']),
								'status' => $status,
								'statusori' => $dtOrder['status'],
								'orderID' => $dtOrder['orderID'],
								'numsTestimonial' => $numsTestimonial,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataOrder", $dataOrder);
}

include "footer.php";
?>
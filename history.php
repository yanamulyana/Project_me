<?php
include "header.php";
$page = "history.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessMemberID'] == "" && $_SESSION['sessEmail'] == ""){
	echo "Silahkan login terlebih dahulu ke member Everlastingshoes Anda";
	exit();
}

// if mod is history and act is show
if ($module == 'history' && $act == 'show')
{
	$smarty->assign("sessHistoryFinish", $_SESSION['sessHistoryFinish']);
	$_SESSION['sessHistoryFinish'] = "";
	
	$smarty->assign("sessHistoryInvoice", $_SESSION['sessHistoryInvoice']);
	$_SESSION['sessHistoryInvoice'] = "";
	
	// showing up the history
	$p = new PagingHistory;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryOrder = "SELECT A.customerID, A.invoiceID, B.status, B.invoiceDate, B.orderID, B.grandtotal FROM as_customers A INNER JOIN as_orders B ON A.customerID = B.customerID WHERE A.memberID = '$sessMemberID' ORDER BY B.invoiceID DESC LIMIT $posisi,$batas";
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
	
	$queryJmlData = "SELECT A.customerID FROM as_customers A INNER JOIN as_orders B ON A.customerID = B.customerID WHERE A.memberID = '$sessMemberID'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsOrder", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "History Belanja");
	
	// showing up the new product
	$queryNewProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY createdDate DESC LIMIT 5";
	$sqlNewProduct = mysqli_query($connect, $queryNewProduct);
	
	while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
	{
		$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
									'productName' => $dtNewProduct['productName'],
									'productSeo' => $dtNewProduct['productSeo'],
									'salePrice' => format_rupiah($dtNewProduct['salePrice']),
									'discountPrice' => format_rupiah($dtNewProduct['discountPrice']),
									'image1' => $dtNewProduct['image1']);
	}
	
	$smarty->assign("dataNewProduct", $dataNewProduct);
}

// if mod is history and act is view
elseif ($module == 'history' && $act == 'view')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	
	$queryOrder = "SELECT A.orderID, A.coupon, A.pointTotal, A.serviceName, A.locationName, A.consignment, A.invoiceID, A.invoiceDate, A.status, A.note, A.subtotal, A.courierName, A.shippingTotal, A.weightTotal, A.grandtotal, A.keterangan,
				 B.receivedName, B.address, B.cityName, B.provinceName, B.zipCode, B.phone, B.cellPhone FROM as_orders A INNER JOIN as_customers B ON A.customerID=B.customerID WHERE A.orderID = '$orderID' AND B.memberID = '$sessMemberID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	if ($dataOrder['status'] == '1')
	{
		$status = "Dalam Pengajuan";
	}
	elseif ($dataOrder['status'] == '2')
	{
		$status = "Sedang Diproses";
	}
	elseif ($dataOrder['status'] == '3')
	{
		$status = "Sedang Dikirim";
	}
	elseif ($dataOrder['status'] == '4')
	{
		$status = "Terkirim";
	}
	else
	{
		$status = "Transaksi Batal";
	}
	
	$smarty->assign("statusori", $dataOrder['status']);
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $status);
	$smarty->assign("statusori", $dataOrder['status']);
	$smarty->assign("note", $dataOrder['note']);
	$smarty->assign("subtotal", format_rupiah($dataOrder['subtotal']));
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("serviceName", $dataOrder['serviceName']);
	$smarty->assign("locationName", $dataOrder['locationName']);
	$smarty->assign("shippingTotal", format_rupiah($dataOrder['shippingTotal']));
	$smarty->assign("weightTotal", $dataOrder['weightTotal']);
	$smarty->assign("pointTotal", $dataOrder['pointTotal']);
	$smarty->assign("grandtotal", format_rupiah($dataOrder['grandtotal']));
	$smarty->assign("coupon", format_rupiah($dataOrder['coupon']));
	$smarty->assign("receivedName", $dataOrder['receivedName']);
	$smarty->assign("address", $dataOrder['address']);
	$smarty->assign("cityName", $dataOrder['cityName']);
	$smarty->assign("provinceName", $dataOrder['provinceName']);
	$smarty->assign("zipCode", $dataOrder['zipCode']);
	$smarty->assign("phone", $dataOrder['phone']);
	$smarty->assign("cellPhone", $dataOrder['cellPhone']);
	$smarty->assign("consignment", $dataOrder['consignment']);
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("keterangan", $dataOrder['keterangan']);
	
	// showing up the detail
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$dataOrder[orderID]'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$dataDetail[] = array(	'productCode' => $dtDetail['productCode'],
								'productName' => $dtDetail['productName'],
								'ukuran' => $dtDetail['ukuran'],
								// 'volume' => $dtDetail['volume'],
								// 'alcohol' => $dtDetail['alcohol'],
								'price' => format_rupiah($dtDetail['unitPrice']),
								'qty' => $dtDetail['qty'],
								'subtotal' => format_rupiah($dtDetail['subtotal']),
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataDetail", $dataDetail);
	
	$smarty->assign("metaTitle", "Detail Transaksi");
	
	// showing up the new product
	$queryNewProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY createdDate DESC LIMIT 5";
	$sqlNewProduct = mysqli_query($connect, $queryNewProduct);
	
	while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
	{
		$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
									'productName' => $dtNewProduct['productName'],
									'productSeo' => $dtNewProduct['productSeo'],
									'salePrice' => format_rupiah($dtNewProduct['salePrice']),
									'discountPrice' => format_rupiah($dtNewProduct['discountPrice']),
									'image1' => $dtNewProduct['image1']);
	}
	
	$smarty->assign("dataNewProduct", $dataNewProduct);
	
	// check the testi
	$queryTestimonial = "SELECT * FROM as_testimonials WHERE orderID = '$dataOrder[orderID]'";
	$sqlTestimonial = mysqli_query($connect, $queryTestimonial);
	$dataTestimonial = mysqli_fetch_array($sqlTestimonial);
	$numsTestimonial = mysqli_num_rows($sqlTestimonial);
	
	$created = explode(" ", $dataTestimonial['createdDate']);
	
	$smarty->assign("fullName", $dataTestimonial['fullName']);
	$smarty->assign("testimonial", $dataTestimonial['testimonial']);
	$smarty->assign("createdDate", tgl_indo2($created[0])." ".$created[1]);
	$smarty->assign("numsTestimonial", $numsTestimonial);
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
<?php
include "header.php";
$page = "adm_sales_transactions.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

// if mod is sales and act is add
if ($module == 'sales' && $act == 'add')
{
	$smarty->assign("metaTitle", "Add New Sales");
	if ($_SESSION['sessInvoiceDate'] != "")
	{
		$smarty->assign("invoiceDate", $_SESSION['sessInvoiceDate']);
	}
	else
	{
		$smarty->assign("invoiceDate", date('Y-m-d'));
	}
	
	$sessSInvoiceID = $_SESSION['sessSInvoiceID'];
	if ($sessSInvoiceID == "")
	{
		$_SESSION['sessSInvoiceID'] = date('ymdHis');
	}
	
	$smarty->assign("sessSInvoiceID", $_SESSION['sessSInvoiceID']);
	
	$smarty->assign("sessShippingType", $_SESSION['sessShippingType']);
	$smarty->assign("sessNomorResi", $_SESSION['sessNomorResi']);
	$smarty->assign("sessReceivedName", $_SESSION['sessReceivedName']);
	$smarty->assign("sessAddress", $_SESSION['sessAddress']);
	$smarty->assign("sessZipCode", $_SESSION['sessZipCode']);
	$smarty->assign("sessProvinceID", $_SESSION['sessProvinceID']);
	$smarty->assign("sessCityID", $_SESSION['sessCityID']);
	$smarty->assign("sessCellPhone", $_SESSION['sessCellPhone']);
	$smarty->assign("sessNote", $_SESSION['sessNote']);
	$smarty->assign("sessOngkir", $_SESSION['sessOngkir']);
	$smarty->assign("sessOngkirRp", format_rupiah($_SESSION['sessOngkir']));
	
	// showing up the province
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array(	'provinceID' => $dtProvince['provinceID'],
									'provinceName' => $dtProvince['provinceName']);
	}

	$smarty->assign("dataProvince", $dataProvince);
	
	// showing up the city
	$queryCity = "SELECT * FROM as_cities WHERE provinceID = '$_SESSION[sessProvinceID]' ORDER BY provinceID, cityName ASC";
	$sqlCity = mysqli_query($connect, $queryCity);
	
	while ($dtCity = mysqli_fetch_array($sqlCity))
	{
		$dataCity[] = array(	'cityID' => $dtCity['cityID'],
								'cityName' => $dtCity['cityName']);
	}
	
	$smarty->assign("dataCity", $dataCity);
	
	// showing up the transactions
	$queryOrder = "SELECT * FROM as_order_details WHERE invoiceID = '$_SESSION[sessSInvoiceID]'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$i = 1;
	while ($dtOrder = mysqli_fetch_array($sqlOrder))
	{
		$queryProduct = "SELECT weight FROM as_products WHERE productCode = '$dtOrder[productCode]'";
		$sqlProduct = mysqli_query($connect, $queryProduct);
		$dataProduct = mysqli_fetch_array($sqlProduct);
		
		$weight = $dataProduct['weight'] * $dtOrder['qty'];
		
		$dataOrder[] = array(	'detailID' => $dtOrder['detailID'],
								'productCode' => $dtOrder['productCode'],
								'productName' => $dtOrder['productName'],
								'ukuran' => $dtOrder['ukuran'],
								// 'alcohol' => $dtOrder['alcohol'],
								// 'volume' => $dtOrder['volume'],
								'price' => format_rupiah($dtOrder['unitPrice']),
								'qty' => $dtOrder['qty'],
								'subtotal' => format_rupiah($dtOrder['subtotal']),
								'no' => $i);
		$subtotal += $dtOrder['subtotal'];
		$totalWeight += $weight;
		$i++;
	}
	
	$grandtotal = $subtotal + $_SESSION['sessOngkir'];
	$grandtotalRp = format_rupiah($grandtotal);
	$smarty->assign("subtotalRp", format_rupiah($subtotal));
	$smarty->assign("subtotal", $subtotal);
	$smarty->assign("grandtotal", $grandtotal);
	$smarty->assign("grandtotalRp", format_rupiah($grandtotal));
	$smarty->assign("weight", $totalWeight);
	$smarty->assign("dataOrder", $dataOrder);
}

// if module is sales and act is neworder
elseif ($module == 'sales' && $act == 'neworder')
{
	// showing up the new order
	$p = new PagingNewOrder;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the new order
	$queryNewOrder = "SELECT * FROM as_orders WHERE status = '1' ORDER BY invoiceID DESC LIMIT $posisi,$batas";
	$sqlNewOrder = mysqli_query($connect, $queryNewOrder);
	$i = 1 + $posisi;
	while ($dtNewOrder = mysqli_fetch_array($sqlNewOrder))
	{
		$queryMember = "SELECT A.firstName, A.lastName, A.memberID FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dtNewOrder[customerID]'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		
		$dataNewOrder[] = array(	'orderID' => $dtNewOrder['orderID'],
									'invoiceID' => $dtNewOrder['invoiceID'],
									'invoiceDate' => tgl_indo2($dtNewOrder['invoiceDate']),
									'firstName' => $dataMember['firstName'],
									'lastName' => $dataMember['lastName'],
									'memberID' => $dataMember['memberID'],
									'courierName' => $dtNewOrder['courierName'],
									'grandtotal' => format_rupiah($dtNewOrder['grandtotal']),
									'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataNewOrder", $dataNewOrder);
	
	$queryJmlData = "SELECT * FROM as_orders WHERE status = '1'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsNewOrder", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Pesanan Baru");
	
	$smarty->assign("msg", $_SESSION['sessSales']);
	$_SESSION['sessSales'] = "";
}

// if module is sales and act is live
elseif ($module == 'sales' && $act == 'live')
{
	// showing up the live
	$p = new PagingLive;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the live
	$queryLive = "SELECT * FROM as_orders WHERE status = '6' ORDER BY invoiceID DESC LIMIT $posisi,$batas";
	$sqlLive = mysqli_query($connect, $queryLive);
	$i = 1 + $posisi;
	while ($dtLive = mysqli_fetch_array($sqlLive))
	{
		$queryCustomer = "SELECT receivedName, customerID FROM as_customers WHERE customerID = '$dtLive[customerID]'";
		$sqlCustomer = mysqli_query($connect, $queryCustomer);
		$dataCustomer = mysqli_fetch_array($sqlCustomer);
		
		$dataLive[] = array(	'orderID' => $dtLive['orderID'],
								'invoiceID' => $dtLive['invoiceID'],
								'invoiceDate' => tgl_indo2($dtLive['invoiceDate']),
								'receivedName' => $dataCustomer['receivedName'],
								'customerID' => $dataCustomer['customerID'],
								'courierName' => $dtLive['courierName'],
								'grandtotal' => format_rupiah($dtLive['grandtotal']),
								'printed' => $dtLive['printed'],
								'ongkir' => format_rupiah($dtLive['shippingTotal']),
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataLive", $dataLive);
	
	$queryJmlData = "SELECT * FROM as_orders WHERE status = '6'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsLive", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Penjualan Langsung");
	
	$smarty->assign("msg", $_SESSION['sessSales']);
	$_SESSION['sessSales'] = "";
}

// if module is sales and act is confirm
elseif ($module == 'sales' && $act == 'confirm')
{
	// showing up the confirm
	$p = new PagingConfirm;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the confirm
	$queryConfirm = "SELECT * FROM as_orders WHERE status = '2' ORDER BY invoiceID DESC LIMIT $posisi,$batas";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	$i = 1 + $posisi;
	while ($dtConfirm = mysqli_fetch_array($sqlConfirm))
	{
		$queryMember = "SELECT A.firstName, A.lastName, A.memberID FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dtConfirm[customerID]'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		
		$dataConfirm[] = array(	'orderID' => $dtConfirm['orderID'],
								'invoiceID' => $dtConfirm['invoiceID'],
								'invoiceDate' => tgl_indo2($dtConfirm['invoiceDate']),
								'firstName' => $dataMember['firstName'],
								'lastName' => $dataMember['lastName'],
								'memberID' => $dataMember['memberID'],
								'courierName' => $dtConfirm['courierName'],
								'grandtotal' => format_rupiah($dtConfirm['grandtotal']),
								'printed' => $dtConfirm['printed'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataConfirm", $dataConfirm);
	
	$queryJmlData = "SELECT * FROM as_orders WHERE status = '2'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsConfirm", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Konfirmasi Pengiriman");
	
	$smarty->assign("msg", $_SESSION['sessSales']);
	$_SESSION['sessSales'] = "";
}

// if module is sales and act is sent
elseif ($module == 'sales' && $act == 'sent')
{
	// showing up the sent
	$p = new PagingSent;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the sent
	$querySent = "SELECT * FROM as_orders WHERE status = '3' ORDER BY invoiceID DESC LIMIT $posisi,$batas";
	$sqlSent = mysqli_query($connect, $querySent);
	$i = 1 + $posisi;
	while ($dtSent = mysqli_fetch_array($sqlSent))
	{
		$queryMember = "SELECT A.firstName, A.lastName, A.memberID FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dtSent[customerID]'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		
		$dataSent[] = array(	'orderID' => $dtSent['orderID'],
								'invoiceID' => $dtSent['invoiceID'],
								'invoiceDate' => tgl_indo2($dtSent['invoiceDate']),
								'firstName' => $dataMember['firstName'],
								'lastName' => $dataMember['lastName'],
								'memberID' => $dataMember['memberID'],
								'courierName' => $dtSent['courierName'],
								'consignment' => $dtSent['consignment'],
								'grandtotal' => format_rupiah($dtSent['grandtotal']),
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataSent", $dataSent);
	
	$queryJmlData = "SELECT * FROM as_orders WHERE status = '3'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsSent", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Pesanan Dikirim");
	
	$smarty->assign("msg", $_SESSION['sessSales']);
	$_SESSION['sessSales'] = "";
}

// if module is sales and act is finish
elseif ($module == 'sales' && $act == 'finish')
{
	// showing up the finish
	$p = new PagingFinish;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the finish
	$queryFinish = "SELECT * FROM as_orders WHERE status = '4' ORDER BY invoiceID DESC LIMIT $posisi,$batas";
	$sqlFinish = mysqli_query($connect, $queryFinish);
	$i = 1 + $posisi;
	while ($dtFinish = mysqli_fetch_array($sqlFinish))
	{
		$queryMember = "SELECT A.firstName, A.lastName, A.memberID FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dtFinish[customerID]'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		
		$dataFinish[] = array(	'orderID' => $dtFinish['orderID'],
								'invoiceID' => $dtFinish['invoiceID'],
								'invoiceDate' => tgl_indo2($dtFinish['invoiceDate']),
								'firstName' => $dataMember['firstName'],
								'lastName' => $dataMember['lastName'],
								'memberID' => $dataMember['memberID'],
								'courierName' => $dtFinish['courierName'],
								'consignment' => $dtFinish['consignment'],
								'grandtotal' => format_rupiah($dtFinish['grandtotal']),
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataFinish", $dataFinish);
	
	$queryJmlData = "SELECT * FROM as_orders WHERE status = '4'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsFinish", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Pesanan Selesai");
	
	$smarty->assign("msg", $_SESSION['sessSales']);
	$_SESSION['sessSales'] = "";
}

// if module is sales and act is reject
elseif ($module == 'sales' && $act == 'reject')
{
	// showing up the reject
	$p = new PagingReject;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the reject
	$queryReject = "SELECT * FROM as_orders WHERE status = '5' ORDER BY invoiceID DESC LIMIT $posisi,$batas";
	$sqlReject = mysqli_query($connect, $queryReject);
	$i = 1 + $posisi;
	while ($dtReject = mysqli_fetch_array($sqlReject))
	{
		$queryMember = "SELECT A.firstName, A.lastName, A.memberID FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dtReject[customerID]'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		
		$dataReject[] = array(	'orderID' => $dtReject['orderID'],
								'invoiceID' => $dtReject['invoiceID'],
								'invoiceDate' => tgl_indo2($dtReject['invoiceDate']),
								'firstName' => $dataMember['firstName'],
								'lastName' => $dataMember['lastName'],
								'memberID' => $dataMember['memberID'],
								'courierName' => $dtReject['courierName'],
								'grandtotal' => format_rupiah($dtReject['grandtotal']),
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataReject", $dataReject);
	
	$queryJmlData = "SELECT * FROM as_orders WHERE status = '5'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsReject", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Pesanan Ditolak");
	
	$smarty->assign("msg", $_SESSION['sessSales']);
	$_SESSION['sessSales'] = "";
}

// if module is sales and act is accept
elseif ($module == 'sales' && $act == 'accept')
{
	$orderID = $_POST['orderID'];
	$invoiceID = $_POST['invoiceID'];
	$grandtotal = $_POST['grandtotal'];
	
	// update status
	$queryOrder = "UPDATE as_orders SET status = '2' WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	mysqli_query($connect, $queryOrder);
	
	// update the current stock
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$qty = $dtDetail['qty'];
		
		$queryUpdate = "UPDATE as_products SET qty=qty-$qty, sold=sold+$qty WHERE productCode = '$dtDetail[productCode]'";
		mysqli_query($connect, $queryUpdate);
	}
	
	$queryPoin = "SELECT pointTotal, customerID FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlPoin = mysqli_query($connect, $queryPoin);
	$dataPoin = mysqli_fetch_array($sqlPoin);
	
	$queryMember = "SELECT A.memberID, A.email, A.firstName, A.lastName FROM as_members A INNER JOIN as_customers B ON A.memberID=B.memberID WHERE B.customerID = '$dataPoin[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$email = $dataMember['email'];
	
	$point = $dataPoin['pointTotal'];
	
	$queryMember = "UPDATE as_members SET pointTotal=pointTotal+$point WHERE memberID = '$dataMember[memberID]'";
	mysqli_query($connect, $queryMember);
	
	$_SESSION['sessSales'] = 1;
	
	$subject = "Pesanan Anda telah Dikonfirmasi";
	$host = $_SERVER['HTTP_HOST'];
	$content = 
			"
			<body style='margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;'>
				<center>
				<table style='width: 600px; font-family: arial; text-align: center; font-size: 14px;'>
					<tr>
						<td style='border-bottom: 1px solid #ddd; padding-bottom: 10px;'><br><br>Importir yang bergerak di bidang penjualan produk - produk minuman dari brand ternama.</td>
					</tr>
					<tr>
						<td style='padding-top: 10px;' align='center'>
							<table>
								<tr>
									<td style='width: 60px;'>
										<img src='http://$host/images/logo.png' style='width: 50px;'>
									</td>
									<td>
										<span style='font-size: 18px;'><b>Anaku.Com</b></font>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<br>
				<table style='width: 600px; font-family: arial; font-size: 14px; background: #FFF; padding: 10px;'>
					<tr>
						<td>
							Kepada Yth <b>Customer</b>,<br> <br><br>
							Email ini memberitahukan bahwa pesanan Anda telah dikonfirmasi.<br><br>
							Terima kasih telah berbelanja di Anaku.com.<br><br>
							Untuk melihat status pesanan Anda silahkan masuk ke akun Anaku.com Anda dan klik menu History Belanja.<br><br>
							Best Regards,<br>
							Anaku.com
						</td>
					</tr>
				</table><br>
				<p style='font-family: arial; font-size: 12px; border-bottom: 1px solid #DDD; padding-bottom: 10px;'>Copyright &copy; 2016 Anaku.com. All Right Reserved.<br><br></p>
				<p style='font-family: arial; font-size: 12px;'>
					Mohon jangan balas email ini, karena email ini dikirim secara otomatis oleh sistem<br><br>
				</p>
				</center>
			</body>
			";
			
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$headers .= 'From: Anaku.com <no-reply@Anaku.com>' . "\r\n";

	mail($email, $subject, $content, $headers);
	
	header("Location: adm_sales_transactions.php?mod=sales&act=neworder");
}

// if module is sales and act is reject
elseif ($module == 'sales' && $act == 'rejectinput')
{
	$orderID = mysqli_real_escape_string($connect, $_POST['ordID']);
	$invoiceID = mysqli_real_escape_string($connect, $_POST['invID']);
	$keterangan = mysqli_real_escape_string($connect, $_POST['keterangan']);
	
	$queryPoin = "SELECT pointTotal, customerID FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlPoin = mysqli_query($connect, $queryPoin);
	$dataPoin = mysqli_fetch_array($sqlPoin);
	
	$queryMember = "SELECT A.memberID, A.email, A.firstName, A.lastName FROM as_members A INNER JOIN as_customers B ON A.memberID=B.memberID WHERE B.customerID = '$dataPoin[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$email = $dataMember['email'];
	
	// update status
	$queryOrder = "UPDATE as_orders SET status = '5', keterangan = '$keterangan' WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	mysqli_query($connect, $queryOrder);
	
	$_SESSION['sessSales'] = 2;
	
	$subject = "Pesanan Anda telah Dibatalkan";
	$host = $_SERVER['HTTP_HOST'];
	$content = 
			"
			<body style='margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;'>
				<center>
				<table style='width: 600px; font-family: arial; text-align: center; font-size: 14px;'>
					<tr>
						<td style='border-bottom: 1px solid #ddd; padding-bottom: 10px;'><br><br>Importir yang bergerak di bidang penjualan produk - produk minuman dari brand ternama.</td>
					</tr>
					<tr>
						<td style='padding-top: 10px;' align='center'>
							<table>
								<tr>
									<td style='width: 60px;'>
										<img src='http://$host/images/logo.png' style='width: 50px;'>
									</td>
									<td>
										<span style='font-size: 18px;'><b>Anaku.Com</b></font>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<br>
				<table style='width: 600px; font-family: arial; font-size: 14px; background: #FFF; padding: 10px;'>
					<tr>
						<td>
							Kepada Yth <b>Customer</b>,<br> <br><br>
							Email ini memberitahukan bahwa pesanan Anda telah ditolak / dibatalkan.<br><br>
							Alasan : <b>$keterangan</b><br><br>
							Mungkin Anda tertarik dengan produk kami lainnya, silahkan klik <a href='http://www.Anaku.com'>disini</a>.<br><br>
							Best Regards,<br>
							Anaku.com
						</td>
					</tr>
				</table><br>
				<p style='font-family: arial; font-size: 12px; border-bottom: 1px solid #DDD; padding-bottom: 10px;'>Copyright &copy; 2016 Anaku.com. All Right Reserved.<br><br></p>
				<p style='font-family: arial; font-size: 12px;'>
					Mohon jangan balas email ini, karena email ini dikirim secara otomatis oleh sistem<br><br>
				</p>
				</center>
			</body>
			";
			
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$headers .= 'From: Anaku.com <no-reply@Anaku.com>' . "\r\n";

	mail($email, $subject, $content, $headers);
	
	header("Location: adm_sales_transactions.php?mod=sales&act=neworder");
}

// if module is sales and act is finishorder
elseif ($module == 'sales' && $act == 'finishorder')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	// update status
	$queryOrder = "UPDATE as_orders SET status = '4' WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	mysqli_query($connect, $queryOrder);
	
	// akuntansi
	$queryTotal = "SELECT grandtotal, invoiceID FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlTotal = mysqli_query($connect, $queryTotal);
	$dataTotal = mysqli_fetch_array($sqlTotal);
	
	$random = randomcode();
	$activityDate = date('Y-m-d');
	
	$queryActivity = "INSERT INTO as_activities(sess,
												activityDate,
												description,
												debet,
												credit)
										VALUES(	'$random',
												'$activityDate',
												'Kas',
												'$dataTotal[grandtotal]',
												'0')";
	$save = mysqli_query($connect, $queryActivity);
	
	if ($save)
	{
		$queryActivity2 = "INSERT INTO as_activities(	sess,
														activityDate,
														description,
														debet,
														credit)
												VALUES(	'$random',
														'$activityDate',
														'Penjualan #$dataTotal[invoiceID]',
														'0',
														'$dataTotal[grandtotal]')";
		mysqli_query($connect, $queryActivity2);
	}
	
	$_SESSION['sessSales'] = 4;
	
	$queryPoin = "SELECT customerID FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlPoin = mysqli_query($connect, $queryPoin);
	$dataPoin = mysqli_fetch_array($sqlPoin);
	
	$queryMember = "SELECT A.memberID, A.email, A.firstName, A.lastName FROM as_members A INNER JOIN as_customers B ON A.memberID=B.memberID WHERE B.customerID = '$dataPoin[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$email = $dataMember['email'];
	
	$subject = "Pesanan Anda telah Berhasil Dikirimkan";
	$host = $_SERVER['HTTP_HOST'];
	$content = 
			"
			<body style='margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;'>
				<center>
				<table style='width: 600px; font-family: arial; text-align: center; font-size: 14px;'>
					<tr>
						<td style='border-bottom: 1px solid #ddd; padding-bottom: 10px;'><br><br>Importir yang bergerak di bidang penjualan produk - produk minuman dari brand ternama.</td>
					</tr>
					<tr>
						<td style='padding-top: 10px;' align='center'>
							<table>
								<tr>
									<td style='width: 60px;'>
										<img src='http://$host/images/logo.png' style='width: 50px;'>
									</td>
									<td>
										<span style='font-size: 18px;'><b>Anaku.Com</b></font>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<br>
				<table style='width: 600px; font-family: arial; font-size: 14px; background: #FFF; padding: 10px;'>
					<tr>
						<td>
							Kepada Yth <b>Customer</b>,<br> <br><br>
							Email ini memberitahukan bahwa pesanan Anda dengan nomor Invoice :#$invoiceID telah berhasil dikirimkan sampai tempat tujuan dan telah diterima oleh Anda.<br><br>
							Harap hubungi kami jika informasi ini tidak benar atau tidak sesuai<br><br>
							Best Regards,<br>
							Anaku.com
						</td>
					</tr>
				</table><br>
				<p style='font-family: arial; font-size: 12px; border-bottom: 1px solid #DDD; padding-bottom: 10px;'>Copyright &copy; 2016 Anaku.com. All Right Reserved.<br><br></p>
				<p style='font-family: arial; font-size: 12px;'>
					Mohon jangan balas email ini, karena email ini dikirim secara otomatis oleh sistem<br><br>
				</p>
				</center>
			</body>
			";
			
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$headers .= 'From: Anaku.com <no-reply@Anaku.com>' . "\r\n";

	mail($email, $subject, $content, $headers);
	
	header("Location: adm_sales_transactions.php?mod=sales&act=sent");
}

// if module is sales and act is confirmneworder
elseif ($module == 'sales' && $act == 'confirmneworder')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	$reject = $_GET['reject'];
	$smarty->assign("reject", $reject);
	$smarty->assign("metaTitle", $invoiceID);
	
	// showing up the order detail
	$queryOrder = "SELECT * FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID' AND status = '1'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	$numsOrder = mysqli_num_rows($sqlOrder);
	
	if ($numsOrder == '0')
	{
		$smarty->assign("confirm", 1);
	}
	
	// confirm
	$queryConfirm = "SELECT * FROM as_confirms WHERE invoiceID = '$invoiceID' ORDER BY createdDate DESC LIMIT 1";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	$dataConfirm = mysqli_fetch_array($sqlConfirm);
	
	// confirm
	$smarty->assign("confirmID", $dataConfirm['confirmID']);
	$smarty->assign("bankTo", $dataConfirm['bankTo']);
	$smarty->assign("transferDate", tgl_indo2($dataConfirm['transferDate']));
	$smarty->assign("amount", format_rupiah($dataConfirm['amount']));
	$smarty->assign("image", $dataConfirm['image']);
	$smarty->assign("noteConfirm", $dataConfirm['note']);
	
	$smarty->assign("coupon", format_rupiah($dataOrder['coupon']));
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $dataOrder['status']);
	$smarty->assign("note", $dataOrder['note']);
	$smarty->assign("subtotal", format_rupiah($dataOrder['subtotal']));
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("serviceName", $dataOrder['serviceName']);
	$smarty->assign("locationName", $dataOrder['locationName']);
	$smarty->assign("insurance", $dataOrder['insurance']);
	$smarty->assign("insuranceRp", format_rupiah($dataOrder['insurance']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("shippingTotal", format_rupiah($dataOrder['shippingTotal']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("consignment", $dataOrder['consignment']);
	$smarty->assign("weightTotal", $dataOrder['weightTotal']);
	$smarty->assign("grandtotalRp", format_rupiah($dataOrder['grandtotal']));
	$smarty->assign("grandtotal", $dataOrder['grandtotal']);
	
	$queryMember = "SELECT A.memberID, A.firstName, A.email, A.lastName, A.phone, A.cellPhone, A.zipCode, A.address, A.cityID, A.provinceID,
				B.customerID, B.receivedName, B.address as customerAddress, B.cityName, B.provinceName, B.zipCode as customerZipCode, B.phone as customerPhone, B.cellPhone as customerCellPhone 
				FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dataOrder[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	// member city
	$queryMemberCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlMemberCity = mysqli_query($connect, $queryMemberCity);
	$dataMemberCity = mysqli_fetch_array($sqlMemberCity);
	
	// member province
	$queryMemberProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlMemberProvince = mysqli_query($connect, $queryMemberProvince);
	$dataMemberProvince = mysqli_fetch_array($sqlMemberProvince);
	
	// member
	$smarty->assign("memberName", $dataMember['firstName']." ".$dataMember['lastName']);
	$smarty->assign("memberAddress", $dataMember['address']);
	$smarty->assign("memberCityName", $dataMemberCity['cityName']);
	$smarty->assign("memberProvinceName", $dataMemberProvince['provinceName']);
	$smarty->assign("memberPhone", $dataMember['phone']);
	$smarty->assign("memberCellPhone", $dataMember['cellPhone']);
	$smarty->assign("memberZipCode", $dataMember['zipCode']);
	$smarty->assign("memberEmail", $dataMember['email']);
	
	// customer
	$smarty->assign("receivedName", $dataMember['receivedName']);
	$smarty->assign("address", $dataMember['customerAddress']);
	$smarty->assign("cityName", $dataMember['cityName']);
	$smarty->assign("provinceName", $dataMember['provinceName']);
	$smarty->assign("zipCode", $dataMember['customerZipCode']);
	$smarty->assign("phone", $dataMember['customerPhone']);
	$smarty->assign("cellPhone", $dataMember['customerCellPhone']);
	
	// detail
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$dataOrder[orderID]' AND invoiceID = '$dataOrder[invoiceID]'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'productCode' => $dtDetail['productCode'],
								'productName' => $dtDetail['productName'],
								'ukuran' => $dtDetail['ukuran'],
								// 'volume' => $dtDetail['volume'],
								// 'alcohol' => $dtDetail['alcohol'],
								'unitPrice' => format_rupiah($dtDetail['unitPrice']),
								'qty' => $dtDetail['qty'],
								'subtotal' => format_rupiah($dtDetail['subtotal']),
								'no' => $i);
		$i++;
	}

	$smarty->assign("dataDetail", $dataDetail);
}

// if module is sales and act is detailconfirm
elseif ($module == 'sales' && $act == 'detailconfirm')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	$smarty->assign("metaTitle", $invoiceID);
	
	// showing up the order detail
	$queryOrder = "SELECT * FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	// confirm
	$queryConfirm = "SELECT * FROM as_confirms WHERE invoiceID = '$invoiceID' ORDER BY createdDate DESC LIMIT 1";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	$dataConfirm = mysqli_fetch_array($sqlConfirm);
	
	
	// confirm
	$smarty->assign("confirmID", $dataConfirm['confirmID']);
	$smarty->assign("bankTo", $dataConfirm['bankTo']);
	$smarty->assign("transferDate", tgl_indo2($dataConfirm['transferDate']));
	$smarty->assign("amount", format_rupiah($dataConfirm['amount']));
	$smarty->assign("image", $dataConfirm['image']);
	$smarty->assign("noteConfirm", $dataConfirm['note']);
	
	$smarty->assign("coupon", format_rupiah($dataOrder['coupon']));
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $dataOrder['status']);
	$smarty->assign("note", $dataOrder['note']);
	$smarty->assign("subtotal", format_rupiah($dataOrder['subtotal']));
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("serviceName", $dataOrder['serviceName']);
	$smarty->assign("locationName", $dataOrder['locationName']);
	$smarty->assign("insurance", $dataOrder['insurance']);
	$smarty->assign("insuranceRp", format_rupiah($dataOrder['insurance']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("shippingTotal", format_rupiah($dataOrder['shippingTotal']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("consignment", $dataOrder['consignment']);
	$smarty->assign("weightTotal", $dataOrder['weightTotal']);
	$smarty->assign("grandtotal", format_rupiah($dataOrder['grandtotal']));
	
	$queryMember = "SELECT A.memberID, A.firstName, A.email, A.lastName, A.phone, A.cellPhone, A.zipCode, A.address, A.cityID, A.provinceID,
				B.customerID, B.receivedName, B.address as customerAddress, B.cityName, B.provinceName, B.zipCode as customerZipCode, B.phone as customerPhone, B.cellPhone as customerCellPhone 
				FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dataOrder[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	// member city
	$queryMemberCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlMemberCity = mysqli_query($connect, $queryMemberCity);
	$dataMemberCity = mysqli_fetch_array($sqlMemberCity);
	
	// member province
	$queryMemberProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlMemberProvince = mysqli_query($connect, $queryMemberProvince);
	$dataMemberProvince = mysqli_fetch_array($sqlMemberProvince);
	
	// member
	$smarty->assign("memberName", $dataMember['firstName']." ".$dataMember['lastName']);
	$smarty->assign("memberAddress", $dataMember['address']);
	$smarty->assign("memberCityName", $dataMemberCity['cityName']);
	$smarty->assign("memberProvinceName", $dataMemberProvince['provinceName']);
	$smarty->assign("memberPhone", $dataMember['phone']);
	$smarty->assign("memberCellPhone", $dataMember['cellPhone']);
	$smarty->assign("memberZipCode", $dataMember['zipCode']);
	$smarty->assign("memberEmail", $dataMember['email']);
	
	// customer
	$smarty->assign("receivedName", $dataMember['receivedName']);
	$smarty->assign("address", $dataMember['customerAddress']);
	$smarty->assign("cityName", $dataMember['cityName']);
	$smarty->assign("provinceName", $dataMember['provinceName']);
	$smarty->assign("zipCode", $dataMember['customerZipCode']);
	$smarty->assign("phone", $dataMember['customerPhone']);
	$smarty->assign("cellPhone", $dataMember['customerCellPhone']);
	
	// detail
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$dataOrder[orderID]' AND invoiceID = '$dataOrder[invoiceID]'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'productCode' => $dtDetail['productCode'],
								'productName' => $dtDetail['productName'],
								'ukuran' => $dtDetail['ukuran'],
								// 'volume' => $dtDetail['volume'],
								// 'alcohol' => $dtDetail['alcohol'],
								'unitPrice' => format_rupiah($dtDetail['unitPrice']),
								'qty' => $dtDetail['qty'],
								'subtotal' => format_rupiah($dtDetail['subtotal']),
								'no' => $i);
		$i++;
	}

	$smarty->assign("dataDetail", $dataDetail);
}

// if module is sales and act is detailfinish
elseif ($module == 'sales' && $act == 'detailfinish')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	$smarty->assign("metaTitle", $invoiceID);
	
	// showing up the order detail
	$queryOrder = "SELECT * FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	// confirm
	$queryConfirm = "SELECT * FROM as_confirms WHERE invoiceID = '$invoiceID' ORDER BY createdDate DESC LIMIT 1";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	$dataConfirm = mysqli_fetch_array($sqlConfirm);
	
	
	// confirm
	$smarty->assign("coupon", format_rupiah($dataOrder['coupon']));
	$smarty->assign("confirmID", $dataConfirm['confirmID']);
	$smarty->assign("bankTo", $dataConfirm['bankTo']);
	$smarty->assign("transferDate", tgl_indo2($dataConfirm['transferDate']));
	$smarty->assign("amount", format_rupiah($dataConfirm['amount']));
	$smarty->assign("image", $dataConfirm['image']);
	$smarty->assign("noteConfirm", $dataConfirm['note']);
	
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $dataOrder['status']);
	$smarty->assign("note", $dataOrder['note']);
	$smarty->assign("subtotal", format_rupiah($dataOrder['subtotal']));
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("serviceName", $dataOrder['serviceName']);
	$smarty->assign("locationName", $dataOrder['locationName']);
	$smarty->assign("insurance", $dataOrder['insurance']);
	$smarty->assign("insuranceRp", format_rupiah($dataOrder['insurance']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("shippingTotal", format_rupiah($dataOrder['shippingTotal']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("consignment", $dataOrder['consignment']);
	$smarty->assign("weightTotal", $dataOrder['weightTotal']);
	$smarty->assign("grandtotal", format_rupiah($dataOrder['grandtotal']));
	
	$queryMember = "SELECT A.memberID, A.firstName, A.email, A.lastName, A.phone, A.cellPhone, A.zipCode, A.address, A.cityID, A.provinceID,
				B.customerID, B.receivedName, B.address as customerAddress, B.cityName, B.provinceName, B.zipCode as customerZipCode, B.phone as customerPhone, B.cellPhone as customerCellPhone 
				FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dataOrder[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	// member city
	$queryMemberCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlMemberCity = mysqli_query($connect, $queryMemberCity);
	$dataMemberCity = mysqli_fetch_array($sqlMemberCity);
	
	// member province
	$queryMemberProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlMemberProvince = mysqli_query($connect, $queryMemberProvince);
	$dataMemberProvince = mysqli_fetch_array($sqlMemberProvince);
	
	// member
	$smarty->assign("memberName", $dataMember['firstName']." ".$dataMember['lastName']);
	$smarty->assign("memberAddress", $dataMember['address']);
	$smarty->assign("memberCityName", $dataMemberCity['cityName']);
	$smarty->assign("memberProvinceName", $dataMemberProvince['provinceName']);
	$smarty->assign("memberPhone", $dataMember['phone']);
	$smarty->assign("memberCellPhone", $dataMember['cellPhone']);
	$smarty->assign("memberZipCode", $dataMember['zipCode']);
	$smarty->assign("memberEmail", $dataMember['email']);
	
	// customer
	$smarty->assign("receivedName", $dataMember['receivedName']);
	$smarty->assign("address", $dataMember['customerAddress']);
	$smarty->assign("cityName", $dataMember['cityName']);
	$smarty->assign("provinceName", $dataMember['provinceName']);
	$smarty->assign("zipCode", $dataMember['customerZipCode']);
	$smarty->assign("phone", $dataMember['customerPhone']);
	$smarty->assign("cellPhone", $dataMember['customerCellPhone']);
	
	// detail
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$dataOrder[orderID]' AND invoiceID = '$dataOrder[invoiceID]'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'productCode' => $dtDetail['productCode'],
								'productName' => $dtDetail['productName'],
								'ukuran' => $dtDetail['ukuran'],
								// 'volume' => $dtDetail['volume'],
								// 'alcohol' => $dtDetail['alcohol'],
								'unitPrice' => format_rupiah($dtDetail['unitPrice']),
								'qty' => $dtDetail['qty'],
								'subtotal' => format_rupiah($dtDetail['subtotal']),
								'no' => $i);
		$i++;
	}

	$smarty->assign("dataDetail", $dataDetail);
}

// if module is sales and act is detailbuy
elseif ($module == 'sales' && $act == 'detailbuy')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	$smarty->assign("metaTitle", $invoiceID);
	
	// showing up the order detail
	$queryOrder = "SELECT * FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $dataOrder['status']);
	
	// detail
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$dataOrder[orderID]' AND invoiceID = '$dataOrder[invoiceID]'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'productCode' => $dtDetail['productCode'],
								'productName' => $dtDetail['productName'],
								'ukuran' => $dtDetail['ukuran'],
								// 'volume' => $dtDetail['volume'],
								// 'alcohol' => $dtDetail['alcohol'],
								'modal' => format_rupiah($dtDetail['modal']),
								'subtotalModal' => format_rupiah($dtDetail['subtotalModal']),
								'qty' => $dtDetail['qty'],
								'no' => $i);
		$subtotalModal += $dtDetail['subtotalModal'];
		$i++;
	}

	$smarty->assign("grandtotal", format_rupiah($subtotalModal));
	$smarty->assign("dataDetail", $dataDetail);
}

// if module is sales and act is detailreject
elseif ($module == 'sales' && $act == 'detailreject')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	$smarty->assign("metaTitle", $invoiceID);
	
	// showing up the order detail
	$queryOrder = "SELECT * FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	// confirm
	$queryConfirm = "SELECT * FROM as_confirms WHERE invoiceID = '$invoiceID' ORDER BY createdDate DESC LIMIT 1";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	$dataConfirm = mysqli_fetch_array($sqlConfirm);
	
	// confirm
	$smarty->assign("coupon", format_rupiah($dataOrder['coupon']));
	$smarty->assign("confirmID", $dataConfirm['confirmID']);
	$smarty->assign("bankTo", $dataConfirm['bankTo']);
	$smarty->assign("transferDate", tgl_indo2($dataConfirm['transferDate']));
	$smarty->assign("amount", format_rupiah($dataConfirm['amount']));
	$smarty->assign("image", $dataConfirm['image']);
	$smarty->assign("noteConfirm", $dataConfirm['note']);
	
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $dataOrder['status']);
	$smarty->assign("note", $dataOrder['note']);
	$smarty->assign("keterangan", $dataOrder['keterangan']);
	$smarty->assign("subtotal", format_rupiah($dataOrder['subtotal']));
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("serviceName", $dataOrder['serviceName']);
	$smarty->assign("locationName", $dataOrder['locationName']);
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("shippingTotal", format_rupiah($dataOrder['shippingTotal']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("consignment", $dataOrder['consignment']);
	$smarty->assign("weightTotal", $dataOrder['weightTotal']);
	$smarty->assign("grandtotal", format_rupiah($dataOrder['grandtotal']));
	
	$queryMember = "SELECT A.memberID, A.firstName, A.email, A.lastName, A.phone, A.cellPhone, A.zipCode, A.address, A.cityID, A.provinceID,
				B.customerID, B.receivedName, B.address as customerAddress, B.cityName, B.provinceName, B.zipCode as customerZipCode, B.phone as customerPhone, B.cellPhone as customerCellPhone 
				FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dataOrder[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	// member city
	$queryMemberCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlMemberCity = mysqli_query($connect, $queryMemberCity);
	$dataMemberCity = mysqli_fetch_array($sqlMemberCity);
	
	// member province
	$queryMemberProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlMemberProvince = mysqli_query($connect, $queryMemberProvince);
	$dataMemberProvince = mysqli_fetch_array($sqlMemberProvince);
	
	// member
	$smarty->assign("memberName", $dataMember['firstName']." ".$dataMember['lastName']);
	$smarty->assign("memberAddress", $dataMember['address']);
	$smarty->assign("memberCityName", $dataMemberCity['cityName']);
	$smarty->assign("memberProvinceName", $dataMemberProvince['provinceName']);
	$smarty->assign("memberPhone", $dataMember['phone']);
	$smarty->assign("memberCellPhone", $dataMember['cellPhone']);
	$smarty->assign("memberZipCode", $dataMember['zipCode']);
	$smarty->assign("memberEmail", $dataMember['email']);
	
	// customer
	$smarty->assign("receivedName", $dataMember['receivedName']);
	$smarty->assign("address", $dataMember['customerAddress']);
	$smarty->assign("cityName", $dataMember['cityName']);
	$smarty->assign("provinceName", $dataMember['provinceName']);
	$smarty->assign("zipCode", $dataMember['customerZipCode']);
	$smarty->assign("phone", $dataMember['customerPhone']);
	$smarty->assign("cellPhone", $dataMember['customerCellPhone']);
	
	// detail
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$dataOrder[orderID]' AND invoiceID = '$dataOrder[invoiceID]'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'productCode' => $dtDetail['productCode'],
								'productName' => $dtDetail['productName'],
								'ukuran' => $dtDetail['ukuran'],
								// 'volume' => $dtDetail['volume'],
								// 'alcohol' => $dtDetail['alcohol'],
								'unitPrice' => format_rupiah($dtDetail['unitPrice']),
								'qty' => $dtDetail['qty'],
								'subtotal' => format_rupiah($dtDetail['subtotal']),
								'no' => $i);
		$i++;
	}

	$smarty->assign("dataDetail", $dataDetail);
}

// if module is sales and act is detailsent
elseif ($module == 'sales' && $act == 'detailsent')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	$smarty->assign("metaTitle", $invoiceID);
	
	// showing up the order detail
	$queryOrder = "SELECT * FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	// confirm
	$queryConfirm = "SELECT * FROM as_confirms WHERE invoiceID = '$invoiceID' ORDER BY createdDate DESC LIMIT 1";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	$dataConfirm = mysqli_fetch_array($sqlConfirm);
	
	// bank
	// confirm
	$smarty->assign("confirmID", $dataConfirm['confirmID']);
	$smarty->assign("bankTo", $dataConfirm['bankTo']);
	$smarty->assign("transferDate", tgl_indo2($dataConfirm['transferDate']));
	$smarty->assign("amount", format_rupiah($dataConfirm['amount']));
	$smarty->assign("image", $dataConfirm['image']);
	$smarty->assign("noteConfirm", $dataConfirm['note']);
	
	$smarty->assign("coupon", format_rupiah($dataOrder['coupon']));
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $dataOrder['status']);
	$smarty->assign("note", $dataOrder['note']);
	$smarty->assign("subtotal", format_rupiah($dataOrder['subtotal']));
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("serviceName", $dataOrder['serviceName']);
	$smarty->assign("locationName", $dataOrder['locationName']);
	$smarty->assign("insurance", $dataOrder['insurance']);
	$smarty->assign("insuranceRp", format_rupiah($dataOrder['insurance']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("shippingTotal", format_rupiah($dataOrder['shippingTotal']));
	$smarty->assign("pointTotal", format_rupiah($dataOrder['pointTotal']));
	$smarty->assign("consignment", $dataOrder['consignment']);
	$smarty->assign("weightTotal", $dataOrder['weightTotal']);
	$smarty->assign("grandtotal", format_rupiah($dataOrder['grandtotal']));
	
	$queryMember = "SELECT A.memberID, A.firstName, A.email, A.lastName, A.phone, A.cellPhone, A.zipCode, A.address, A.cityID, A.provinceID,
				B.customerID, B.receivedName, B.address as customerAddress, B.cityName, B.provinceName, B.zipCode as customerZipCode, B.phone as customerPhone, B.cellPhone as customerCellPhone 
				FROM as_members A INNER JOIN as_customers B ON A.memberID = B.memberID WHERE B.customerID = '$dataOrder[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	// member city
	$queryMemberCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlMemberCity = mysqli_query($connect, $queryMemberCity);
	$dataMemberCity = mysqli_fetch_array($sqlMemberCity);
	
	// member province
	$queryMemberProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlMemberProvince = mysqli_query($connect, $queryMemberProvince);
	$dataMemberProvince = mysqli_fetch_array($sqlMemberProvince);
	
	// member
	$smarty->assign("memberName", $dataMember['firstName']." ".$dataMember['lastName']);
	$smarty->assign("memberAddress", $dataMember['address']);
	$smarty->assign("memberCityName", $dataMemberCity['cityName']);
	$smarty->assign("memberProvinceName", $dataMemberProvince['provinceName']);
	$smarty->assign("memberPhone", $dataMember['phone']);
	$smarty->assign("memberCellPhone", $dataMember['cellPhone']);
	$smarty->assign("memberZipCode", $dataMember['zipCode']);
	$smarty->assign("memberEmail", $dataMember['email']);
	
	// customer
	$smarty->assign("receivedName", $dataMember['receivedName']);
	$smarty->assign("address", $dataMember['customerAddress']);
	$smarty->assign("cityName", $dataMember['cityName']);
	$smarty->assign("provinceName", $dataMember['provinceName']);
	$smarty->assign("zipCode", $dataMember['customerZipCode']);
	$smarty->assign("phone", $dataMember['customerPhone']);
	$smarty->assign("cellPhone", $dataMember['customerCellPhone']);
	
	// detail
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$dataOrder[orderID]' AND invoiceID = '$dataOrder[invoiceID]'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'productCode' => $dtDetail['productCode'],
								'productName' => $dtDetail['productName'],
								'ukuran' => $dtDetail['ukuran'],
								// 'volume' => $dtDetail['volume'],
								// 'alcohol' => $dtDetail['alcohol'],
								'unitPrice' => format_rupiah($dtDetail['unitPrice']),
								'qty' => $dtDetail['qty'],
								'subtotal' => format_rupiah($dtDetail['subtotal']),
								'no' => $i);
		$i++;
	}

	$smarty->assign("dataDetail", $dataDetail);
}

// if module is sales and act is update
elseif ($module == 'sales' && $act == 'update')
{
	$orderID = mysqli_real_escape_string($connect, $_POST['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_POST['invoiceID']);
	$consignment = mysqli_real_escape_string($connect, $_POST['consignment']);
	$courierName = mysqli_real_escape_string($connect, $_POST['courierName']);
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryOrder = "UPDATE as_orders SET status = '3', consignment = '$consignment', modifiedDate = '$modifiedDate' WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	mysqli_query($connect, $queryOrder);
	
	$email = $_POST['email'];
	
	$subject = "Pesanan Anda telah Dikirim";
	$host = $_SERVER['HTTP_HOST'];
	$content = 
			"
			<body style='margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;'>
				<center>
				<table style='width: 600px; font-family: arial; text-align: center; font-size: 14px;'>
					<tr>
						<td style='border-bottom: 1px solid #ddd; padding-bottom: 10px;'><br><br>Importir yang bergerak di bidang penjualan produk - produk minuman dari brand ternama.</td>
					</tr>
					<tr>
						<td style='padding-top: 10px;' align='center'>
							<table>
								<tr>
									<td style='width: 60px;'>
										<img src='http://$host/images/logo.png' style='width: 50px;'>
									</td>
									<td>
										<span style='font-size: 18px;'><b>Anaku.Com</b></font>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<br>
				<table style='width: 600px; font-family: arial; font-size: 14px; background: #FFF; padding: 10px;'>
					<tr>
						<td>
							Kepada Yth <b>Customer</b>,<br> <br><br>
							Email ini memberitahukan bahwa pesanan Anda telah dikirimkan.<br><br>
							Ekspedisi : $courierName<br>
							Nomor Consignment : $consignment<br><br>
							Masuk ke akun Anaku > History Belanja Anda untuk melihat status pesanan Anda.<br><br>
							Best Regards,<br>
							Anaku.com
						</td>
					</tr>
				</table><br>
				<p style='font-family: arial; font-size: 12px; border-bottom: 1px solid #DDD; padding-bottom: 10px;'>Copyright &copy; 2016 Anaku.com. All Right Reserved.<br><br></p>
				<p style='font-family: arial; font-size: 12px;'>
					Mohon jangan balas email ini, karena email ini dikirim secara otomatis oleh sistem<br><br>
				</p>
				</center>
			</body>
			";
			
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$headers .= 'From: Anaku.com <no-reply@Anaku.com>' . "\r\n";

	mail($email, $subject, $content, $headers);
	
	$_SESSION['sessSales'] = 3;
	
	header("Location: adm_sales_transactions.php?mod=sales&act=confirm");
}

// if module is sales and act is detail
elseif ($module == 'sales' && $act == 'detail')
{
	$invoice = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	$inv = explode("-", $invoice);
	$orderID = $inv[0];
	$invoiceID = $inv[1];
	
	$queryOrder = "SELECT A.orderID, A.invoiceID, A.invoiceDate, A.status, A.note, A.subtotal, A.shippingTotal, A.consignment, A.weightTotal, A.grandtotal, A.courierName,
					B.customerID, B.receivedName, B.address, B.cityName, B.provinceName, B.zipCode, B.phone, B.cellPhone
					FROM as_orders A INNER JOIN as_customers B ON A.customerID = B.customerID 
					WHERE A.invoiceID = '$invoiceID'";
	
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$numsOrder = mysqli_num_rows($sqlOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	// bank
	$status = "Penjualan Langsung";
	
	$smarty->assign("numsOrder", $numsOrder);
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $status);
	$smarty->assign("note", $dataOrder['note']);
	$smarty->assign("subtotal", format_rupiah($dataOrder['subtotal']));
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("shippingTotal", format_rupiah($dataOrder['shippingTotal']));
	$smarty->assign("nomorResi", $dataOrder['consignment']);
	$smarty->assign("weight", $dataOrder['weightTotal']);
	$smarty->assign("grandtotal", format_rupiah($dataOrder['grandtotal']));
	$smarty->assign("customerID", $dataOrder['customerID']);
	$smarty->assign("receivedName", $dataOrder['receivedName']);
	$smarty->assign("address", $dataOrder['address']);
	$smarty->assign("provinceName", $dataOrder['provinceName']);
	$smarty->assign("cityName", $dataOrder['cityName']);
	$smarty->assign("zipCode", $dataOrder['zipCode']);
	$smarty->assign("phone", $dataOrder['phone']);
	$smarty->assign("cellPhone", $dataOrder['cellPhone']);
	$smarty->assign("bankName", $dataBank['bankName']);
	$smarty->assign("accountNo", $dataBank['accountNo']);
	$smarty->assign("accountName", $dataBank['accountName']);
	
	// transactions details
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$orderID'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{	
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'productCode' => $dtDetail['productCode'],
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
	
	$smarty->assign("sessShippingType", $_SESSION['sessShippingType']);
	$smarty->assign("sessNomorResi", $_SESSION['sessNomorResi']);
	
	$_SESSION['sessShippingType'] = "";
	$_SESSION['sessNomorResi'] = "";
	
	$smarty->assign("metaTitle", "Detail Order");
}

// if module is sales and act is edit resi
elseif ($module == 'sales' && $act == 'editresi')
{
	$invoice = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	$inv = explode("-", $invoice);
	$orderID = $inv[0];
	$invoiceID = $inv[1];
	
	$queryOrder = "SELECT A.orderID, A.invoiceID, A.invoiceDate, A.status, A.note, A.subtotal, A.shippingTotal, A.consignment, A.weightTotal, A.grandtotal, A.courierName,
					B.customerID, B.receivedName, B.address, B.cityName, B.provinceName, B.zipCode, B.phone, B.cellPhone
					FROM as_orders A INNER JOIN as_customers B ON A.customerID = B.customerID 
					WHERE A.invoiceID = '$invoiceID'";
	
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$numsOrder = mysqli_num_rows($sqlOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	$status = "Penjualan Langsung";
	
	$smarty->assign("numsOrder", $numsOrder);
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("invoiceDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $status);
	$smarty->assign("note", $dataOrder['note']);
	$smarty->assign("subtotal", format_rupiah($dataOrder['subtotal']));
	$smarty->assign("courierName", $dataOrder['courierName']);
	$smarty->assign("shippingTotal", format_rupiah($dataOrder['shippingTotal']));
	$smarty->assign("nomorResi", $dataOrder['consignment']);
	$smarty->assign("weight", $dataOrder['weightTotal']);
	$smarty->assign("grandtotal", format_rupiah($dataOrder['grandtotal']));
	$smarty->assign("customerID", $dataOrder['customerID']);
	$smarty->assign("receivedName", $dataOrder['receivedName']);
	$smarty->assign("address", $dataOrder['address']);
	$smarty->assign("provinceName", $dataOrder['provinceName']);
	$smarty->assign("cityName", $dataOrder['cityName']);
	$smarty->assign("zipCode", $dataOrder['zipCode']);
	$smarty->assign("phone", $dataOrder['phone']);
	$smarty->assign("cellPhone", $dataOrder['cellPhone']);
	$smarty->assign("bankName", $dataBank['bankName']);
	$smarty->assign("accountNo", $dataBank['accountNo']);
	$smarty->assign("accountName", $dataBank['accountName']);
	
	// transactions details
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$orderID'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{	
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'productCode' => $dtDetail['productCode'],
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
	
	$smarty->assign("sessShippingType", $_SESSION['sessShippingType']);
	$smarty->assign("sessNomorResi", $_SESSION['sessNomorResi']);
	
	$_SESSION['sessShippingType'] = "";
	$_SESSION['sessNomorResi'] = "";
	
	$smarty->assign("metaTitle", "Detail Order");
}

// if mod is sales and act is deleteorder
elseif ($module == 'sales' && $act == 'deleteorder')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	$queryOrder = "DELETE FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	mysqli_query($connect, $queryOrder);
	
	$queryDetail = "DELETE FROM as_order_details WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	mysqli_query($connect, $queryDetail);
	
	$_SESSION['sessSales'] = 5;
	
	header("Location: adm_sales_transactions.php?mod=sales&act=reject");
}

// if mod is sales and act is delete
elseif ($module == 'sales' && $act == 'delete')
{
	$detailID = mysqli_real_escape_string($connect, $_GET['detailID']);
	
	$queryOrder = "DELETE FROM as_order_details WHERE detailID = '$detailID'";
	mysqli_query($connect, $queryOrder);
	
	header("Location: adm_sales_transactions.php?mod=sales&act=add&invoiceID=MANUAL");
}

// if mod is sales and act is livedelete
elseif ($module == 'sales' && $act == 'livedelete')
{
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	$customerID = mysqli_real_escape_string($connect, $_GET['customerID']);
	
	// show
	$queryOrder = "SELECT invoiceID, grandtotal FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	$numsOrder = mysqli_num_rows($sqlOrder);
	
	if ($numsOrder == '0')
	{
		echo "Data tidak ditemukan";
		exit();
	}
	
	$grandtotal = $dataOrder['grandtotal'];
	
	$queryDetail = "SELECT productCode, qty FROM as_order_details WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	while ($dataDetail = mysqli_fetch_array($sqlDetail))
	{
		$qty = $dataDetail['qty'];
		
		// tambahkan stok
		$queryStock = "UPDATE as_products SET qty=qty+$qty WHERE productCode = '$dataDetail[productCode]'";
		mysqli_query($connect, $queryStock);
	}
	
	$queryDelDetailOrder = "DELETE FROM as_order_details WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
	$success = mysqli_query($connect, $queryDelDetailOrder);
	
	if ($success)
	{
		// delete order
		$queryDelOrder = "DELETE FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
		mysqli_query($connect, $queryDelOrder);
		
		// delete customer
		$queryCustomer = "DELETE FROM as_customers WHERE customerID = '$customerID'";
		mysqli_query($connect, $queryCustomer);
	}
	
	header("Location: adm_sales_transactions.php?mod=sales&act=live");
}

// if mod is sales and act is input
elseif ($module == 'sales' && $act == 'input')
{
	$invoiceID = $_POST['invoiceID'];
	$receivedName = mysqli_real_escape_string($connect, $_POST['receivedName']);
	$invoiceDate = $_POST['invoiceDate'];
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$zipCode = mysqli_real_escape_string($connect, $_POST['zipCode']);
	$status = $_POST['status'];
	$shippingType = mysqli_real_escape_string($connect, $_POST['shippingType']);
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$nomorResi = mysqli_real_escape_string($connect, $_POST['nomorResi']);
	$ongkir = $_POST['ongkir'];
	$cellPhone = mysqli_real_escape_string($connect, $_POST['cellPhone']);
	$note = mysqli_real_escape_string($connect, $_POST['note']);
	$subtotal = $_POST['subtotal'];
	$weight = $_POST['weight'];
	$grandtotal = $_POST['grandtotal'] + $ongkir;
	$sessSInvoiceID = $_SESSION['sessSInvoiceID'];
	
	// province
	$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$provinceID'";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	$dataProvince = mysqli_fetch_array($sqlProvince);
	
	$provinceName = mysqli_real_escape_string($connect, $dataProvince['provinceName']);
	
	// city
	$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$cityID'";
	$sqlCity = mysqli_query($connect, $queryCity);
	$dataCity = mysqli_fetch_array($sqlCity);
	
	$cityName = mysqli_real_escape_string($connect, $dataCity['cityName']);
	
	$queryCustomer = "INSERT INTO as_customers (invoiceID,
												memberID,
												chooseShipping,
												receivedName,
												address,
												cityName,
												provinceName,
												zipCode,
												phone,
												cellPhone)
										VALUES(	'$sessSInvoiceID',
												'0',
												'1',
												'$receivedName',
												'$address',
												'$cityName',
												'$provinceName',
												'$zipCode',
												'',
												'$cellPhone')"; 
	mysqli_query($connect, $queryCustomer);
	
	$customerID = mysqli_insert_id($connect);
	
	// save into the database
	$queryOrder = "INSERT INTO as_orders (	invoiceID,
											invoiceDate,
											customerID,
											status,
											note,
											subtotal,
											courierName,
											shippingTotal,
											consignment,
											weightTotal,
											grandtotal)
									VALUES(	'$sessSInvoiceID',
											'$invoiceDate',
											'$customerID',
											'$status',
											'$note',
											'$subtotal',
											'$shippingType',
											'$ongkir',
											'$nomorResi',
											'$weight',
											'$grandtotal')";
	mysqli_query($connect, $queryOrder);
	
	$orderID = mysqli_insert_id($connect);
	
	$queryUpdate = "UPDATE as_order_details SET orderID = '$orderID' WHERE invoiceID = '$sessSInvoiceID'";
	mysqli_query($connect, $queryUpdate);
	
	// showing up the detail and reduce the stock
	$queryDetail = "SELECT productCode, qty FROM as_order_details WHERE invoiceID = '$sessSInvoiceID'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$qty = $dtDetail['qty'];
		
		// update the stock
		$queryStock = "UPDATE as_products SET qty=qty-$qty, sold=sold+$qty WHERE productCode = '$dtDetail[productCode]'";
		mysqli_query($connect, $queryStock);
	}
	
	$_SESSION['sessSInvoiceID'] = "";
	$_SESSION['sessInvoiceDate'] = "";
	$_SESSION['sessStatus'] = "";
	$_SESSION['sessShippingType'] = "";
	$_SESSION['sessNomorResi'] = "";
	$_SESSION['sessOngkir'] = "";
	$_SESSION['sessReceivedName'] = "";
	$_SESSION['sessAddress'] = "";
	$_SESSION['sessZipCode'] = "";
	$_SESSION['sessProvinceID'] = "";
	$_SESSION['sessCityID'] = "";
	$_SESSION['sessCellPhone'] = "";
	$_SESSION['sessNote'] = "";
	
	header("Location: adm_sales_transactions.php?mod=sales&act=detail&invoiceID=".$orderID."-".$sessSInvoiceID);
}

// if mod is sales and act is search
elseif ($module == 'sales' && $act == 'search')
{
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	$startDate = mysqli_real_escape_string($connect, $_GET['startDate']);
	$endDate = mysqli_real_escape_string($connect, $_GET['endDate']);
	$status = mysqli_real_escape_string($connect, $_GET['status']);
	
	$smarty->assign("invoiceID", $invoiceID);
	$smarty->assign("startDate", $startDate);
	$smarty->assign("endDate", $endDate);
	$smarty->assign("status", $status);
	
	if ($invoiceID != "" || $startDate != "" || $endDate != "" || $status != "")
	{
		if ($startDate != "" && $endDate != "")
		{
			if ($invoiceID != "" && $status == "")
			{
				$queryOrder = "SELECT A.userID, A.invoiceID, A.orderID, A.invoiceDate, A.customerID, A.status, A.grandtotal, B.receivedName, C.firstName, C.lastName FROM as_orders A INNER JOIN as_customers B ON B.customerID=A.customerID LEFT JOIN as_members C ON C.memberID=B.memberID WHERE A.userID = '$sessUserID' AND A.invoiceID = '$invoiceID' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.invoiceDate DESC";
			}
			elseif ($invoiceID == "" && $status != "")
			{
				$queryOrder = "SELECT A.userID, A.invoiceID, A.orderID, A.invoiceDate, A.customerID, A.status, A.grandtotal, B.receivedName, C.firstName, C.lastName FROM as_orders A INNER JOIN as_customers B ON B.customerID=A.customerID LEFT JOIN as_members C ON C.memberID=B.memberID WHERE A.userID = '$sessUserID' AND A.status = '$status' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.invoiceDate DESC";
			}
			elseif ($invoiceID == "" && $status == "")
			{
				$queryOrder = "SELECT A.userID, A.invoiceID, A.orderID, A.invoiceDate, A.customerID, A.status, A.grandtotal, B.receivedName, C.firstName, C.lastName FROM as_orders A INNER JOIN as_customers B ON B.customerID=A.customerID LEFT JOIN as_members C ON C.memberID=B.memberID WHERE A.userID = '$sessUserID' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.invoiceDate DESC";
			}
			else
			{
				$queryOrder = "SELECT A.userID, A.invoiceID, A.orderID, A.invoiceDate, A.customerID, A.status, A.grandtotal, B.receivedName, C.firstName, C.lastName FROM as_orders A INNER JOIN as_customers B ON B.customerID=A.customerID LEFT JOIN as_members C ON C.memberID=B.memberID WHERE A.userID = '$sessUserID' AND A.invoiceID = '$invoiceID' AND A.status = '$status' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.invoiceDate DESC";
			}
		}
		
		else
		{
			if ($invoiceID != "" && $status == "")
			{
				$queryOrder = "SELECT A.userID, A.invoiceID, A.orderID, A.invoiceDate, A.customerID, A.status, A.grandtotal, B.receivedName, C.firstName, C.lastName FROM as_orders A INNER JOIN as_customers B ON B.customerID=A.customerID LEFT JOIN as_members C ON C.memberID=B.memberID WHERE A.userID = '$sessUserID' AND A.invoiceID = '$invoiceID' ORDER BY A.invoiceDate DESC";
			}
			elseif ($invoiceID == "" && $status != "")
			{
				$queryOrder = "SELECT A.userID, A.invoiceID, A.orderID, A.invoiceDate, A.customerID, A.status, A.grandtotal, B.receivedName, C.firstName, C.lastName FROM as_orders A INNER JOIN as_customers B ON B.customerID=A.customerID LEFT JOIN as_members C ON C.memberID=B.memberID WHERE A.userID = '$sessUserID' AND A.status = '$status' ORDER BY A.invoiceDate DESC";
			}
			else
			{
				$queryOrder = "SELECT A.userID, A.invoiceID, A.orderID, A.invoiceDate, A.customerID, A.status, A.grandtotal, B.receivedName, C.firstName, C.lastName FROM as_orders A INNER JOIN as_customers B ON B.customerID=A.customerID LEFT JOIN as_members C ON C.memberID=B.memberID WHERE A.userID = '$sessUserID' AND A.invoiceID = '$invoiceID' AND A.status = '$status' ORDER BY A.invoiceDate DESC";
			}
		}
		
		$sqlOrder = mysqli_query($connect, $queryOrder);
		$i = 1;
		while ($dtOrder = mysqli_fetch_array($sqlOrder))
		{
			if ($dtOrder['status'] == '1')
			{
				$statusOrder = "Baru";
			}
			elseif ($dtOrder['status'] == '2')
			{
				$statusOrder = "Pesanan Diterima";
			}
			elseif ($dtOrder['status'] == '3')
			{
				$statusOrder = "Pesanan Dikirim";
			}
			elseif ($dtOrder['status'] == '4')
			{
				$statusOrder = "Selesai";
			}
			else
			{
				$statusOrder = "Ditolak";
			}
			
			$queryOwner = "SELECT fullName FROM as_users WHERE userID = '$dtOrder[userID]'";
			$sqlOwner = mysqli_query($connect, $queryOwner);
			$dataOwner = mysqli_fetch_array($sqlOwner);
			
			$dataOrder[] = array(	'orderID' => $dtOrder['orderID'],
									'invoiceDate' => tgl_indo2($dtOrder['invoiceDate']),
									'invoiceID' => $dtOrder['invoiceID'],
									'status' => $statusOrder,
									'grandtotal' => format_rupiah($dtOrder['grandtotal']),
									'owner' => $dataOwner['fullName'],
									'receivedName' => $dtOrder['receivedName'],
									'memberName' => $dtOrder['firstName']." ".$dtOrder['lastName'],
									'no' => $i);
			$i++;
		}
		
		$smarty->assign("dataOrder", $dataOrder);
		
		$numsOrder = mysqli_num_rows($sqlOrder);
		$smarty->assign("numsOrder", $numsOrder);
	}

	$smarty->assign("metaTitle", "Pencarian Transaksi Penjualan");
}

// if mod is sales and act is retur
elseif ($module == 'sales' && $act == 'retur')
{
	$startDate = mysqli_real_escape_string($connect, $_GET['startDate']);
	$endDate = mysqli_real_escape_string($connect, $_GET['endDate']);
	$submit = mysqli_real_escape_string($connect, $_GET['submit']);
	
	$smarty->assign("submit", $submit);
	
	// show the retur
	if ($submit != "")
	{
		$smarty->assign("startDate", $startDate);
		$smarty->assign("endDate", $endDate);
		if ($startDate != "" || $endDate != "")
		{
			$queryRetur = "SELECT * FROM as_sales_retur WHERE returDate BETWEEN '$startDate' AND '$endDate' ORDER BY createdDate DESC";
		}
		else
		{
			$queryRetur = "SELECT * FROM as_sales_retur ORDER BY createdDate DESC";
		}
		
		$sqlRetur = mysqli_query($connect, $queryRetur);
		$i = 1;
		while ($dtRetur = mysqli_fetch_array($sqlRetur))
		{
			// qty
			$queryDetail = "SELECT SUM(qty) as qty, SUM(subtotal) as subtotal FROM as_sales_retur_detail WHERE returNo = '$dtRetur[returNo]'";
			$sqlDetail = mysqli_query($connect, $queryDetail);
			$dataDetail = mysqli_fetch_array($sqlDetail);
			
			$dataRetur[] = array(	'returID' => $dtRetur['returID'],
									'invoiceID' => $dtRetur['invoiceID'],
									'returNo' => $dtRetur['returNo'],
									'returDate' => tgl_indo2($dtRetur['returDate']),
									'memberName' => $dtRetur['memberName'],
									'receivedName' => $dtRetur['receivedName'],
									'qty' => $dataDetail['qty'],
									'subtotal' => format_rupiah($dataDetail['subtotal']),
									'no' => $i);
			$i++;
		}
		
		$smarty->assign("dataRetur", $dataRetur);
	}
	else
	{
		$smarty->assign("startDate", date('Y-m-d'));
		$smarty->assign("endDate", date('Y-m-d'));
	}
	
	$smarty->assign("metaTitle", "Retur Penjualan");
}

// if mod is sales and act is returadd
elseif ($module == 'sales' && $act == 'returadd')
{
	$smarty->assign("metaTitle", "Retur Penjualan");
	
	$sessSRInvoiceID = $_SESSION['sessSRInvoiceID'];
	if ($sessSRInvoiceID == "")
	{
		$_SESSION['sessSRInvoiceID'] = date('ymdhis');
	}
	
	$smarty->assign("sessSRInvoiceID", $_SESSION['sessSRInvoiceID']);
	
	$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
	
	$queryOrder = "SELECT A.invoiceDate, A.orderID, A.invoiceID, B.memberID, B.receivedName, A.status FROM as_orders A INNER JOIN as_customers B ON A.customerID=B.customerID WHERE A.invoiceID = '$invoiceID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	$queryMember = "SELECT firstName, lastName FROM as_members WHERE memberID = '$dataOrder[memberID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	if ($dataOrder['status'] == '4')
	{
		$status = "Online";
	}
	else
	{
		$status = "Penjualan Langsung";
	}
	
	$smarty->assign("orderID", $dataOrder['orderID']);
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("receivedName", $dataOrder['receivedName']);
	$smarty->assign("memberName", $dataMember['firstName']." ".$dataMember['lastName']);
	$smarty->assign("orderDate", tgl_indo2($dataOrder['invoiceDate']));
	$smarty->assign("status", $status);
	
	if ($_SESSION['sInvoiceDate'] != "")
	{
		$smarty->assign("invoiceDate", $_SESSION['sInvoiceDate']);
	}
	else
	{
		$smarty->assign("invoiceDate", date('Y-m-d'));
	}
	
	// detail
	$queryDetail = "SELECT * FROM as_order_details WHERE orderID = '$dataOrder[orderID]' AND invoiceID = '$invoiceID'";
	$sqlDetail = mysqli_query($connect, $queryDetail);
	$i = 1;
	while ($dtDetail = mysqli_fetch_array($sqlDetail))
	{
		$queryRetur = "SELECT detailID, subtotal, qty, reason FROM as_sales_retur_detail WHERE invoiceID = '$dtDetail[invoiceID]' AND returNo = '$sessSRInvoiceID' AND productCode = '$dtDetail[productCode]'";
		$sqlRetur = mysqli_query($connect, $queryRetur);
		$dataRetur = mysqli_fetch_array($sqlRetur);
		
		$dataDetail[] = array(	'detailID' => $dtDetail['detailID'],
								'orderID' => $dtDetail['detailID'],
								'invoiceID' => $dtDetail['invoiceID'],
								'productCode' => $dtDetail['productCode'],
								'productName' => $dtDetail['productName'],
								'ukuran' => $dtDetail['ukuran'],
								// 'volume' => $dtDetail['volume'],
								// 'alcohol' => $dtDetail['alcohol'],
								'unitPrice' => format_rupiah($dtDetail['unitPrice']),
								'qty' => $dtDetail['qty'],
								'subtotal' => format_rupiah($dtDetail['subtotal']),
								'jmlRetur' => $dataRetur['qty'],
								'reason' => $dataRetur['reason'],
								'detID' => $dataRetur['detailID'],
								'no' => $i);
		$grandtotal += $dataRetur['subtotal'];
		$i++;
	}
	
	$smarty->assign("dataDetail", $dataDetail);
	$smarty->assign("grandtotal", $grandtotal);
	$smarty->assign("grandtotalRp", format_rupiah($grandtotal));
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
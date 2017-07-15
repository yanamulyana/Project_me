<?php
include "header.php";
$page = "members.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is agent and act is view 
if ($module == 'member' && $act == 'view')
{
	$memberID = $_GET['memberID'];
	
	$queryMember = "SELECT * FROM as_members WHERE memberID = '$memberID'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	$dataProvince = mysqli_fetch_array($sqlProvince);
	
	$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlCity = mysqli_query($connect, $queryCity);
	$dataCity = mysqli_fetch_array($sqlCity);
	
	$smarty->assign("memberID", $dataMember['memberID']);
	$smarty->assign("firstName", $dataMember['firstName']);
	$smarty->assign("lastName", $dataMember['lastName']);
	$smarty->assign("gender", $dataMember['gender']);
	$smarty->assign("address", $dataMember['address']);
	$smarty->assign("provinceName", $dataProvince['provinceName']);
	$smarty->assign("cityName", $dataCity['cityName']);
	$smarty->assign("zipCode", $dataMember['zipCode']);
	$smarty->assign("phone", $dataMember['phone']);
	$smarty->assign("cellPhone", $dataMember['cellPhone']);
	$smarty->assign("email", $dataMember['email']);
	$smarty->assign("status", $dataMember['status']);
	$smarty->assign("createdDate", $dataMember['createdDate']);
	$smarty->assign("pointTotal", format_rupiah($dataMember['pointTotal']));
	$smarty->assign("lastLogin", $dataMember['lastLogin']);
	$smarty->assign("requirement", $dataMember['requirement']);
	
	$smarty->assign("metaTitle", "View Member");
	
	// showing up the history
	$p = new PagingHistoryMember;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryOrder = "SELECT A.customerID, A.invoiceID, B.status, B.invoiceDate, B.orderID, B.grandtotal FROM as_customers A INNER JOIN as_orders B ON A.customerID = B.customerID WHERE A.memberID = '$dataMember[memberID]' ORDER BY B.invoiceID DESC LIMIT $posisi,$batas";
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
		
		$dataOrder[] = array(	'customerID' => $dtOrder['customerID'],
								'invoiceID' => $dtOrder['invoiceID'],
								'grandtotal' => format_rupiah($dtOrder['grandtotal']),
								'invoiceDate' => tgl_indo2($dtOrder['invoiceDate']),
								'status' => $status,
								'orderID' => $dtOrder['orderID'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataOrder", $dataOrder);
	
	$queryJmlData = "SELECT A.customerID FROM as_customers A INNER JOIN as_orders B ON A.customerID = B.customerID WHERE A.memberID = '$dataMember[memberID]'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsOrder", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
}

// if mod is member and act is detailhistory
elseif ($module == 'member' && $act == 'detailhistory')
{
	$memberID = mysqli_real_escape_string($connect, $_GET['memberID']);
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	
	$queryOrder = "SELECT A.orderID, A.coupon, A.pointTotal, A.serviceName, A.locationName, A.consignment, A.invoiceID, A.invoiceDate, A.status, A.note, A.subtotal, A.courierName, A.shippingTotal, A.weightTotal, A.grandtotal,
				 B.receivedName, B.address, B.cityName, B.provinceName, B.zipCode, B.phone, B.cellPhone FROM as_orders A INNER JOIN as_customers B ON A.customerID=B.customerID WHERE A.orderID = '$orderID' AND B.memberID = '$memberID'";
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
}

// if mod is member and act is edit
elseif ($module == 'member' && $act == 'edit')
{
	$memberID = $_GET['memberID'];
	
	$queryMember = "SELECT * FROM as_members WHERE memberID = '$memberID'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	$dataProvince = mysqli_fetch_array($sqlProvince);
	
	$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlCity = mysqli_query($connect, $queryCity);
	$dataCity = mysqli_fetch_array($sqlCity);
	
	$smarty->assign("memberID", $dataMember['memberID']);
	$smarty->assign("firstName", $dataMember['firstName']);
	$smarty->assign("lastName", $dataMember['lastName']);
	$smarty->assign("gender", $dataMember['gender']);
	$smarty->assign("address", $dataMember['address']);
	$smarty->assign("provinceName", $dataProvince['provinceName']);
	$smarty->assign("cityName", $dataCity['cityName']);
	$smarty->assign("zipCode", $dataMember['zipCode']);
	$smarty->assign("phone", $dataMember['phone']);
	$smarty->assign("cellPhone", $dataMember['cellPhone']);
	$smarty->assign("email", $dataMember['email']);
	$smarty->assign("status", $dataMember['status']);
	$smarty->assign("createdDate", $dataMember['createdDate']);
	$smarty->assign("pointTotal", format_rupiah($dataMember['pointTotal']));
	$smarty->assign("lastLogin", $dataMember['lastLogin']);
	$smarty->assign("requirement", $dataMember['requirement']);
	
	$smarty->assign("metaTitle", "Edit Member");
}

// if mod is member and act is update
elseif ($module == 'member' && $act == 'update')
{
	$memberID = $_POST['memberID'];
	$requirement = $_POST['requirement'];
	$status = $_POST['status'];
	
	$queryMember = "UPDATE as_members SET	status = '$status',
											requirement = '$requirement'
											WHERE memberID = '$memberID'";
	mysqli_query($connect, $queryMember);
	
	if ($status == 'Y')
	{
		$queryUpdate = "UPDATE as_members SET	verificationCode = ''
												WHERE memberID = '$memberID'";
		mysqli_query($connect, $queryUpdate);
	}
	
	$_SESSION['sessMember'] = 1;
	
	header("Location: members.php");
}

// if mod is member and act is search
elseif ($module == 'member' && $act == 'search')
{
	$t = $_GET['t'];
	$smarty->assign("t", $t);
	$q = mysqli_real_escape_string($connect, $_GET['q']);
	$smarty->assign("q", $q);
	
	// showing up the admin member search
	$p = new PagingMemberSearch;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	if ($t == '1')
	{
		$queryMember = "SELECT * FROM as_members WHERE firstName LIKE '%$q%' ORDER BY createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT memberID FROM as_members WHERE firstName LIKE '%$q%'";
	}
	elseif ($t == '2')
	{
		$queryMember = "SELECT * FROM as_members WHERE lastName LIKE '%$q%' ORDER BY createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT memberID FROM as_members WHERE lastName LIKE '%$q%'";
	}
	elseif ($t == '3')
	{
		$queryMember = "SELECT * FROM as_members WHERE email = '$q' ORDER BY createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT memberID FROM as_members WHERE email = '$q'";
	}
	elseif ($t == '4')
	{
		$queryMember = "SELECT * FROM as_members WHERE cellPhone = '$q' ORDER BY createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT memberID FROM as_members WHERE cellPhone = '$q'";
	}
	
	$sqlMember = mysqli_query($connect, $queryMember);
	$i = 1 + $posisi;
	while ($dtMember = mysqli_fetch_array($sqlMember))
	{
		
		$dataMember[] = array(	'memberID' => $dtMember['memberID'],
								'firstName' => $dtMember['firstName'],
								'lastName' => $dtMember['lastName'],
								'gender' => $dtMember['gender'],
								'status' => $dtMember['status'],
								'email' => $dtMember['email'],
								'cellPhone' => $dtMember['cellPhone'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataMember", $dataMember);
	
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsMember", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Find Member");
}

else
{
	// showing up the admin member
	$p = new PagingMember;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryMember = "SELECT * FROM as_members ORDER BY createdDate DESC LIMIT $posisi,$batas";
	$sqlMember = mysqli_query($connect, $queryMember);
	$i = 1 + $posisi;
	while ($dtMember = mysqli_fetch_array($sqlMember))
	{
		
		$dataMember[] = array(	'memberID' => $dtMember['memberID'],
								'firstName' => $dtMember['firstName'],
								'lastName' => $dtMember['lastName'],
								'gender' => $dtMember['gender'],
								'status' => $dtMember['status'],
								'email' => $dtMember['email'],
								'cellPhone' => $dtMember['cellPhone'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataMember", $dataMember);
	
	$queryJmlData = "SELECT memberID FROM as_members";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsMember", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Find Member");
	
	$smarty->assign("msg", $_SESSION['sessMember']);
	$_SESSION['sessMember'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
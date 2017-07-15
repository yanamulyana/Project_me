<?php
include "header.php";
$page = "resellers.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

if ($_SESSION['sessLevel'] != '1')
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is reseller and act is view 
if ($module == 'reseller' && $act == 'view')
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
	$smarty->assign("level", $dataMember['level']);
	$smarty->assign("createdDate", $dataMember['createdDate']);
	$smarty->assign("pointTotal", format_rupiah($dataMember['pointTotal']));
	$smarty->assign("lastLogin", $dataMember['lastLogin']);
	$smarty->assign("requirement", $dataMember['requirement']);
	
	$smarty->assign("metaTitle", "View Member");
	
	// showing up the history
	$p = new PagingHistoryReseller;
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

// if mod is reseller and act is edit
elseif ($module == 'reseller' && $act == 'edit')
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
	$smarty->assign("level", $dataMember['level']);
	$smarty->assign("createdDate", $dataMember['createdDate']);
	$smarty->assign("pointTotal", format_rupiah($dataMember['pointTotal']));
	$smarty->assign("lastLogin", $dataMember['lastLogin']);
	$smarty->assign("requirement", $dataMember['requirement']);
	
	$smarty->assign("metaTitle", "Edit Member");
}

// if mod is reseller and act is update
elseif ($module == 'reseller' && $act == 'update')
{
	$memberID = $_POST['memberID'];
	$level = $_POST['level'];
	$requirement = $_POST['requirement'];
	
	$queryMember = "UPDATE as_members SET	level = '$level',
											requirement = '$requirement'
											WHERE memberID = '$memberID'";
	mysqli_query($connect, $queryMember);
	
	$_SESSION['sessMember'] = 1;
	
	header("Location: resellers.php");
}

// if mod is reseller and act is search
elseif ($module == 'reseller' && $act == 'search')
{
	$t = $_GET['t'];
	$smarty->assign("t", $t);
	$q = mysqli_real_escape_string($connect, $_GET['q']);
	$smarty->assign("q", $q);
	
	// showing up the admin reseller search
	$p = new PagingResellerSearch;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	if ($t == '1')
	{
		$queryMember = "SELECT * FROM as_members WHERE level = '2' AND firstName LIKE '%$q%' ORDER BY createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT memberID FROM as_members WHERE level = '2' AND firstName LIKE '%$q%'";
	}
	elseif ($t == '2')
	{
		$queryMember = "SELECT * FROM as_members WHERE level = '2' AND lastName LIKE '%$q%' ORDER BY createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT memberID FROM as_members WHERE level = '2' AND lastName LIKE '%$q%'";
	}
	elseif ($t == '3')
	{
		$queryMember = "SELECT * FROM as_members WHERE level = '2' AND email = '$q' ORDER BY createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT memberID FROM as_members WHERE level = '2' AND email = '$q'";
	}
	elseif ($t == '4')
	{
		$queryMember = "SELECT * FROM as_members WHERE level = '2' AND cellPhone = '$q' ORDER BY createdDate DESC LIMIT $posisi,$batas";
		$queryJmlData = "SELECT memberID FROM as_members WHERE level = '2' AND cellPhone = '$q'";
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
	// showing up the admin reseller
	$p = new PagingReseller;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryMember = "SELECT * FROM as_members WHERE level = '2' ORDER BY createdDate DESC LIMIT $posisi,$batas";
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
	
	$queryJmlData = "SELECT memberID FROM as_members WHERE level = '2'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsMember", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Find Reseller");
	
	$smarty->assign("msg", $_SESSION['sessMember']);
	$_SESSION['sessMember'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
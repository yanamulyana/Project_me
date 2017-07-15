<?php
include "header.php";
$page = "services.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is services and act is add
if ($module == 'service' && $act == 'add')
{
	$queryCourier = "SELECT * FROM as_couriers WHERE status = 'Y' ORDER BY courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName']);
	}
	$smarty->assign("dataCourier", $dataCourier);
	
	$smarty->assign("metaTitle", "Tambah Layanan");
}

// if mod is service and act is import
elseif ($module == 'service' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Layanan Ekspedisi");
}

// if mod is service and act is input
elseif ($module == 'service' && $act == 'input')
{
	$courierID = $_POST['courierID'];
	$serviceName = mysqli_real_escape_string($connect, $_POST['serviceName']);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryService = "INSERT INTO as_services (	courierID,
												serviceName,
												status,
												createdDate,
												createdUserID,
												modifiedDate,
												modifiedUserID)
										VALUES(	'$courierID',
												'$serviceName',
												'$status',
												'$createdDate',
												'$sessUserID',
												'',
												'')";
	mysqli_query($connect, $queryService);
	
	$_SESSION['sessService'] = 1;
	
	header("Location: services.php");
}

// if mod is service and act is edit
elseif ($module == 'service' && $act == 'edit')
{
	$serviceID = $_GET['serviceID'];
	
	// showing up the service
	$queryService = "SELECT * FROM as_services WHERE serviceID = '$serviceID'";
	$sqlService = mysqli_query($connect, $queryService);
	$dataService = mysqli_fetch_array($sqlService);
	
	$smarty->assign("serviceID", $dataService['serviceID']);
	$smarty->assign("courierID", $dataService['courierID']);
	$smarty->assign("serviceName", $dataService['serviceName']);
	$smarty->assign("status", $dataService['status']);
	
	$queryCourier = "SELECT * FROM as_couriers WHERE status = 'Y' ORDER BY courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName']);
	}
	$smarty->assign("dataCourier", $dataCourier);
	
	$smarty->assign("metaTitle", "Edit Layanan");
}

// if mod is service and act is update
elseif ($module == 'service' && $act == 'update')
{
	$courierID = $_POST['courierID'];
	$serviceID = $_POST['serviceID'];
	$serviceName = mysqli_real_escape_string($connect, $_POST['serviceName']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryService = "UPDATE as_services SET	courierID = '$courierID',
											serviceName = '$serviceName',
											status = '$status',
											modifiedDate = '$modifiedDate',
											modifiedUserID = '$sessUserID'
											WHERE serviceID = '$serviceID'";
	
	mysqli_query($connect, $queryService);
	
	$_SESSION['sessService'] = 2;
	
	header("Location: services.php");
}

// if mod is service and act is delete
elseif ($module == 'service' && $act == 'delete')
{
	$serviceID = $_GET['serviceID'];
	
	$queryService = "DELETE FROM as_services WHERE serviceID = '$serviceID'";
	mysqli_query($connect, $queryService);
	
	$_SESSION['sessService'] = 3;
	
	header("Location: services.php");
}

else
{
	$smarty->assign("msg", $_SESSION['sessService']);
	$_SESSION['sessService'] = "";
	
	// showing up the admin service
	$p = new PagingService;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryService = "SELECT A.courierID, A.serviceID, A.serviceName, A.status, B.courierName FROM as_services A INNER JOIN as_couriers B ON A.courierID = B.courierID ORDER BY A.courierID ASC LIMIT $posisi,$batas";
	$sqlService = mysqli_query($connect, $queryService);
	$numsService = mysqli_num_rows($sqlService);
	
	$i = 1 + $posisi;
	while ($dtService = mysqli_fetch_array($sqlService))
	{
		if ($dtService['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataService[] = array(	'courierID' => $dtService['courierID'],
								'serviceID' => $dtService['serviceID'],
								'courierName' => $dtService['courierName'],
								'serviceName' => $dtService['serviceName'],
								'status' => $status,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataService", $dataService);
	
	$queryJmlData = "SELECT A.courierID FROM as_services A INNER JOIN as_couriers B ON A.courierID = B.courierID";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsService", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Layanan");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
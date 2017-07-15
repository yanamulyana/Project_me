<?php
include "header.php";
$page = "locations.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is location and act is add
if ($module == 'location' && $act == 'add')
{
	$queryCourier = "SELECT * FROM as_couriers WHERE status = 'Y' ORDER BY courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName']);
	}
	$smarty->assign("dataCourier", $dataCourier);
	
	// showing up the province
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	$smarty->assign("dataProvince", $dataProvince);
	
	$smarty->assign("metaTitle", "Tambah Lokasi Pengambilan");
}

// if mod is location and act is import
elseif ($module == 'location' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Lokasi Pengambilan");
}

// if mod is location and act is input
elseif ($module == 'location' && $act == 'input')
{
	$courierID = $_POST['courierID'];
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$locationName = mysqli_real_escape_string($connect, $_POST['locationName']);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryLocation = "INSERT INTO as_locations (courierID,
												provinceID,
												cityID,
												locationName,
												status,
												createdDate,
												createdUserID,
												modifiedDate,
												modifiedUserID)
										VALUES(	'$courierID',
												'$provinceID',
												'$cityID',
												'$locationName',
												'$status',
												'$createdDate',
												'$sessUserID',
												'',
												'')";
	mysqli_query($connect, $queryLocation);
	
	$_SESSION['sessLocation'] = 1;
	
	header("Location: locations.php");
}

// if mod is location and act is edit
elseif ($module == 'location' && $act == 'edit')
{
	$locationID = $_GET['locationID'];
	
	// showing up the location
	$queryLocation = "SELECT * FROM as_locations WHERE locationID = '$locationID'";
	$sqlLocation = mysqli_query($connect, $queryLocation);
	$dataLocation = mysqli_fetch_array($sqlLocation);
	
	$smarty->assign("locationID", $dataLocation['locationID']);
	$smarty->assign("provinceID", $dataLocation['provinceID']);
	$smarty->assign("courierID", $dataLocation['courierID']);
	$smarty->assign("cityID", $dataLocation['cityID']);
	$smarty->assign("locationName", $dataLocation['locationName']);
	$smarty->assign("status", $dataLocation['status']);
	
	$queryCourier = "SELECT * FROM as_couriers WHERE status = 'Y' ORDER BY courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName']);
	}
	$smarty->assign("dataCourier", $dataCourier);
	
	// showing up the province
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	$smarty->assign("dataProvince", $dataProvince);
	
	// showing up the cities
	$queryCity = "SELECT * FROM as_cities WHERE status = 'Y' AND provinceID = '$dataLocation[provinceID]' ORDER BY cityName ASC";
	$sqlCity = mysqli_query($connect, $queryCity);
	while ($dtCity = mysqli_fetch_array($sqlCity))
	{
		$dataCity[] = array(	'cityID' => $dtCity['cityID'],
								'cityName' => $dtCity['cityName']);
	}
	$smarty->assign("dataCity", $dataCity);
	
	$smarty->assign("metaTitle", "Edit Layanan");
}

// if mod is location and act is update
elseif ($module == 'location' && $act == 'update')
{
	$locationID = $_POST['locationID'];
	$courierID = $_POST['courierID'];
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$locationName = mysqli_real_escape_string($connect, $_POST['locationName']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryLocation = "UPDATE as_locations SET	courierID = '$courierID',
												provinceID = '$provinceID',
												cityID = '$cityID',
												locationName = '$locationName',
												status = '$status',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE locationID = '$locationID'";
	
	mysqli_query($connect, $queryLocation);
	
	$_SESSION['sessLocation'] = 2;
	
	header("Location: locations.php");
}

// if mod is location and act is delete
elseif ($module == 'location' && $act == 'delete')
{
	$locationID = $_GET['locationID'];
	
	$queryLocation = "DELETE FROM as_locations WHERE locationID = '$locationID'";
	mysqli_query($connect, $queryLocation);
	
	$_SESSION['sessLocation'] = 3;
	
	header("Location: locations.php");
}

else
{
	$smarty->assign("msg", $_SESSION['sessLocation']);
	$_SESSION['sessLocation'] = "";
	
	// showing up the admin location
	$p = new PagingLocation;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryLocation = "SELECT * FROM as_locations ORDER BY courierID, provinceID, cityID, locationName ASC LIMIT $posisi,$batas";
	$sqlLocation = mysqli_query($connect, $queryLocation);
	$numsLocation = mysqli_num_rows($sqlLocation);
	
	$i = 1 + $posisi;
	while ($dtLocation = mysqli_fetch_array($sqlLocation))
	{
		if ($dtLocation['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		// provinces
		$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dtLocation[provinceID]'";
		$sqlProvince = mysqli_query($connect, $queryProvince);
		$dataProvince = mysqli_fetch_array($sqlProvince);
		
		// cities
		$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dtLocation[cityID]' AND provinceID = '$dtLocation[provinceID]'";
		$sqlCity = mysqli_query($connect, $queryCity);
		$dataCity = mysqli_fetch_array($sqlCity);
		
		// courier
		$queryCourier = "SELECT courierName FROM as_couriers WHERE courierID = '$dtLocation[courierID]'";
		$sqlCourier = mysqli_query($connect, $queryCourier);
		$dataCourier = mysqli_fetch_array($sqlCourier);
		
		$dataLocation[] = array(	'locationID' => $dtLocation['locationID'],
									'provinceName' => $dataProvince['provinceName'],
									'courierName' => $dataCourier['courierName'],
									'cityName' => $dataCity['cityName'],
									'locationName' => $dtLocation['locationName'],
									'status' => $status,
									'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataLocation", $dataLocation);
	
	$queryJmlData = "SELECT locationID FROM as_locations";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsLocation", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Lokasi Pengambilan");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
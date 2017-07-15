<?php
include "header.php";
$page = "costs.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is cost and act is add
if ($module == 'cost' && $act == 'add')
{
	$provinceID = mysqli_real_escape_string($connect, $_GET['provinceID']);
	$cityID = mysqli_real_escape_string($connect, $_GET['cityID']);
	
	$queryLocation = "SELECT A.provinceName, A.provinceID, B.cityID, B.cityName FROM as_provinces A INNER JOIN as_cities B ON A.provinceID = B.provinceID WHERE A.provinceID = '$provinceID' AND B.cityID = '$cityID'";
	$sqlLocation = mysqli_query($connect, $queryLocation);
	$dataLocation = mysqli_fetch_array($sqlLocation);
	
	$smarty->assign("provinceName", $dataLocation['provinceName']);
	$smarty->assign("cityName", $dataLocation['cityName']);
	
	$smarty->assign("provinceID", $provinceID);
	$smarty->assign("cityID", $cityID);
	
	if ($provinceID == "" || $cityID == "")
	{
		echo "Anda terdeteksi melakukan manajemen diluar sistem";
		exit();
	}
	
	$queryCourier = "SELECT * FROM as_couriers WHERE status = 'Y' ORDER BY courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName']);
	}
	$smarty->assign("dataCourier", $dataCourier);
	
	// showing up the provinces
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	$smarty->assign("dataProvince", $dataProvince);
	
	$smarty->assign("metaTitle", "Tambah Biaya Kirim");
}

// if mod is cost and act is input
elseif ($module == 'cost' && $act == 'input')
{
	$courierID = $_POST['courierID'];
	$serviceID = $_POST['serviceID'];
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$estimateDay = mysqli_real_escape_string($connect, $_POST['estimateDay']);
	$weightCostS = $_POST['weightCostStart'];
	$weightCostE = $_POST['weightCostEnd'];
	$shipping = $_POST['shippingCost'];
	$shippingStat = $_POST['shippingStatus'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryCost = "INSERT INTO as_shipping_costs (	courierID,
													serviceID,
													provinceID,
													cityID,
													estimateDay,
													createdDate,
													createdUserID,
													modifiedDate,
													modifiedUserID)
											VALUES(	'$courierID',
													'$serviceID',
													'$provinceID',
													'$cityID',
													'$estimateDay',
													'$createdDate',
													'$sessUserID',
													'',
													'')";
	mysqli_query($connect, $queryCost);
	
	$costID = mysqli_insert_id($connect);
	
	for ($i = 0; $i < 5; $i++)
	{
		$weightCostStart = mysqli_real_escape_string($connect, $weightCostS[$i]);
		$weightCostEnd = mysqli_real_escape_string($connect, $weightCostE[$i]);
		$shippingCost = mysqli_real_escape_string($connect, $shipping[$i]);
		$shippingStatus = $shippingStat[$i];
		
		if ($weightCostStart != "" && $weightCostEnd != "" && $shippingCost != "")
		{
			$queryWeightCost = "INSERT INTO as_shipping_weight_costs (	costID,
																		weightFrom,
																		weightTo,
																		shippingCost,
																		shippingStatus)
																VALUES(	'$costID',
																		'$weightCostStart',
																		'$weightCostEnd',
																		'$shippingCost',
																		'$shippingStatus')";
			mysqli_query($connect, $queryWeightCost);
		}
	}
	
	$_SESSION['sessCost'] = 1;
	
	header("Location: costs.php?mod=cost&act=view&provinceID=".$provinceID."&cityID=".$cityID);
}

// if mod is cost and act is edit
elseif ($module == 'cost' && $act == 'edit')
{
	$costID = mysqli_real_escape_string($connect, $_GET['costID']);
	$provinceID = mysqli_real_escape_string($connect, $_GET['provinceID']);
	$cityID = mysqli_real_escape_string($connect, $_GET['cityID']);
	
	$queryLocation = "SELECT A.provinceName, A.provinceID, B.cityID, B.cityName FROM as_provinces A INNER JOIN as_cities B ON A.provinceID = B.provinceID WHERE A.provinceID = '$provinceID' AND B.cityID = '$cityID'";
	$sqlLocation = mysqli_query($connect, $queryLocation);
	$dataLocation = mysqli_fetch_array($sqlLocation);
	
	$smarty->assign("provinceName", $dataLocation['provinceName']);
	$smarty->assign("cityName", $dataLocation['cityName']);
	
	// showing up the cost
	$queryCost = "SELECT * FROM as_shipping_costs WHERE costID = '$costID'";
	$sqlCost = mysqli_query($connect, $queryCost);
	$dataCost = mysqli_fetch_array($sqlCost);
	
	$smarty->assign("costID", $dataCost['costID']);
	$smarty->assign("courierID", $dataCost['courierID']);
	$smarty->assign("serviceID", $dataCost['serviceID']);
	$smarty->assign("provinceID", $dataCost['provinceID']);
	$smarty->assign("cityID", $dataCost['cityID']);
	$smarty->assign("estimateDay", $dataCost['estimateDay']);
	
	// showing up the costs
	$queryWeightCost = "SELECT * FROM as_shipping_weight_costs WHERE costID = '$dataCost[costID]' ORDER BY weightFrom ASC";
	$sqlWeightCost = mysqli_query($connect, $queryWeightCost);
	
	while ($dtWeightCost = mysqli_fetch_array($sqlWeightCost))
	{
		$dataWeightCost[] = array(	'weightCostID' => $dtWeightCost['weightCostID'],
									'weightFrom' => $dtWeightCost['weightFrom'],
									'weightTo' => $dtWeightCost['weightTo'],
									'shippingCost' => $dtWeightCost['shippingCost'],
									'shippingStatus' => $dtWeightCost['shippingStatus']);
	}
	$smarty->assign("dataWeightCost", $dataWeightCost);
	
	// showing up the courier
	$queryCourier = "SELECT * FROM as_couriers WHERE status = 'Y' ORDER BY courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName']);
	}
	$smarty->assign("dataCourier", $dataCourier);
	
	// showing up the service
	$queryService = "SELECT * FROM as_services WHERE status = 'Y' AND courierID = '$dataCost[courierID]' ORDER BY serviceName ASC";
	$sqlService = mysqli_query($connect, $queryService);
	while ($dtService = mysqli_fetch_array($sqlService))
	{
		$dataService[] = array(	'serviceID' => $dtService['serviceID'],
								'serviceName' => $dtService['serviceName']);
	}
	$smarty->assign("dataService", $dataService);
	
	// showing up the provinces
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	$smarty->assign("dataProvince", $dataProvince);
	
	// showing up the the cities
	$queryCity = "SELECT * FROM as_cities WHERE status = 'Y' AND provinceID = '$dataCost[provinceID]' ORDER BY cityName ASC";
	$sqlCity = mysqli_query($connect, $queryCity);
	while ($dtCity = mysqli_fetch_array($sqlCity))
	{
		$dataCity[] = array('cityID' => $dtCity['cityID'],
							'cityName' => $dtCity['cityName']);
	}
	$smarty->assign("dataCity", $dataCity);
	
	$smarty->assign("metaTitle", "Edit Biaya Kirim");
}

// if mod is cost and act is update
elseif ($module == 'cost' && $act == 'update')
{
	$costID = $_POST['costID'];
	$courierID = $_POST['courierID'];
	$serviceID = $_POST['serviceID'];
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$estimateDay = mysqli_real_escape_string($connect, $_POST['estimateDay']);
	$weightCostS = $_POST['weightCostStart'];
	$weightCostE = $_POST['weightCostEnd'];
	$shipping = $_POST['shippingCost'];	
	$weightCost = $_POST['weightCostID'];
	$shippingStat = $_POST['shippingStatus'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryCost = "UPDATE as_shipping_costs SET	courierID = '$courierID',
												serviceID = '$serviceID',
												estimateDay = '$estimateDay',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE costID = '$costID'";
	
	mysqli_query($connect, $queryCost);
	
	for ($i = 0; $i < 5; $i++)
	{
		$weightCostStart = mysqli_real_escape_string($connect, $weightCostS[$i]);
		$weightCostEnd = mysqli_real_escape_string($connect, $weightCostE[$i]);
		$shippingCost = mysqli_real_escape_string($connect, $shipping[$i]);
		$weightCostID = mysqli_real_escape_string($connect, $weightCost[$i]);
		$shippingStatus = $shippingStat[$i];
		
		if ($weightCostStart != "" && $weightCostEnd != "" && $shippingCost != "" && $weightCostID != "")
		{
			$queryWeightCost = "UPDATE as_shipping_weight_costs SET	weightFrom = '$weightCostStart',
																	weightTo = '$weightCostEnd',
																	shippingCost = '$shippingCost',
																	shippingStatus = '$shippingStatus'
																	WHERE weightCostID = '$weightCostID'";
			mysqli_query($connect, $queryWeightCost);
		}
	}
	
	$_SESSION['sessCost'] = 2;
	
	header("Location: costs.php?mod=cost&act=view&provinceID=".$provinceID."&cityID=".$cityID);
}

// if mod is cost and act is delete
elseif ($module == 'cost' && $act == 'delete')
{
	$costID = $_GET['costID'];
	$provinceID = $_GET['provinceID'];
	$cityID = $_GET['cityID'];
	
	$queryCost = "DELETE FROM as_shipping_costs WHERE costID = '$costID'";
	mysqli_query($connect, $queryCost);
	
	$queryWeightCost = "DELETE FROM as_shipping_weight_costs WHERE costID = '$costID'";
	mysqli_query($connect, $queryWeightCost);
	
	$_SESSION['sessCost'] = 3;
	
	header("Location: costs.php?mod=cost&act=view&provinceID=".$provinceID.'&cityID='.$cityID);
}

// view
elseif ($module == 'cost' && $act == 'view')
{
	$provinceID = mysqli_real_escape_string($connect, $_GET['provinceID']);
	$cityID = mysqli_real_escape_string($connect, $_GET['cityID']);
	
	$queryLocation = "SELECT A.provinceName, A.provinceID, B.cityID, B.cityName FROM as_provinces A INNER JOIN as_cities B ON A.provinceID = B.provinceID WHERE A.provinceID = '$provinceID' AND B.cityID = '$cityID'";
	$sqlLocation = mysqli_query($connect, $queryLocation);
	$dataLocation = mysqli_fetch_array($sqlLocation);
	
	$smarty->assign("provinceName", $dataLocation['provinceName']);
	$smarty->assign("cityName", $dataLocation['cityName']);
	$smarty->assign("provinceID", $dataLocation['provinceID']);
	$smarty->assign("cityID", $dataLocation['cityID']);
	
	$queryCost = "SELECT A.costID, A.estimateDay, A.provinceID, A.cityID, B.courierName, C.serviceName FROM as_shipping_costs A INNER JOIN as_couriers B ON A.courierID = B.courierID INNER JOIN as_services C ON A.serviceID = C.serviceID 
	WHERE A.provinceID = '$provinceID' AND A.cityID = '$cityID' ORDER BY B.courierName, C.serviceID ASC";
	$sqlCost = mysqli_query($connect, $queryCost);
	$i = 1;
	while ($dtCost = mysqli_fetch_array($sqlCost))
	{
		$dataWeightCost = array();
		$queryWeightCost = "SELECT * FROM as_shipping_weight_costs WHERE costID = '$dtCost[costID]' ORDER BY weightFrom ASC";
		$sqlWeightCost = mysqli_query($connect, $queryWeightCost);
		while ($dtWeightCost = mysqli_fetch_array($sqlWeightCost))
		{
			if ($dtWeightCost['shippingStatus'] == 'K')
			{
				$status = "Per Kg";
			}
			else
			{
				$status = "Borongan / Global";
			}
			$dataWeightCost[] = array(	'weightCostID' => $dtWeightCost['weightCostID'],
										'weightFrom' => $dtWeightCost['weightFrom'],
										'weightTo' => $dtWeightCost['weightTo'],
										'shippingCost' => format_rupiah($dtWeightCost['shippingCost']),
										'shippingStatus' => $status);
		}
		
		$dataCost[] = array('costID' => $dtCost['costID'],
							'courierName' => $dtCost['courierName'],
							'serviceName' => $dtCost['serviceName'],
							'estimateDay' => $dtCost['estimateDay'],
							'provinceID' => $dtCost['provinceID'],
							'cityID' => $dtCost['cityID'],
							'dataWeightCost' => $dataWeightCost,
							'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCost", $dataCost);
	
	$smarty->assign("metaTitle", "Manajemen Biaya Kirim");
}

// search city
elseif ($module == 'cost' && $act == 'search')
{
	$q = mysqli_real_escape_string($connect, $_GET['q']);
	
	$queryCost = "SELECT B.cityID, B.cityName, A.provinceName, A.provinceID FROM as_provinces A INNER JOIN as_cities B ON A.provinceID = B.provinceID WHERE A.status = 'Y' AND B.status = 'Y' AND B.cityName LIKE '%$q%' ORDER BY A.provinceName, B.cityName ASC";
	$sqlCost = mysqli_query($connect, $queryCost);
	$i = 1;
	while ($dtCost = mysqli_fetch_array($sqlCost))
	{
		$queryShippingCost = "SELECT B.courierName FROM as_shipping_costs A INNER JOIN as_couriers B ON A.courierID = B.courierID WHERE A.provinceID = '$dtCost[provinceID]' AND A.cityID = '$dtCost[cityID]'";
		$sqlShippingCost = mysqli_query($connect, $queryShippingCost);
		$dataShippingCost = array();
		while ($dtShippingCost = mysqli_fetch_array($sqlShippingCost))
		{
			$dataShippingCost[] = array('courierName' => $dtShippingCost['courierName']);
		}

		$dataCost[] = array(	'cityID' => $dtCost['cityID'],
								'provinceName' => $dtCost['provinceName'],
								'provinceID' => $dtCost['provinceID'],
								'cityName' => $dtCost['cityName'],
								'dataShippingCost' => $dataShippingCost,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCost", $dataCost);
	
	$smarty->assign("metaTitle", "Manajemen Biaya Kirim");
}

else
{
	$smarty->assign("msg", $_SESSION['sessCost']);
	$_SESSION['sessCost'] = "";
	
	 // showing up the admin cost
	$p = new PagingCost;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryCost = "SELECT B.cityID, B.cityName, A.provinceName, A.provinceID FROM as_provinces A INNER JOIN as_cities B ON A.provinceID = B.provinceID WHERE A.status = 'Y' AND B.status = 'Y' ORDER BY A.provinceName, B.cityName ASC LIMIT $posisi,$batas";
	$sqlCost = mysqli_query($connect, $queryCost);
	$numsCost = mysqli_num_rows($sqlCost);
	
	$i = 1 + $posisi;
	while ($dtCost = mysqli_fetch_array($sqlCost))
	{
		$queryShippingCost = "SELECT B.courierName FROM as_shipping_costs A INNER JOIN as_couriers B ON A.courierID = B.courierID WHERE A.provinceID = '$dtCost[provinceID]' AND A.cityID = '$dtCost[cityID]'";
		$sqlShippingCost = mysqli_query($connect, $queryShippingCost);
		$dataShippingCost = array();
		while ($dtShippingCost = mysqli_fetch_array($sqlShippingCost))
		{
			$dataShippingCost[] = array('courierName' => $dtShippingCost['courierName']);
		}

		$dataCost[] = array(	'cityID' => $dtCost['cityID'],
								'provinceName' => $dtCost['provinceName'],
								'provinceID' => $dtCost['provinceID'],
								'cityName' => $dtCost['cityName'],
								'dataShippingCost' => $dataShippingCost,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCost", $dataCost);
	
	$queryJmlData = "SELECT A.provinceID FROM as_provinces A INNER JOIN as_cities B ON A.provinceID = B.provinceID WHERE A.status = 'Y' AND B.status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsCost", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Biaya Kirim");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
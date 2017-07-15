<?php
include "header.php";
$page = "checkout.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

// if mod is checkout and act is show
if ($module == 'checkout' && $act == 'show')
{
	$queryCart = "SELECT A.cartID, B.weight, A.productID, B.point, B.ukuran, B.productSeo, A.price, A.qty, A.subtotal, B.productSeo, B.productName, B.image1, B.qty as stock
				FROM as_carts A INNER JOIN as_products B ON A.productID=B.productID
				WHERE A.invoiceID = '$invoice'";
	$sqlCart = mysqli_query($connect, $queryCart);
	$i = 1;
	while ($dtCart = mysqli_fetch_array($sqlCart))
	{
		$weight = $dtCart['weight'];
		$stock = array();
		for ($k = 1; $k <= $dtCart['stock']; $k++)
		{
			$stock[] = $k;
		}
		
		$point = $dtCart['point'] * $dtCart['qty'];
		
		$dataCart[] = array('cartID' => $dtCart['cartID'],
							'productID' => $dtCart['productID'],
							'ukuran' => $dtCart['ukuran'],
							// 'volume' => $dtCart['volume'],
							// 'alcohol' => $dtCart['alcohol'],
							'price' => $dtCart['price'],
							'priceRp' => format_rupiah($dtCart['price']),
							'qty' => $dtCart['qty'],
							'weight' => $weight,
							'subtotal' => $dtCart['subtotal'],
							'subtotalRp' => format_rupiah($dtCart['subtotal']),
							'productName' => $dtCart['productName'],
							'productSeo' => $dtCart['productSeo'],
							'image' => $dtCart['image1'],
							'stock' => $stock,
							'no' => $i);
		$subQty += $dtCart['qty'];
		$totalPoint += $point;
		$i++;
	}
	
	$smarty->assign("point", $totalPoint);
	$smarty->assign("subQty", $subQty);
	$smarty->assign("dataCart", $dataCart);
	
	$smarty->assign("metaTitle", "Keranjang Belanja");
}

// if mod is checkout and act is coupon
elseif ($module == 'checkout' && $act == 'coupon')
{
	$queryCart = "SELECT SUM(subtotal) as subtotal FROM as_carts WHERE invoiceID = '$invoice'";
	$sqlCart = mysqli_query($connect, $queryCart);
	$dataCart = mysqli_fetch_array($sqlCart);
	
	$queryCoupon = "SELECT A.couponID, A.pointID, A.qty, B.pointName, B.minTrx, B.coupon FROM as_coupons A INNER JOIN as_points B ON A.pointID = B.pointID WHERE A.memberID = '$sessMemberID' AND B.minTrx < $dataCart[subtotal] GROUP BY A.pointID ASC";
	$sqlCoupon = mysqli_query($connect, $queryCoupon);
	while ($dtCoupon = mysqli_fetch_array($sqlCoupon))
	{
		$dataCoupon[] = array(	'couponID' => $dtCoupon['couponID'],
								'pointID' => $dtCoupon['pointID'],
								'pointName' => $dtCoupon['pointName'],
								'minTrx' => $dtCoupon['minTrx'],
								'coupon' => $dtCoupon['coupon'],
								'couponRp' => format_rupiah($dtCoupon['coupon']));
	}
	
	$smarty->assign("dataCoupon", $dataCoupon);
	$smarty->assign("metaTitle", "Informasi Kupon Diskon");
}

// if mod is checkout and act is insertcoupon
elseif ($module == 'checkout' && $act == 'insertcoupon')
{
	$pointID = $_POST['pointID'];
	$couponID = $_POST['couponID'];
	$_SESSION['sessPointID'] = $pointID;
	$_SESSION['couponID'] = $couponID;
	
	header("Location: confirm-order.html");
}

// if mod is checkout and act is ignorecoupon
elseif ($module == 'checkout' && $act == 'ignorecoupon')
{
	$_SESSION['sessPointID'] = "";
	$_SESSION['couponID'] = "";
	
	header("Location: confirm-order.html");
}

// if mod is checkout and act is shipping address
elseif ($module == 'checkout' && $act == 'shippingaddress')
{
	$smarty->assign("sessShippingID", $_SESSION['sessShippingID']);
	$smarty->assign("sessCourierID", $_SESSION['sessCourierID']);
	$smarty->assign("sessLocationID", $_SESSION['sessLocationID']);
	$smarty->assign("sessInsuranceID", $_SESSION['sessInsuranceID']);
	$smarty->assign("sessNote", $_SESSION['sessNote']);
	$smarty->assign("sessCouponID", $_SESSION['sessCouponID']);
	$smarty->assign("insurance", "+ Rp. ". format_rupiah($_SESSION['sessInsurance']));
	$smarty->assign("metaTitle", "Shipping Address");
	$smarty->assign("sessFull", $_SESSION['sessFull']);
	
	$total = $_SESSION['sessTotalCost'];
	
	if ($_SESSION['sessInsurance'] != '0')
	{
		$totalInsurance = $_SESSION['sessInsurance']; 
	}
	else
	{
		$totalInsurance = 0;
	}
	
	$smarty->assign("totalCost", $total);
	$smarty->assign("totalInsurance", $totalInsurance);
	$smarty->assign("total", format_rupiah($total));
	
	$courier = explode("|", $_SESSION['sessCourierID']);
	$costID = $_SESSION['sessCostID'];
	
	// showing up the shipping
	$queryShipping = "SELECT * FROM as_shippings WHERE memberID = '$sessMemberID' ORDER BY receivedName ASC";
	$sqlShipping = mysqli_query($connect, $queryShipping);
	
	while ($dtShipping = mysqli_fetch_array($sqlShipping))
	{
		$dataShipping[] = array(	'shippingID' => $dtShipping['shippingID'],
									'receivedName' => $dtShipping['receivedName']);
	}
	
	$smarty->assign("dataShipping", $dataShipping);
	
	$queryCart = "SELECT B.weight, A.qty, A.subtotal FROM as_carts A INNER JOIN as_products B ON A.productID=B.productID WHERE A.invoiceID = '$invoice'";
	$sqlCart = mysqli_query($connect, $queryCart);
	$i = 1;
	while ($dtCart = mysqli_fetch_array($sqlCart))
	{
		$weight = $dtCart['qty'] * $dtCart['weight'];
		
		$subWeight += $weight;
		$subtotal += $dtCart['subtotal'];
		$i++;
	}
	$smarty->assign("subWeight", $subWeight);
	$smarty->assign("subtotal", $subtotal);
	$smarty->assign("subtotalRp", format_rupiah($subtotal));
	
	$sessShippingID = $_SESSION['sessShippingID'];
	
	if ($sessShippingID == '' || $sessShippingID == '+')
	{
		$queryMember = "SELECT * FROM as_members WHERE memberID = '$sessMemberID'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		
		$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]' AND status = 'Y'";
		$sqlProvince = mysqli_query($connect, $queryProvince);
		$dataProvince = mysqli_fetch_array($sqlProvince);
		
		// get the cityname
		$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]' AND status = 'Y'";
		$sqlCity = mysqli_query($connect, $queryCity);
		$dataCity = mysqli_fetch_array($sqlCity);
		
		$smarty->assign("mainName", $dataMember['firstName']." ".$dataMember['lastName']);
		$smarty->assign("address", $dataMember['address']);
		$smarty->assign("provinceName", $dataProvince['provinceName']);
		$smarty->assign("cityName", $dataCity['cityName']);
		$smarty->assign("zipCode", $dataMember['zipCode']);
		$smarty->assign("phone", $dataMember['phone']);
		$smarty->assign("cellPhone", $dataMember['cellPhone']);
		
		$queryLocation = "SELECT * FROM as_locations WHERE courierID = '$courier[0]' AND provinceID = '$dataMember[provinceID]' AND cityID = '$dataMember[cityID]' AND status = 'Y' ORDER BY locationName ASC";
		$sqlLocation = mysqli_query($connect, $queryLocation);
		$numsLocation = mysqli_num_rows($sqlLocation);
		while ($dtLocation = mysqli_fetch_array($sqlLocation))
		{
			$dataLocation[] = array (	'locationID' => $dtLocation['locationID'],
										'locationName' => $dtLocation['locationName']);
		}
		
		$smarty->assign("dataLocation", $dataLocation);
		
		$queryCourier = "SELECT A.courierID, B.serviceID, A.courierName, D.costID, A.addCost, A.insurance, B.serviceName, C.estimateDay 
		FROM as_couriers A INNER JOIN as_services B ON A.courierID = B.courierID 
		INNER JOIN as_shipping_costs C ON B.serviceID = C.serviceID 
		INNER JOIN as_shipping_weight_costs D ON D.costID = C.costID WHERE A.status = 'Y'
		AND C.provinceID = '$dataMember[provinceID]' AND C.cityID = '$dataMember[cityID]' GROUP BY D.costID ORDER BY A.courierName ASC";
		$sqlCourier = mysqli_query($connect, $queryCourier);
		
		while ($dtCourier = mysqli_fetch_array($sqlCourier))
		{
			$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
									'courierName' => $dtCourier['courierName'],
									'serviceName' => $dtCourier['serviceName'],
									'serviceID' => $dtCourier['serviceID'],
									'estimateDay' => $dtCourier['estimateDay'],
									'costID' => $dtCourier['costID'],
									'full' => $dtCourier['courierID']."|".$dtCourier['serviceID']."|".$dtCourier['costID']
									);
		}
		
		$smarty->assign("dataCourier", $dataCourier);
	}

	else
	{
		$queryMember = "SELECT * FROM as_members WHERE memberID = '$sessMemberID'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		
		// showing up the shipping
		$queryShippingDetail = "SELECT * FROM as_shippings WHERE shippingID = '$sessShippingID'";
		$sqlShippingDetail = mysqli_query($connect, $queryShippingDetail);
		$dataShippingDetail = mysqli_fetch_array($sqlShippingDetail);
		
		$queryProvinceShip = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataShippingDetail[provinceID]' AND status = 'Y'";
		$sqlProvinceShip = mysqli_query($connect, $queryProvinceShip);
		$dataProvinceShip = mysqli_fetch_array($sqlProvinceShip);
		
		// get the cityname
		$queryCityShip = "SELECT cityName FROM as_cities WHERE cityID = '$dataShippingDetail[cityID]' AND status = 'Y'";
		$sqlCityShip = mysqli_query($connect, $queryCityShip);
		$dataCityShip = mysqli_fetch_array($sqlCityShip);
		
		$smarty->assign("mainName", $dataMember['firstName']." ".$dataMember['lastName']);
		$smarty->assign("receivedName", $dataShippingDetail['receivedName']);
		$smarty->assign("shipAddress", $dataShippingDetail['address']);
		$smarty->assign("shipCityName", $dataCityShip['cityName']);
		$smarty->assign("shipProvinceName", $dataProvinceShip['provinceName']);
		$smarty->assign("shipZipCode", $dataShippingDetail['zipCode']);
		$smarty->assign("shipPhone", $dataShippingDetail['phone']);
		$smarty->assign("shipCellPhone", $dataShippingDetail['cellPhone']);
		
		$queryLocation = "SELECT * FROM as_locations WHERE courierID = '$courier[0]' AND provinceID = '$dataMember[provinceID]' AND cityID = '$dataMember[cityID]' AND status = 'Y' ORDER BY locationName ASC";
		$sqlLocation = mysqli_query($connect, $queryLocation);
		$numsLocation = mysqli_num_rows($sqlLocation);
		while ($dtLocation = mysqli_fetch_array($sqlLocation))
		{
			$dataLocation[] = array (	'locationID' => $dtLocation['locationID'],
										'locationName' => $dtLocation['locationName']);
		}
		
		$smarty->assign("dataLocation", $dataLocation);
		
		$queryCourier = "SELECT A.courierID, B.serviceID, A.courierName, D.costID, A.addCost, A.insurance, B.serviceName, C.estimateDay 
		FROM as_couriers A INNER JOIN as_services B ON A.courierID = B.courierID 
		INNER JOIN as_shipping_costs C ON B.serviceID = C.serviceID 
		INNER JOIN as_shipping_weight_costs D ON D.costID = C.costID WHERE A.status = 'Y'
		AND C.provinceID = '$dataShippingDetail[provinceID]' AND C.cityID = '$dataShippingDetail[cityID]' GROUP BY D.costID ORDER BY A.courierName ASC";
		$sqlCourier = mysqli_query($connect, $queryCourier);
		
		while ($dtCourier = mysqli_fetch_array($sqlCourier))
		{
			$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
									'courierName' => $dtCourier['courierName'],
									'serviceName' => $dtCourier['serviceName'],
									'serviceID' => $dtCourier['serviceID'],
									'estimateDay' => $dtCourier['estimateDay'],
									'costID' => $dtCourier['costID'],
									'full' => $dtCourier['courierID']."|".$dtCourier['serviceID']."|".$dtCourier['costID']
									);
		}
		
		$smarty->assign("dataCourier", $dataCourier);
	}
	
	$queryCart = "SELECT SUM(subtotal) as subtotal FROM as_carts WHERE invoiceID = '$invoice'";
	$sqlCart = mysqli_query($connect, $queryCart);
	$dataCart = mysqli_fetch_array($sqlCart);
	
	$queryCoupon = "SELECT A.couponID, A.pointID, A.qty, B.pointName, B.minTrx, B.coupon FROM as_coupons A INNER JOIN as_points B ON A.pointID = B.pointID WHERE A.memberID = '$sessMemberID' AND B.minTrx < $dataCart[subtotal] GROUP BY A.pointID ASC";
	$sqlCoupon = mysqli_query($connect, $queryCoupon);
	$numsCoupon = mysqli_num_rows($sqlCoupon);
	$smarty->assign("numsCoupon", $numsCoupon);
	
	while ($dtCoupon = mysqli_fetch_array($sqlCoupon))
	{
		$dataCoupon[] = array(	'couponID' => $dtCoupon['couponID'],
								'pointID' => $dtCoupon['pointID'],
								'pointName' => $dtCoupon['pointName'],
								'minTrx' => $dtCoupon['minTrx'],
								'coupon' => $dtCoupon['coupon'],
								'couponRp' => format_rupiah($dtCoupon['coupon']));
	}
	
	$smarty->assign("dataCoupon", $dataCoupon);
	
	$queryCost = "SELECT * FROM as_shipping_weight_costs WHERE costID = '$costID'";
	$sqlCost = mysqli_query($connect, $queryCost);
	while ($dtCost = mysqli_fetch_array($sqlCost))
	{
		$weightFrom = $dtCost['weightFrom'];
		$weightTo = $dtCost['weightTo'];
		$shippingCost = format_rupiah($dtCost['shippingCost']);
		
		if ($weightTo == '0')
		{
			$weight1 = "";
			$weight2 = "KGS";
		}
		else
		{
			$weight1 = $weightFrom." s/d ";
			$weight2 = $weightTo." kg";
		}
		
		$dataCost[] = array('info' => $weight1.$weight2." : Rp.".$shippingCost);
	}
	
	$smarty->assign("dataInfo", $dataCost);
	
	$queryAddCost = "SELECT * FROM as_couriers WHERE courierID = '$courier[0]' AND status = 'Y'";
	$sqlAddCost = mysqli_query($connect, $queryAddCost);
	$dataAddCost = mysqli_fetch_array($sqlAddCost);
	
	$smarty->assign("addCost", format_rupiah($dataAddCost['addCost']));
}

// if mod is checkout and act is shippingmethod
elseif ($module == 'checkout' && $act == 'shippingmethod')
{
	$choosingShipping = $_SESSION['sessChoosingShipping'];
	$sessShippingID = $_SESSION['sessShippingID'];
	$smarty->assign("sessNote", $_SESSION['sessNote']);
	$smarty->assign("sessShipMethod", $_SESSION['sessShippingMethod']);
	
	// if choosing is 1
	if ($choosingShipping == '1')
	{
		$queryMember = "SELECT * FROM as_members WHERE memberID = '$sessMemberID'";
	}

	else
	{
		$queryMember = "SELECT * FROM as_shippings WHERE shippingID = '$sessShippingID'";
	}

	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	// showing up the courier
	/*$queryCourier = "SELECT A.courierID, A.courierName, A.addCost, A.insurance FROM as_couriers A INNER JOIN as_shipping_costs B ON A.courierID = B.courierID WHERE A.status = 'Y'
	AND B.provinceID = '$dataMember[provinceID]' AND B.cityID = '$dataMember[cityID]' GROUP BY A.courierID ORDER BY A.courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName']);
	}*/
	
	$queryCourier = "SELECT A.courierID, B.serviceID, A.courierName, D.costID, A.addCost, A.insurance, B.serviceName, C.estimateDay 
	FROM as_couriers A INNER JOIN as_services B ON A.courierID = B.courierID 
	INNER JOIN as_shipping_costs C ON B.serviceID = C.serviceID 
	INNER JOIN as_shipping_weight_costs D ON D.costID = C.costID WHERE A.status = 'Y'
	AND C.provinceID = '$dataMember[provinceID]' AND C.cityID = '$dataMember[cityID]' GROUP BY D.costID ORDER BY A.courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName'],
								'serviceName' => $dtCourier['serviceName'],
								'serviceID' => $dtCourier['serviceID'],
								'estimateDay' => $dtCourier['estimateDay'],
								'costID' => $dtCourier['costID']
								);
	}
	
	$smarty->assign("dataCourier", $dataCourier);

	$smarty->assign("metaTitle", "Pilih Tarif Pengiriman");
	
	// shipping method
	$sessCourierID = $_SESSION['sessCourierID'];
	$sessServiceID = $_SESSION['sessServiceID'];
	$sessLocationID = $_SESSION['sessLocationID'];
	
	$smarty->assign("sessCourierID", $sessCourierID);
	$smarty->assign("sessServiceID", $sessServiceID);
	$smarty->assign("sessLocationID", $sessLocationID);
	
	// courier
	$querySCourier = "SELECT addCost, insurance FROM as_couriers WHERE courierID = '$sessCourierID'";
	$sqlSCourier = mysqli_query($connect, $querySCourier);
	$dataSCourier = mysqli_fetch_array($sqlSCourier);
	
	$smarty->assign("addCost", "Rp. ".format_rupiah($dataSCourier['addCost']));
	$smarty->assign("insurance", $dataSCourier['insurance']." %");
	
	// estimate day
	$queryEstimate = "SELECT estimateDay FROM as_shipping_costs WHERE costID = '$sessServiceID'";
	$sqlEstimate = mysqli_query($connect, $queryEstimate);
	$dataEstimate = mysqli_fetch_array($sqlEstimate);
	
	$smarty->assign("estimateDay", $dataEstimate['estimateDay']);
	
	// service
	$queryService = "SELECT A.serviceName, B.costID, A.serviceID FROM as_services A INNER JOIN as_shipping_costs B ON A.serviceID = B.serviceID WHERE A.courierID = '$sessCourierID'
					AND B.provinceID = '$dataMember[provinceID]' AND B.cityID = '$dataMember[cityID]' AND A.status = 'Y' ORDER BY A.serviceName ASC";
	$sqlService = mysqli_query($connect, $queryService);
	while ($dtService = mysqli_fetch_array($sqlService))
	{
		$dataService[] = array(	'costID' => $dtService['costID'],
								'serviceName' => $dtService['serviceName'],
								'serviceID' => $dtService['serviceID']);
	}
	$smarty->assign("dataService", $dataService);
	
	// location
	$queryLocation = "SELECT * FROM as_locations WHERE courierID = '$sessCourierID' AND provinceID = '$dataMember[provinceID]' AND cityID = '$dataMember[cityID]' AND status = 'Y' ORDER BY locationName ASC";
	$sqlLocation = mysqli_query($connect, $queryLocation);
	$numsLocation = mysqli_num_rows($sqlLocation);
	while ($dtLocation = mysqli_fetch_array($sqlLocation))
	{
		$dataLocation[] = array('locationID' => $dtLocation['locationID'],
								'locationName' => $dtLocation['locationName']);
	}
	$smarty->assign("dataLocation", $dataLocation);
	$smarty->assign("numsLocation", $numsLocation);
	
	// cost information
	$queryInfo = "SELECT * FROM as_shipping_weight_costs WHERE costID = '$sessServiceID'";
	$sqlInfo = mysqli_query($connect, $queryInfo);
	while ($dtInfo = mysqli_fetch_array($sqlInfo))
	{
		$weightFrom = $dtInfo['weightFrom'];
		$weightTo = $dtInfo['weightTo'];
		$shippingCost = format_rupiah($dtInfo['shippingCost']);
		
		if ($weightTo == '0')
		{
			$weight1 = "";
			$weight2 = "KGS";
		}
		else
		{
			$weight1 = $weightFrom." s/d ";
			$weight2 = $weightTo." kg";
		}
		
		$info = $weight1.$weight2." : Rp.".$shippingCost;
		$dataInfo[] = array('info' => $info);
	}
	$smarty->assign("dataInfo", $dataInfo);
}

// if mod is checkout and act is confirm
elseif ($module == 'checkout' && $act == 'confirm')
{
	$sessPointID = $_SESSION['sessPointID'];
	$sessCourierID = $_SESSION['sessCourierID'];
	$sessServiceID = $_SESSION['sessServiceID'];
	$sessCostID = $_SESSION['sessCostID'];
	$sessLocationID = $_SESSION['sessLocationID'];
	$sessNote = $_SESSION['sessNote'];
	$smarty->assign("sessNote", $sessNote);
	
	$smarty->assign("emptyStock", $_SESSION['emptyStock']);
	$smarty->assign("hitung", $_SESSION['hitung']);
	
	$_SESSION['emptyStock'] = "";
	$_SESSION['hitung'] = "";
	
	function generate_unik($length = 2){
		$chars =  '0123456789';
		$str = '';
		$max = strlen($chars) - 1;
		
		for ($i=0; $i < $length; $i++)
			$str .= $chars[rand(0, $max)];
			
		return $str;
	}
	
	$queryCoupon = "SELECT A.couponID, A.pointID, B.coupon FROM as_coupons A INNER JOIN as_points B ON A.pointID = B.pointID WHERE A.pointID = '$sessPointID'";
	$sqlCoupon = mysqli_query($connect, $queryCoupon);
	$dataCoupon = mysqli_fetch_array($sqlCoupon);
	
	$queryCourier = "SELECT courierName FROM as_couriers WHERE courierID = '$sessCourierID'";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	$dataCourier = mysqli_fetch_array($sqlCourier);
	
	$queryService = "SELECT serviceName FROM as_services WHERE serviceID = '$sessServiceID' AND courierID = '$sessCourierID'";
	$sqlService = mysqli_query($connect, $queryService);
	$dataService = mysqli_fetch_array($sqlService);
	
	$queryLocation = "SELECT locationName FROM as_locations WHERE locationID = '$sessLocationID' AND courierID = '$sessCourierID'";
	$sqlLocation = mysqli_query($connect, $queryLocation);
	$dataLocation = mysqli_fetch_array($sqlLocation);
	
	$smarty->assign("serviceName", $dataService['serviceName']);
	$smarty->assign("locationName", $dataLocation['locationName']);
	$smarty->assign("pointID", $dataCoupon['pointID']);
	$smarty->assign("couponID", $dataCoupon['couponID']);
	$smarty->assign("coupon", $dataCoupon['coupon']);
	$smarty->assign("couponRp", format_rupiah($dataCoupon['coupon']));
	
	$queryCart = "SELECT A.cartID, B.weight, A.productID, B.point, B.ukuran, B.productSeo, A.price, A.qty, A.subtotal, B.productSeo, B.productName, B.image1, B.qty as stock
				FROM as_carts A INNER JOIN as_products B ON A.productID=B.productID
				WHERE A.invoiceID = '$invoice'";
	$sqlCart = mysqli_query($connect, $queryCart);
	$i = 1;
	while ($dtCart = mysqli_fetch_array($sqlCart))
	{
		$weight = $dtCart['qty'] * $dtCart['weight'];
		$point = $dtCart['qty'] * $dtCart['point'];
		
		$dataCart[] = array('cartID' => $dtCart['cartID'],
							'productID' => $dtCart['productID'],
							'ukuran' => $dtCart['ukuran'],
							// 'volume' => $dtCart['volume'],
							// 'alcohol' => $dtCart['alcohol'],
							'price' => $dtCart['price'],
							'point' => $point,
							'priceRp' => format_rupiah($dtCart['price']),
							'qty' => $dtCart['qty'],
							'weight' => $dtCart['weight'],
							'subtotal' => $dtCart['subtotal'],
							'subtotalRp' => format_rupiah($dtCart['subtotal']),
							'productName' => $dtCart['productName'],
							'productSeo' => $dtCart['productSeo'],
							'image' => $dtCart['image1'],
							'no' => $i);
							
		$subtotal += $dtCart['subtotal'];
		$subWeight += $weight;
		$subPoint += $point;
		$subQty += $dtCart['qty'];
		$i++;
	}
	
	if ($_SESSION['sessInsuranceID'] == '1')
	{
		$smarty->assign("totalInsurance", format_rupiah($_SESSION['sessInsurance']));
	}
	else
	{
		$smarty->assign("totalInsurance", 0);
	}
	$smarty->assign("subtotal", $subtotal);
	$smarty->assign("subtotalRp", format_rupiah($subtotal));
	$smarty->assign("weight", $subWeight);
	$smarty->assign("point", $subPoint);
	$smarty->assign("dataCart", $dataCart);
	$smarty->assign("subQty", $subQty);
	
	$smarty->assign("totalSendCost", $_SESSION['sessTotalCost']);
	$smarty->assign("totalSendCostRp", format_rupiah($_SESSION['sessTotalCost']));
	
	// pembulatan ke atas weight
	$weightTop = ceil($subWeight);
	
	// costid
	$queryCost = "SELECT estimateDay FROM as_shipping_costs WHERE costID = '$sessCostID'";
	$sqlCost = mysqli_query($connect, $queryCost);
	$dataCost = mysqli_fetch_array($sqlCost);
	
	$smarty->assign("courierName", $dataCourier['courierName']." - ".$dataService['serviceName']." - Est. Day ".$dataCost['estimateDay']);
	
	$grandtotal = $subtotal + $_SESSION['sessTotalCost'] - $dataCoupon['coupon'];
	
	$uniqueCode = generate_unik();
	$replace = substr($grandtotal, 0, -2);
	$gtotal = $replace.$uniqueCode;
	$smarty->assign("uniqueCode", $uniqueCode);
	
	$smarty->assign("grandtotalRp", format_rupiah($gtotal));
	$smarty->assign("grandtotal", $gtotal);
	
	// received name
	$sessShippingID = $_SESSION['sessShippingID'];
	
	// showing up delivery address
	if ($sessShippingID == '+')
	{
		$queryMember = "SELECT * FROM as_members WHERE memberID = '$sessMemberID'";
	}

	else
	{
		$queryMember = "SELECT * FROM as_shippings WHERE shippingID = '$sessShippingID'";
	}

	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	// city
	$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlCity = mysqli_query($connect, $queryCity);
	$dataCity = mysqli_fetch_array($sqlCity);
	
	// province
	$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	$dataProvince = mysqli_fetch_array($sqlProvince);
	
	if ($sessShippingID == '+')
	{
		$smarty->assign("receivedName", $dataMember['firstName']." ".$dataMember['lastName']);
	}
	else
	{
		$smarty->assign("receivedName", $dataMember['receivedName']);
	}

	$smarty->assign("address", $dataMember['address']);
	$smarty->assign("cityName", $dataCity['cityName']);
	$smarty->assign("provinceName", $dataProvince['provinceName']);
	$smarty->assign("zipCode", $dataMember['zipCode']);
	$smarty->assign("phone", $dataMember['phone']);
	$smarty->assign("cellPhone", $dataMember['cellPhone']);
	
	$smarty->assign("metaTitle", "Konfirmasi Pesanan");
}

// if mod is checkout and act is finish
elseif ($module == 'checkout' && $act == 'finish')
{
	$sessShippingID = $_SESSION['sessShippingID'];
	$sessCourierID = $_SESSION['sessCourierID'];
	$sessServiceID = $_SESSION['sessServiceID'];
	$sessCostID = $_SESSION['sessCostID'];
	$sessLocationID = $_SESSION['sessLocationID'];
	$sessInsuranceID = $_SESSION['sessInsuranceID'];
	$sessTotalCost = $_SESSION['sessTotalCost'];
	$sessInsurance = $_SESSION['sessInsurance'];
	$sessNote = $_SESSION['sessNote'];
	$sessCouponID = $_SESSION['sessCouponID'];
	$sessPoint = $_SESSION['sessPointID'];
	
	$couponID = $_POST['couponID'];
	$pointID = $_POST['pointID'];
	$coupon = $_POST['coupon'];
	$shippingNote = $_SESSION['sessNote'];
	$pointTotal = $_POST['pointTotal'];
	$receivedName = mysqli_real_escape_string($connect, $_POST['receivedName']);
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$cityName = mysqli_real_escape_string($connect, $_POST['cityName']);
	$provinceName = mysqli_real_escape_string($connect, $_POST['provinceName']);
	$zipCode = mysqli_real_escape_string($connect, $_POST['zipCode']);
	$phone = mysqli_real_escape_string($connect, $_POST['zipCode']);
	$cellPhone = mysqli_real_escape_string($connect, $_POST['cellPhone']);
	$subtotal = $_POST['subtotal'];
	$weight = $_POST['weight'];
	$totalShipping = $_POST['totalShipping'];
	$grandtotal = $_POST['grandtotal'];
	$courierName = mysqli_real_escape_string($connect, $_POST['courierName']);
	$serviceName = mysqli_real_escape_string($connect, $_POST['serviceName']);
	$locationName = mysqli_real_escape_string($connect, $_POST['locationName']);
	$createdDate = date('Y-m-d H:i:s');
	
	if ($sessShippingID == '+')
	{
		$choosingShipping = "1";
	}
	else
	{
		$choosingShipping = "2";
	}
	
	// CHECK PESANAN BELUM KOSONG
	$queryCheck = "SELECT A.cartID, A.productID, A.modal, A.totalModal, A.price, A.qty, A.subtotal, B.productCode, B.ukuran, B.point, B.weight, B.productSeo, B.productName, B.point
				FROM as_carts A INNER JOIN as_products B ON A.productID=B.productID
				WHERE A.invoiceID = '$invoice'";
	$sqlCheck = mysqli_query($connect, $queryCheck);
	$i = 1;
	while ($dtCheck = mysqli_fetch_array($sqlCheck))
	{
		$queryStok = "SELECT productID, productName, productCode, ukuran, qty FROM as_products WHERE productID = '$dtCheck[productID]'";
		$sqlStok = mysqli_query($connect, $queryStok);
		$dataStok = mysqli_fetch_array($sqlStok);
		
		if ($dtCheck['qty'] > $dataStok['qty'])
		{
			$emptyStock[] = array(	'productName' => $dataStok['productName'],
									'productCode' => $dataStok['productCode'],
									'ukuran' => $dataStok['ukuran'],
									// 'volume' => $dataStok['volume'],
									'qty' => $dataStok['qty']);
		}
	}
	
	$hitung = COUNT($emptyStock);
	
	if ($hitung > 0)
	{
		$_SESSION['emptyStock'] = $emptyStock;
		$_SESSION['hitung'] = $hitung;
		
		header("Location: confirm-order.html");
	}
	else
	{
		//-----------------------
		
		// save customer
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
											VALUES(	'$invoice',
													'$sessMemberID',
													'$choosingShipping',
													'$receivedName',
													'$address',
													'$cityName',
													'$provinceName',
													'$zipCode',
													'$phone',
													'$cellPhone')";
		mysqli_query($connect, $queryCustomer);
		
		$customerID = mysqli_insert_id($connect);
		$date = date('Y-m-d');
		
		if ($sessInsuranceID == '1')
		{
			$insurance = $sessInsurance;
		}
		else
		{
			$insurance = "0";
		}
		
		// save oders
		$queryOrder = "INSERT INTO as_orders (	invoiceID,
												invoiceDate,
												customerID,
												status,
												note,
												subtotal,
												pointID,
												coupon,
												courierName,
												serviceName,
												locationName,
												insurance,
												pointTotal,
												shippingTotal,
												consignment,
												weightTotal,
												grandtotal,
												bankID,
												keterangan,
												printed,
												createdDate,
												modifiedDate)
										VALUES(	'$invoice',
												'$date',
												'$customerID',
												'1',
												'$sessNote',
												'$subtotal',
												'$pointID',
												'$coupon',
												'$courierName',
												'$serviceName',
												'$locationName',
												'$insurance',
												'$pointTotal',
												'$totalShipping',
												'',
												'$weight',
												'$grandtotal',
												'',
												'',
												'N',
												'$createdDate',
												'')";
		mysqli_query($connect, $queryOrder);
		
		$orderID = mysqli_insert_id($connect);
		
		$queryCustomer = "SELECT * FROM as_customers WHERE invoiceID = '$invoice'";
		$sqlCustomer = mysqli_query($connect, $queryCustomer);
		$dataCustomer = mysqli_fetch_array($sqlCustomer);
		
		$queryCheck = "SELECT couponID, qty FROM as_coupons WHERE memberID = '$sessMemberID' AND pointID = '$pointID'";
		$sqlCheck = mysqli_query($connect, $queryCheck);
		$dataCheck = mysqli_fetch_array($sqlCheck);
		
		if ($dataCheck['qty'] > 1)
		{
			$queryCoupon = "UPDATE as_coupons SET qty=qty-1 WHERE couponID = '$couponID'";
			mysqli_query($connect, $queryCoupon);
		}
		else
		{
			$queryCoupon = "DELETE FROM as_coupons WHERE couponID = '$couponID'";
			mysqli_query($connect, $queryCoupon);
		}
		
		// order detail
		$queryCart = "SELECT A.cartID, A.productID, A.modal, A.totalModal, A.price, A.qty, A.subtotal, B.productCode, B.ukuran, B.point, B.weight, B.productSeo, B.productName, B.point
					FROM as_carts A INNER JOIN as_products B ON A.productID=B.productID
					WHERE A.invoiceID = '$invoice'";
		$sqlCart = mysqli_query($connect, $queryCart);
		$i = 1;
		while ($dtCart = mysqli_fetch_array($sqlCart))
		{
			$poin = $dtCart['point'] * $dtCart['qty'];
			$queryOrderDetail = "INSERT INTO as_order_details (	orderID,
																invoiceID,
																productCode,
																productName,
																ukuran,
																-- volume,
																-- alcohol,
																modal,
																unitPrice,
																qty,
																subtotalModal,
																subtotal,
																pointUnit,
																pointTotal)
														VALUES(	'$orderID',
																'$invoice',
																'$dtCart[productCode]',
																'$dtCart[productName]',
																'$dtCart[ukuran]',
																-- '$dtCart[volume]',
																-- '$dtCart[alcohol]',
																'$dtCart[modal]',
																'$dtCart[price]',
																'$dtCart[qty]',
																'$dtCart[totalModal]',
																'$dtCart[subtotal]',
																'$dtCart[point]',
																'$poin')";
			mysqli_query($connect, $queryOrderDetail);
			
			$point += $poin;
		}
		
		$queryUpdate = "UPDATE as_orders SET pointTotal = '$point' WHERE orderID = '$orderID'";
		mysqli_query($connect, $queryUpdate);
		
		$subject = "Anaku.com - Pesanan Anda";
		
		$html = "<p>Terima kasih telah berbelanja di Toko Online Anaku.com, berikut transaksi belanja Anda:</p>
				<table cellpadding='0' cellspacing='0'>
					<tr style='border: 1px solid #CCC;'>
						<th style='border: 1px solid #CCC; padding: 2px;'>No.</th>
						<th style='border: 1px solid #CCC; padding: 2px;'>Nama Produk</th>
						<th style='border: 1px solid #CCC; padding: 2px;'>Ukuran</th>
						<th style='border: 1px solid #CCC; padding: 2px;'>Qty</th>
						<th style='border: 1px solid #CCC; padding: 2px;'>Harga</th>
						<th style='border: 1px solid #CCC; padding: 2px;'>Subtotal</th>
					</tr>
				";
		
		$queryDone = "SELECT A.shippingTotal, A.note, A.subtotal, A.coupon, A.grandtotal, A.weightTotal, A.courierName, A.serviceName, A.locationName FROM as_orders A WHERE A.invoiceID = '$invoice'";
		$sqlDone = mysqli_query($connect, $queryDone);
		$dataDone = mysqli_fetch_array($sqlDone);
		
		$subtotalOrder = format_rupiah($dataDone['subtotal']);
		$shippingTotalOrder = format_rupiah($dataDone['shippingTotal']);
		$grandtotalOrder = format_rupiah($dataDone['grandtotal']);
		$coupon = format_rupiah($dataDone['coupon']);
		$weightTotal = $dataDone['weightTotal'];
				
		$queryFinish = "SELECT A.invoiceID, B.productCode, B.productName, B.ukuran, B.unitPrice, B.qty, B.subtotal 
					FROM as_orders A INNER JOIN as_order_details B ON A.orderID=B.orderID WHERE A.invoiceID = '$invoice'";
		$sqlFinish = mysqli_query($connect, $queryFinish);
		$j = 1;
		while ($dtFinish = mysqli_fetch_array($sqlFinish))
		{
			$unitPrice = format_rupiah($dtFinish['unitPrice']);
			$subt = format_rupiah($dtFinish['subtotal']);
			
			$html .= "<tr>
						<td style='border: 1px solid #CCC;'>$j</td>
						<td style='border: 1px solid #CCC;'>$dtFinish[productName]</td>
						<td style='border: 1px solid #CCC;'>$dtFinish[ukuran]</td>
						<td style='border: 1px solid #CCC;'>$dtFinish[qty]</td>
						<td style='border: 1px solid #CCC;'>$unitPrice</td>
						<td style='border: 1px solid #CCC;'>$subt</td>
					</tr>";
			$j++;
		}
		
		$html .= "<tr>
					<td colspan='6' style='border: 1px solid #CCC; padding: 2px;' align='right'><b>Subtotal Rp.</b></td>
					<td align='right'><b>$subtotalOrder</b></td>
				</tr>
				<tr>
					<td colspan='6' style='border: 1px solid #CCC; padding: 2px;' align='right'><b>Total Berat</b></td>
					<td align='right'><b>$weightTotal Kg</b></td>
				</tr>
				<tr>
					<td colspan='6' style='border: 1px solid #CCC; padding: 2px;' align='right'><b>Total Biaya Kirim Rp.</b></td>
					<td align='right'><b>$shippingTotalOrder</b></td>
				</tr>
				<tr>
					<td colspan='6' style='border: 1px solid #CCC; padding: 2px;' align='right'><b>Kupon Diskon Rp.</b></td>
					<td align='right'><b>$coupon</b></td>
				</tr>
				<tr>
					<td colspan='6' style='border: 1px solid #CCC; padding: 2px;' align='right'><b>Grandtotal Rp.</b></td>
					<td align='right'><b>$grandtotalOrder</b></td>
				</tr>
				<tr>
					<td colspan='7' style='border: 1px solid #CCC; padding: 2px; color: red' align='right'><b><i>Mohon transfer sesuai grandtotal yang tertera (tanpa dibulatkan)</i></b></td>
				</tr>
			</table>
			<br>
			<p><b>Tujuan Pengiriman :</b></p>
			<table>
				<tr>
					<td style='width: 110px;'>Nama Penerima </td>
					<td>:</td>
					<td>$dataCustomer[receivedName]</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>$dataCustomer[address]</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td>$dataCustomer[cityName]</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td>$dataCustomer[provinceName]</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td>$dataCustomer[zipCode]</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td>$dataCustomer[phone]</td>
				</tr>
				<tr>
					<td>Hp</td>
					<td>:</td>
					<td>$dataCustomer[cellPhone]</td>
				</tr>
				<tr valign='top'>
					<td>Catatan</td>
					<td>:</td>
					<td>$dataDone[note]</td>
				</tr>
			</table>
			<br>
			<p><b>Ekspedisi Pengiriman :</b></p>
			<table>
				<tr>
					<td style='width: 110px;'>Nama Ekspedisi (Kurir) </td>
					<td>:</td>
					<td>$dataDone[courierName]</td>
				</tr>
				<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td>$dataDone[serviceName]</td>
				</tr>
				<tr>
					<td>Lokasi Agen</td>
					<td>:</td>
					<td>$dataDone[locationName]</td>
				</tr>
			</table><br>
			<p>Segera lakukan pembayaran ke salah satu rekening berikut dan lakukan konfirmasi pemesanan melalui form konfirmasi pesanan yang ada pada website atau Anda juga konfirmasi pesanan ke Line kami di <b>@Anaku</b>.</p>";
			
		// show the bank
		$queryBank = "SELECT * FROM as_banks WHERE status = 'Y' AND display = 'Y' ORDER BY bankName ASC";
		$sqlBank = mysqli_query($connect, $queryBank);
		
		$k = 1;
		while ($dtBank = mysqli_fetch_array($sqlBank))
		{
			$html .= "
				<p>$dtBank[bankName] Cabang $dtBank[branch]<br>
				$dtBank[accountNo] a/n $dtBank[accountName]</p>
			";
		}
			
		$html .= "<p style='padding: 5px; background: #CCC;'>Anda memiliki pertanyaan? Customer Service Anaku.com siap membantu Anda.<br>Hubungi kami di $dataProfile[phone] atau email ke <a href='mailto: $dataProfile[email]'>$dataProfile[email]</a><br></p>
		<p>Anaku.com</p>
		";
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		$headers .= 'From: Anaku.com <no-reply@Anaku.com>' . "\r\n";
		
		if (mail($sessEmail, $subject, $html, $headers))
		{
			$subject2 = "Anaku.com - Anda mendapat pesanan dari $sessEmail";
			$html2 = "<p>Kepada Yth Admin Winespirit.com,</p>
					<p>Pemberitahuan bahwa ada order dari $sessEmail, silahkan masuk ke dalam halaman administrator untuk melihat detil pesanan</p>
					<p>Anaku.com</p>";
					
			// To send HTML mail, the Content-type header must be set
			$headers2  = 'MIME-Version: 1.0' . "\r\n";
			$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers2 .= 'From: Anaku.com <no-reply@Anaku.com>' . "\r\n";
		
			mail($dataProfile['email'], $subject2, $html2, $headers2);
		}
		
		// delete all
		$queryDelCart = "DELETE FROM as_carts WHERE invoiceID = '$invoice'";
		mysqli_query($connect, $queryDelCart);
		
		// empty session
		$_SESSION['sessShippingID'] = "";
		$_SESSION['sessCourierID'] = "";
		$_SESSION['sessServiceID'] = "";
		$_SESSION['sessCostID'] = "";
		$_SESSION['sessLocationID'] = "";
		$_SESSION['sessInsuranceID'] = "";
		$_SESSION['sessTotalCost'] = "";
		$_SESSION['sessInsurance'] = "";
		$_SESSION['sessNote'] = "";
		$_SESSION['sessCouponID'] = "";
		$_SESSION['sessPointID'] = "";
		$_SESSION['invoice'] = "";
		
		header("Location: success-order.html?invoiceNo=".$invoice."&total=".$dataDone['grandtotal']);
	}
}

// if mod is checkout and act is done
elseif ($module == 'checkout' && $act == 'done')
{
	$requestURI = $_SERVER['REQUEST_URI'];
	$explode = explode("?", $requestURI);
	$explodeand = explode("&", $explode[1]);
	$explodematch1 = explode("=", $explodeand[0]);
	$explodematch2 = explode("=", $explodeand[1]);
	
	$smarty->assign("explodematch1", $explodematch1[1]);
	$smarty->assign("explodematch2", format_rupiah($explodematch2[1]));
	
	$yahooid = "wongz15";
	$ch = curl_init("http://opi.yahoo.com/online?u=".$yahooid."&m=t");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$status = curl_exec($ch);
	curl_close($ch);
	if($status == $yahooid." is NOT ONLINE"){
		$ymStatus = "2";
	} 
	elseif ($status == $yahooid." is ONLINE"){
		$ymStatus = "1";
	}
	
	$smarty->assign("ymStatus", $ymStatus);
	
	// showing up the bank
	$queryBank = "SELECT * FROM as_banks WHERE status = 'Y' AND display = 'Y' ORDER BY bankName ASC";
	$sqlBank = mysqli_query($connect, $queryBank);
	$i = 1;
	while ($dtBank = mysqli_fetch_array($sqlBank))
	{
		$dataBank[] = array(	'bankID' => $dtBank['bankID'],
								'bankName' => $dtBank['bankName'],
								'accountNo' => $dtBank['accountNo'],
								'accountName' => $dtBank['accountName'],
								'branch' => $dtBank['branch'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataBank", $dataBank);
	$smarty->assign("metaTitle", "Pesanan Anda berhasil");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
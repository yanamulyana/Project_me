<?php
include "header.php";
$page = "myaccount.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessMemberID'] == '' && $_SESSION['sessEmail'] == '')
{
	header("Location: home");
	exit();
}

// if mod is myaccount and act is detail
if ($module == 'myaccount' && $act == 'detail')
{
	$queryMember = "SELECT * FROM as_members WHERE memberID = '$sessMemberID'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$created = explode(" ", $dataMember['createdDate']);
	
	// get the province name
	$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	$dataProvince = mysqli_fetch_array($sqlProvince);
	
	// get the city name
	$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlCity = mysqli_query($connect, $queryCity);
	$dataCity = mysqli_fetch_array($sqlCity);
	
	if ($dataMember['gender'] == 'L')
	{
		$gender = "Laki-laki";
	}
	elseif ($dataMember['gender'] == 'P')
	{
		$gender = "Perempuan";
	}
	
	$smarty->assign("memberID", $dataMember['memberID']);
	$smarty->assign("firstName", $dataMember['firstName']);
	$smarty->assign("lastName", $dataMember['lastName']);
	$smarty->assign("gender", $gender);
	$smarty->assign("address", $dataMember['address']);
	$smarty->assign("zipCode", $dataMember['zipCode']);
	$smarty->assign("provinceName", $dataProvince['provinceName']);
	$smarty->assign("cityName", $dataCity['cityName']);
	$smarty->assign("phone", $dataMember['phone']);
	$smarty->assign("cellPhone", $dataMember['cellPhone']);
	$smarty->assign("email", $dataMember['email']);
	$smarty->assign("createdDate", tgl_indo($created[0])." ".$created[1]);
	$smarty->assign("pointTotal", format_hits($dataMember['pointTotal']));
	
	$smarty->assign("metaTitle", "My Account");
	
	$queryOrder = "SELECT A.invoiceID, A.grandtotal, A.invoiceDate, A.pointTotal FROM as_orders A INNER JOIN as_customers B ON A.customerID = B.customerID
				WHERE B.memberID = '$dataMember[memberID]' AND A.status = '4' ORDER BY invoiceID DESC LIMIT 10";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	while ($dtOrder = mysqli_fetch_array($sqlOrder))
	{
		$dataOrder[] = array(	'invoiceID' => $dtOrder['invoiceID'],
								'grandtotal' => format_rupiah($dtOrder['grandtotal']),
								'invoiceDate' => tgl_indo2($dtOrder['invoiceDate']),
								'pointTotal' => $dtOrder['pointTotal']);
	}
	$smarty->assign("dataOrder", $dataOrder);
	
	$smarty->assign("msg", $_SESSION['sessAccount']);
	$_SESSION['sessAccount'] = "";
	
	$smarty->assign("msgPass", $_SESSION['sessChangePassword']);
	$_SESSION['sessChangePassword'] = "";
	
	// showing up the best seller product
	$queryBestProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY sold DESC LIMIT 5";
	$sqlBestProduct = mysqli_query($connect, $queryBestProduct);
	
	while ($dtBestProduct = mysqli_fetch_array($sqlBestProduct))
	{
		$dataBestProduct[] = array(	'productID' => $dtBestProduct['productID'],
									'productName' => $dtBestProduct['productName'],
									'productSeo' => $dtBestProduct['productSeo'],
									'salePrice' => format_rupiah($dtBestProduct['salePrice']),
									'discountPrice' => format_rupiah($dtBestProduct['discountPrice']),
									'image1' => $dtBestProduct['image1']);
	}
	
	$smarty->assign("dataBestProduct", $dataBestProduct);
	
	// get the shipping
	$queryShipping = "SELECT * FROM as_shippings WHERE memberID = '$sessMemberID' ORDER BY receivedName ASC";
	$sqlShipping = mysqli_query($connect, $queryShipping);
	$i = 1;
	while ($dtShipping = mysqli_fetch_array($sqlShipping))
	{
		$queryProvin = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dtShipping[provinceID]'";
		$sqlProvin = mysqli_query($connect, $queryProvin);
		$dataProvin = mysqli_fetch_array($sqlProvin);
		
		// get city
		$queryCit = "SELECT cityName FROM as_cities WHERE cityID = '$dtShipping[cityID]'";
		$sqlCit = mysqli_query($connect, $queryCit);
		$dataCit = mysqli_fetch_array($sqlCit);
		
		$dataShipping[] = array('shippingID' => $dtShipping['shippingID'],
								'receivedName' => $dtShipping['receivedName'],
								'address' => $dtShipping['address'],
								'provinceName' => $dataProvin['provinceName'],
								'cityName' => $dataCit['cityName'],
								'zipCode' => $dtShipping['zipCode'],
								'phone' => $dtShipping['phone'],
								'cellPhone' => $dtShipping['cellPhone'],
								'i' => $i
								);
		$i++;
	}
	
	$smarty->assign("dataShipping", $dataShipping);
	
	// showing up the reward
	$queryPoint = "SELECT * FROM as_points WHERE status = 'Y' ORDER BY minPoint ASC";
	$sqlPoint = mysqli_query($connect, $queryPoint);
	while ($dtPoint = mysqli_fetch_array($sqlPoint))
	{
		$dataPoint[] = array(	'pointID' => $dtPoint['pointID'],
								'pointName' => $dtPoint['pointName'],
								'minPoint' => $dtPoint['minPoint'],
								'minTrx' => $dtPoint['minTrx'],
								'minTrxRp' => format_rupiah($dtPoint['minTrx']),
								'coupon' => $dtPoint['coupon'],
								'couponRp' => format_rupiah($dtPoint['coupon']),
								'description' => nl2br($dtPoint['description']));
	}
	$smarty->assign("dataPoint", $dataPoint);
	
	// coupon
	$queryCoupon = "SELECT * FROM as_coupons WHERE memberID = '$sessMemberID' GROUP BY pointID ASC";
	$sqlCoupon = mysqli_query($connect, $queryCoupon);
	$numsCoupon = mysqli_num_rows($sqlCoupon);
	$smarty->assign("numsCoupon", $numsCoupon);
	while ($dtCoupon = mysqli_fetch_array($sqlCoupon))
	{
		$queryReward = "SELECT * FROM as_points WHERE pointID = '$dtCoupon[pointID]'";
		$sqlReward = mysqli_query($connect, $queryReward);
		$dataReward = mysqli_fetch_array($sqlReward);
		
		$dataCoupon[] = array(	'couponID' => $dtCoupon['couponID'],
								'pointID' => $dtCoupon['pointID'],
								'qty' => $dtCoupon['qty'],
								'pointName' => $dataReward['pointName'],
								'minTrxRp' => format_rupiah($dataReward['minTrx']),
								'minTrx' => $dataReward['minTrx'],
								'couponRp' => format_rupiah($dataReward['coupon']),
								'coupon' => $dataReward['coupon'],
								'description' => nl2br($dataReward['description']));
	}
	
	$smarty->assign("dataCoupon", $dataCoupon);
	
	$smarty->assign("msgChanger", $_SESSION['sessChanger']);
	$_SESSION['sessChanger'] = "";
	
	$smarty->assign("msgActive", $_SESSION['sessActive']);
	$_SESSION['sessActive'] = "";
}

// if mod is myaccount and act is edit
elseif ($module == 'myaccount' && $act == 'edit')
{
	$smarty->assign("sessLoginAccount", $_SESSION['sessLoginAccount']);
	$_SESSION['sessLoginAccount'] = "";
	
	$queryMember = "SELECT * FROM as_members WHERE memberID = '$sessMemberID'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$smarty->assign("memberID", $dataMember['memberID']);
	$smarty->assign("firstName", $dataMember['firstName']);
	$smarty->assign("lastName", $dataMember['lastName']);
	$smarty->assign("gender", $dataMember['gender']);
	$smarty->assign("address", $dataMember['address']);
	$smarty->assign("zipCode", $dataMember['zipCode']);
	$smarty->assign("provinceID", $dataMember['provinceID']);
	$smarty->assign("cityID", $dataMember['cityID']);
	$smarty->assign("phone", $dataMember['phone']);
	$smarty->assign("cellPhone", $dataMember['cellPhone']);
	$smarty->assign("email", $dataMember['email']);
	
	$smarty->assign("metaTitle", "Edit Account");
	
	// showing the provinces
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array(	'provinceID' => $dtProvince['provinceID'],
									'provinceName' => $dtProvince['provinceName']);
	}
	
	$smarty->assign("dataProvince", $dataProvince);
	
	// showing up the cities
	$queryCity = "SELECT cityID, cityName FROM as_cities WHERE status = 'Y' AND provinceID = '$dataMember[provinceID]' ORDER BY cityName ASC";
	$sqlCity = mysqli_query($connect, $queryCity);
	while ($dtCity = mysqli_fetch_array($sqlCity))
	{
		$dataCity[] = array(	'cityID' => $dtCity['cityID'],
								'cityName' => $dtCity['cityName']);
	}
	
	$smarty->assign("dataCity", $dataCity);
}

// if mod is myaccount and act is update
elseif ($module == 'myaccount' && $act == 'update')
{
	$memberID = $_POST['memberID'];
	$firstName = mysqli_real_escape_string($connect, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($connect, $_POST['lastName']);
	$gender = $_POST['gender'];
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$zipCode = mysqli_real_escape_string($connect, $_POST['zipCode']);
	$phone = mysqli_real_escape_string($connect, $_POST['phone']);
	$cellPhone = mysqli_real_escape_string($connect, $_POST['cellPhone']);
	
	$_SESSION['sessFirstName'] = $firstName;
	$_SESSION['sessLastName'] = $lastName;
	
	$queryMember = "UPDATE as_members SET 	firstName = '$firstName',
											lastName = '$lastName',
											gender = '$gender',
											address = '$address',
											provinceID = '$provinceID',
											cityID = '$cityID',
											zipCode = '$zipCode',
											phone = '$phone',
											cellPhone = '$cellPhone'
											WHERE memberID = '$memberID'";
	mysqli_query($connect, $queryMember);
	
	$_SESSION['sessAccount'] = 1;
	
	header("Location: myaccount.html");
}

// if mod is myaccount and act is changerpoint
elseif ($module == 'myaccount' && $act == 'changerpoint')
{
	$pointTotal = $_POST['pointTotal'];
	$minPoint = $_POST['minPoint'];
	$qty = mysqli_real_escape_string($connect, $_POST['qty']);
	$pointID = $_POST['pointID'];
	$pointName = mysqli_real_escape_string($connect, $_POST['pointName']);
	$minTrx = $_POST['minTrx'];
	$coupon = $_POST['coupon'];
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$createdDate = date('Y-m-d H:i:s');
	
	$totalPoint = $qty * $minPoint; // 2 x 50 = 100
	
	if ($pointTotal < $totalPoint) // 65 < 100
	{
		$_SESSION['sessChanger'] = 1;
		$_SESSION['sessActive'] = 4;
		
		header("Location: myaccount.html");
	}
	else
	{
		$queryCheck = "SELECT couponID FROM as_coupons WHERE pointID = '$pointID' AND memberID = '$sessMemberID'";
		$sqlCheck = mysqli_query($connect, $queryCheck);
		$numsCheck = mysqli_num_rows($sqlCheck);
		
		if ($numsCheck > 0)
		{
			$queryCoupon = "UPDATE as_coupons SET qty=qty+$qty WHERE memberID = '$sessMemberID' AND pointID = '$pointID'";
			mysqli_query($connect, $queryCoupon);
		}
		else
		{
			$queryCoupon = "INSERT INTO as_coupons (memberID,
													pointID,
													qty,
													createdDate)
											VALUES(	'$sessMemberID',
													'$pointID',
													'$qty',
													'$createdDate')";
			mysqli_query($connect, $queryCoupon);
		}
		
		// kurangi poin
		$queryMin = "UPDATE as_members SET pointTotal=pointTotal-$totalPoint WHERE memberID = '$sessMemberID'";
		mysqli_query($connect, $queryMin);
		
		$_SESSION['sessChanger'] = 2;
		$_SESSION['sessActive'] = 4;
	}
	
	header("Location: myaccount.html");
}

// if mod is myaccount and act is editemail
elseif ($module == 'myaccount' && $act == 'editemail')
{
	$smarty->assign("metaTitle", "Ubah Email");
	
	$smarty->assign("msg", $_SESSION['sessChangeEmail']);
	$_SESSION['sessChangeEmail'] = "";
}

// if mod is myaccount and act is updateemail
elseif ($module == 'myaccount' && $act == 'updateemail')
{
	$oldEmail = mysqli_real_escape_string($connect, $_POST['oldEmail']);
	$newEmail = mysqli_real_escape_string($connect, $_POST['newEmail']);
	$confirmEmail = mysqli_real_escape_string($connect, $_POST['confirmEmail']);
	$password = md5($_POST['password']);
	$memberID = $_POST['memberID'];
	
	$queryMember = "SELECT * FROM as_members WHERE memberID = '$memberID'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	// if old email and current email did not match
	if ($dataMember['email'] != $oldEmail)
	{
		$_SESSION['sessChangeEmail'] = 1;
		
		header("Location: edit-email.html");
	}
	
	else
	{
		// if new email and confirm email did not match
		if ($newEmail != $confirmEmail)
		{
			$_SESSION['sessChangeEmail'] = 2;
			
			header("Location: edit-email.html");
		} 
		
		else
		{
			// if password is wrong
			if ($password != $dataMember['password'])
			{
				$_SESSION['sessChangeEmail'] = 3;
				
				header("Location: edit-email.html");
			}
			
			else
			{
				$queryUpdate = "UPDATE as_members SET	email = '$newEmail' WHERE memberID = '$memberID'";
				mysqli_query($connect, $queryUpdate);
				
				$_SESSION['sessEmail'] = $newEmail;
				
				$_SESSION['sessChangeEmail'] = 4;
				
				header("Location: myaccount.html");
			}
		}
	}
}

// if mod is myaccount and act editpassword
elseif ($module == 'myaccount' && $act == 'editpassword')
{
	$smarty->assign("metaTitle", "Ubah Password");
	$smarty->assign("msg", $_SESSION['sessChangePassword']);
	$_SESSION['sessChangePassword'] = "";
	
	$queryMember = "SELECT password FROM as_members WHERE memberID = '$sessMemberID'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	$smarty->assign("password", $dataMember['password']);
}

// if mod is myaccount and act is updatepassword
elseif ($module == 'myaccount' && $act == 'updatepassword')
{
	$memberID = $_POST['memberID'];
	$new = $_POST['new'];
	$oldPassword = md5($_POST['oldPassword']);
	$newPassword = md5($_POST['newPassword']);
	$confirmPassword = md5($_POST['confirmPassword']);
	
	$queryMember = "SELECT password FROM as_members WHERE memberID = '$memberID'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	if ($new == '1')
	{
		if ($newPassword != $confirmPassword)
		{
			$_SESSION['sessChangePassword'] = 2;
			
			header("Location: change-password.html");
		}
		
		else
		{
			$queryUpdate = "UPDATE as_members SET password = '$newPassword' WHERE memberID = '$memberID'";
			mysqli_query($connect, $queryUpdate);
			
			$_SESSION['sessChangePassword'] = 3;
			
			header("Location: myaccount.html");
		}
	}
	else
	{
		if ($oldPassword != $dataMember['password'])
		{
			$_SESSION['sessChangePassword'] = 1;
			
			header("Location: change-password.html");
		}
		
		else
		{
			if ($newPassword != $confirmPassword)
			{
				$_SESSION['sessChangePassword'] = 2;
				
				header("Location: change-password.html");
			}
			
			else
			{
				$queryUpdate = "UPDATE as_members SET password = '$newPassword' WHERE memberID = '$memberID'";
				mysqli_query($connect, $queryUpdate);
				
				$_SESSION['sessChangePassword'] = 3;
				
				header("Location: myaccount.html");
			}
		}
	}
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
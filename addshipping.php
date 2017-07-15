<?php
include "header.php";
$page = "addshipping.tpl";

if ($sessMemberID == "" && $sessEmail == "")
{
	exit();
}

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'shipping' && $act == 'input')
{
	$receivedName = mysqli_real_escape_string($connect, $_POST['receivedName']);
	$gender = $_POST['gender'];
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$zipCode = mysqli_real_escape_string($connect, $_POST['zipCode']);
	$phone = mysqli_real_escape_string($connect, $_POST['phone']);
	$cellPhone = mysqli_real_escape_string($connect, $_POST['cellPhone']);
	$createdDate = date('Y-m-d H:i:s');
	
	$queryShipping = "INSERT INTO as_shippings (memberID,
												receivedName,
												gender,
												address,
												provinceID,
												cityID,
												zipCode,
												phone,
												cellPhone,
												createdDate,
												modifiedDate)
										VALUES(	'$sessMemberID',
												'$receivedName',
												'$gender',
												'$address',
												'$provinceID',
												'$cityID',
												'$zipCode',
												'$phone',
												'$cellPhone',
												'$createdDate',
												'')";
	mysqli_query($connect, $queryShipping);
	
	$_SESSION['sessActive'] = 2;
	
	header("Location: myaccount.html");
}

elseif ($module == 'shipping' && $act == 'edit')
{
	$shippingID = mysqli_real_escape_string($connect, $_GET['shippingID']);
	
	$queryShipping = "SELECT * FROM as_shippings WHERE shippingID = '$shippingID' AND memberID = '$sessMemberID'";
	$sqlShipping = mysqli_query($connect, $queryShipping);
	$dataShipping = mysqli_fetch_array($sqlShipping);
	
	$smarty->assign("shippingID", $dataShipping['shippingID']);
	$smarty->assign("receivedName", $dataShipping['receivedName']);
	$smarty->assign("gender", $dataShipping['gender']);
	$smarty->assign("address", $dataShipping['address']);
	$smarty->assign("provinceID", $dataShipping['provinceID']);
	$smarty->assign("cityID", $dataShipping['cityID']);
	$smarty->assign("zipCode", $dataShipping['zipCode']);
	$smarty->assign("phone", $dataShipping['phone']);
	$smarty->assign("cellPhone", $dataShipping['cellPhone']);
	
	$queryProvince = "SELECT provinceName, provinceID FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	
	$smarty->assign("dataProvince", $dataProvince);
	
	// showing the city
	$queryCity = "SELECT cityID, cityName FROM as_cities WHERE status = 'Y' AND provinceID = '$dataShipping[provinceID]'";
	$sqlCity = mysqli_query($connect, $queryCity);
	while ($dtCity = mysqli_fetch_array($sqlCity))
	{
		$dataCity[] = array(	'cityID' => $dtCity['cityID'],
								'cityName' => $dtCity['cityName']);
	}
	
	$smarty->assign("dataCity", $dataCity);
	$smarty->assign("metaTitle", "Edit Shipping");
}

// if mod is shipping and act is update
elseif ($module == 'shipping' && $act == 'update')
{
	$shippingID = mysqli_real_escape_string($connect, $_POST['shippingID']);
	$receivedName = mysqli_real_escape_string($connect, $_POST['receivedName']);
	$gender = $_POST['gender'];
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$zipCode = mysqli_real_escape_string($connect, $_POST['zipCode']);
	$phone = mysqli_real_escape_string($connect, $_POST['phone']);
	$cellPhone = mysqli_escape_string($connect, $_POST['cellPhone']);
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryShipping = "UPDATE as_shippings SET	receivedName = '$receivedName',
												gender = '$gender',
												address = '$address',
												provinceID = '$provinceID',
												cityID = '$cityID',
												zipCode = '$zipCode',
												phone = '$phone',
												cellPhone = '$cellPhone',
												modifiedDate = '$modifiedDate'
												WHERE shippingID = '$shippingID' AND memberID = '$sessMemberID'";
	mysqli_query($connect, $queryShipping);
	
	$_SESSION['sessActive'] = 2;
	
	header("Location: myaccount.html");
}

// delete
elseif ($module == 'shipping' && $act == 'delete')
{
	$shippingID = mysqli_real_escape_string($connect, $_GET['shippingID']);
	
	$queryShipping = "DELETE FROM as_shippings WHERE shippingID = '$shippingID' AND memberID = '$sessMemberID'";
	mysqli_query($connect, $queryShipping);
	
	$_SESSION['sessActive'] = 2;
	
	header("Location: myaccount.html");
}

else
{
	$queryProvince = "SELECT provinceName, provinceID FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	
	$smarty->assign("dataProvince", $dataProvince);
	$smarty->assign("metaTitle", "Add New Shipping");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
<?php
include "header.php";

/*$chooseShipping = $_POST['chooseShipping'];
$_SESSION['sessChoosingShipping'] = $chooseShipping;

if ($chooseShipping == '1')
{
	$_SESSION['sessShippingID'] = "";
}*/

$shippingID = $_POST['shippingID'];
$courier = explode("|", $_POST['courierID']);
$courierID = $courier[0];
$serviceID = $courier[1];
$costID = $courier[2];
$full = $_POST['courierID'];
$locationID = $_POST['locationID'];
$totalCost = $_POST['totalCost'];
$totalInsurance = $_POST['totalInsurance'];
$insuranceid = $_POST['insuranceid'];
$note = mysqli_real_escape_string($connect, $_POST['note']);
$coupon = explode("|", $_POST['couponID']);
$couponID = $coupon[0];
$pointID = $coupon[1];

$_SESSION['sessShippingID'] = $shippingID;
$_SESSION['sessCourierID'] = $courierID;
$_SESSION['sessServiceID'] = $serviceID;
$_SESSION['sessCostID'] = $costID;
$_SESSION['sessFull'] = $full;
$_SESSION['sessLocationID'] = $locationID;
$_SESSION['sessInsuranceID'] = $insuranceid;
$_SESSION['sessTotalCost'] = $totalCost;
$_SESSION['sessInsurance'] = $totalInsurance;
$_SESSION['sessNote'] = $note;
$_SESSION['sessCouponID'] = $couponID;
$_SESSION['sessPointID'] = $pointID;

header("Location: confirm-order.html");
?>
<?php
error_reporting(0);
session_start();

include "config/connection.php";

$courierID = $_GET['courierID'];
$choosingShipping = $_SESSION['sessChoosingShipping'];
$sessShippingID = $_SESSION['sessShippingID'];
$sessMemberID = $_SESSION['sessMemberID'];

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

$queryService = "SELECT A.serviceName, A.serviceID, B.costID FROM as_services A INNER JOIN as_shipping_costs B ON A.serviceID = B.serviceID WHERE A.courierID = '$courierID' 
AND B.provinceID = '$dataMember[provinceID]' AND B.cityID = '$dataMember[cityID]' AND A.status = 'Y' ORDER BY A.serviceName ASC";
$sqlService = mysqli_query($connect, $queryService);
$numsService = mysqli_num_rows($sqlService);

if ($numsService == '0')
{
	echo "<option value='0'>-</option>";
}
else
{
	echo "<option value=''></option>";
}
while ($dtService = mysqli_fetch_array($sqlService))
{
	echo "<option value='$dtService[serviceID]|$dtService[costID]'>$dtService[serviceName]</option>";
}
?>
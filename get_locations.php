<?php
error_reporting(0);
session_start();

include "config/connection.php";
$courier = explode("|", $_GET['courierID']);
$courierID = $courier[0];
$sessMemberID = $_SESSION['sessMemberID'];
$sessShippingID = $_SESSION['sessShippingID'];

// if choosing is 1
if ($sessShippingID == '+' || $sessShippingID == '')
{
	$queryMember = "SELECT * FROM as_members WHERE memberID = '$sessMemberID'";
}

else
{
	$queryMember = "SELECT * FROM as_shippings WHERE shippingID = '$sessShippingID'";
}

$sqlMember = mysqli_query($connect, $queryMember);
$dataMember = mysqli_fetch_array($sqlMember);

$queryLocation = "SELECT * FROM as_locations WHERE courierID = '$courierID' AND provinceID = '$dataMember[provinceID]' AND cityID = '$dataMember[cityID]' AND status = 'Y' ORDER BY locationName ASC";
$sqlLocation = mysqli_query($connect, $queryLocation);
$numsLocation = mysqli_num_rows($sqlLocation);

if ($numsLocation == '0')
{
	echo "<option value='0'>-</option>";
}
while ($dtLocation = mysqli_fetch_array($sqlLocation))
{
	echo "<option value='$dtLocation[locationID]'>$dtLocation[locationName]</option>";
}
?>
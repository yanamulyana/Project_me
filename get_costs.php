<?php
error_reporting(0);
session_start();

include "config/connection.php";
include "config/fungsi_rupiah.php";

$courier = explode("|", $_GET['courierID']);
$costID = $courier[2];
//$choosingShipping = $_SESSION['sessChoosingShipping'];
$sessShippingID = $_SESSION['sessShippingID'];

// if choosing is 1
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
	
	echo $weight1.$weight2." : Rp.".$shippingCost."<br>";
}
?>
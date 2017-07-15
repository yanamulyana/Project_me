<?php
error_reporting(0);
session_start();

include "config/connection.php";
include "config/fungsi_rupiah.php";

$courier = explode("|", $_GET['courierID']);
$courierID = $courier[0];
$costID = $courier[2];
$queryAddCost = "SELECT * FROM as_couriers WHERE courierID = '$courierID' AND status = 'Y'";
$sqlAddCost = mysqli_query($connect, $queryAddCost);
$dataAddCost = mysqli_fetch_array($sqlAddCost);

$queryCart = "SELECT B.weight, A.price, A.qty, A.subtotal FROM as_carts A INNER JOIN as_products B ON A.productID=B.productID WHERE A.invoiceID = '$_SESSION[invoice]'";
$sqlCart = mysqli_query($connect, $queryCart);
$i = 1;
while ($dtCart = mysqli_fetch_array($sqlCart))
{
	$weight2 = $dtCart['qty'] * $dtCart['weight'];
	$subtotal += $dtCart['subtotal'];
	$subWeight += $weight2;
	$i++;
}

$weightTop = ceil($subWeight);

// shippingCost
$queryShipping = "SELECT * FROM as_shipping_weight_costs WHERE costID = '$costID'";
$sqlShipping = mysqli_query($connect, $queryShipping);

while ($dtShipping = mysqli_fetch_array($sqlShipping))
{
	$max = MAX($dtShipping['weightTo'], $max);
	
	if ($weightTop > $max && $dtShipping['weightTo'] == "0")
	{
		$weight = $weightTop - $max; // 12 - 5 = 7
		
		if ($dtShipping['shippingStatus'] == 'K')
		{
			$kgs = $weight * $dtShipping['shippingCost'];
		}
		else
		{
			$kgs = $dtShipping['shippingCost'];
		}
	}
	
	if ($weightTop >= $dtShipping['weightFrom'] && $weightTop <= $dtShipping['weightTo'] && $dtShipping['weightTo'] != "0")
	{
		if ($dtShipping['shippingStatus'] == 'K')
		{
			$kgp = $weightTop * $dtShipping['shippingCost'];
		}
		else
		{
			$kgp = $dtShipping['shippingCost'];
		}
	}
	else
	{
		if ($weightTop > $max && $dtShipping['weightTo'] != "0")
		{
			if ($dtShipping['shippingStatus'] == 'K')
			{
				$kgp = $weight * $dtShipping['shippingCost'];
			}
			else
			{
				$kgp = $dtShipping['shippingCost'];
			}
		}
	}
}

$totCost = $kgp + $kgs;
$totalCost = $totCost + $dataAddCost['addCost'];

$result = $dataAddCost['addCost']."-".$totalCost; 

echo json_encode($result);

//$addCost = "Rp. ".format_rupiah($dataAddCost['addCost']);
//echo $addCost;
exit();
?>
<?php
error_reporting(0);
session_start();

include "config/connection.php";
include "config/fungsi_rupiah.php";

$courier = explode("|", $_GET['courierID']);
$courierID = $courier[0];
$queryInsurance = "SELECT insurance FROM as_couriers WHERE courierID = '$courierID' AND status = 'Y'";
$sqlInsurance = mysqli_query($connect, $queryInsurance);
$dataInsurance = mysqli_fetch_array($sqlInsurance);

$subtotal = $_GET['subtotaladdress'];

$total = $subtotal * ($dataInsurance['insurance'] / 100);
$totalRp = format_rupiah($total);
$tot = $total."-".$totalRp;
//echo $dataInsurance['insurance'] ."%";
echo json_encode($tot);
exit();
?>
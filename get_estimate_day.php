<?php
error_reporting(0);
session_start();

include "config/connection.php";
include "config/fungsi_rupiah.php";

$costID = $_GET['costID'];

$queryCost = "SELECT * FROM as_shipping_costs WHERE costID = '$costID'";
$sqlCost = mysqli_query($connect, $queryCost);
$dataCost = mysqli_fetch_array($sqlCost);
echo $dataCost['estimateDay'];
?>
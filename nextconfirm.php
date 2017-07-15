<?php
include "header.php";

$courier = explode("|", $_POST['courierID']); 
$locationID = $_POST['locationID'];
$note = mysqli_real_escape_string($connect, $_POST['note']);

$_SESSION['sessCourierID'] = $courier[0];
$_SESSION['sessServiceID'] = $courier[2];
$_SESSION['sessServiceID2'] = $courier[1];
$_SESSION['sessLocationID'] = $locationID;
$_SESSION['sessNote'] = $note;

//header("Location: confirm-order.html");
header("Location: coupon-info.html");
?>
<?php
error_reporting(0);
session_start();

include "config/connection.php";

$qty = $_POST['qty'];
$productID = $_POST['productID'];
$price = $_POST['price'];
$cartID = $_POST['cartID'];
$invoice = $_SESSION['invoice'];

$subtotal = $price * $qty;

// products
$queryProduct = "SELECT buyPrice FROM as_products WHERE productID = '$productID'";
$sqlProduct = mysqli_query($connect, $queryProduct);
$dataProduct = mysqli_fetch_array($sqlProduct);

$modal = $dataProduct['buyPrice'];
$totalModal = $modal * $qty;

// update the cart
$queryUpdate = "UPDATE as_carts SET	modal = '$modal',
									totalModal = '$totalModal',
									qty= '$qty',
									subtotal = '$subtotal'
									WHERE cartID = '$cartID' AND invoiceID = '$invoice'";
mysqli_query($connect, $queryUpdate);

// create session
$_SESSION['sessCart'] = 3;

echo json_encode(OK);
?>
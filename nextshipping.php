<?php
include "header.php";

$shippingMethod = $_POST['shippingMethod'];
$note = mysqli_real_escape_string($connect, $_POST['note']);
$_SESSION['sessShippingMethod'] = $shippingMethod;
$_SESSION['sessNote'] = $note;

header("Location: confirm-order.html");
?>
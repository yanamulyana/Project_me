<?php
error_reporting(0);
session_start();
include "../config/connection.php";

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "" && $_SESSION['sessLevel'] != "1")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'product' && $act == 'delimage')
{
	$no = $_GET['no'];
	$file = $_GET['file'];
	$productID = $_GET['pid'];
	
	unlink("../images/products/".$file);
	unlink("../images/products/thumb/small_".$file);
	
	if ($no == '1')
	{
		$queryDelete = "UPDATE as_products SET image1 = '' WHERE productID = '$productID'";
	}
	if ($no == '2')
	{
		$queryDelete = "UPDATE as_products SET image2 = '' WHERE productID = '$productID'";
	}
	if ($no == '3')
	{
		$queryDelete = "UPDATE as_products SET image3 = '' WHERE productID = '$productID'";
	}
	if ($no == '4')
	{
		$queryDelete = "UPDATE as_products SET image4 = '' WHERE productID = '$productID'";
	}
	if ($no == '5')
	{
		$queryDelete = "UPDATE as_products SET image5 = '' WHERE productID = '$productID'";
	}
	if ($no == '6')
	{
		$queryDelete = "UPDATE as_products SET image6 = '' WHERE productID = '$productID'";
	}
	
	mysqli_query($connect, $queryDelete);
	
	header("Location: ".$_SERVER['HTTP_REFERER']);
}
?>
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

if ($module == 'courier' && $act == 'delete')
{
	$file = $_GET['file'];
	$courierID = $_GET['courierID'];
	
	unlink("../images/couriers/".$file);
	unlink("../images/couriers/thumb/small_".$file);
	
	$queryUpdate = "UPDATE as_couriers SET image = '' WHERE courierID = '$courierID'";
	mysqli_query($connect, $queryUpdate);
	
	header("Location: ".$_SERVER['HTTP_REFERER']);
}
?>
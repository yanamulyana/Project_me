<?php
error_reporting(0);
session_start();

include "../config/connection.php";

$provinceID = $_GET['provinceID'];
$queryCity = "SELECT * FROM as_cities WHERE provinceID = '$provinceID' ORDER BY cityName ASC";
$sqlCity = mysqli_query($connect, $queryCity);

while ($dtCity = mysqli_fetch_array($sqlCity))
{
	echo "<option value='$dtCity[cityID]'>$dtCity[cityName]</option>";
}
?>
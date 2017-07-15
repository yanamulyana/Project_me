<?php
error_reporting(0);
session_start();

include "config/connection.php";

$courierID = $_GET['courierID'];
$queryService = "SELECT * FROM as_services WHERE courierID = '$courierID' AND status = 'Y' ORDER BY serviceName ASC";
$sqlService = mysqli_query($connect, $queryService);

while ($dtService = mysqli_fetch_array($sqlService))
{
	echo "<option value='$dtService[serviceID]'>$dtService[serviceName]</option>";
}
?>
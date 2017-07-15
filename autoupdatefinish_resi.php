<?php
include "config/connection.php";

$day = 7;

$queryUpdate = "UPDATE as_orders SET status = '4' WHERE DATEDIFF(CURDATE(),modifiedDate) > $day AND status = '3'";
mysqli_query($connect, $queryUpdate);
?>
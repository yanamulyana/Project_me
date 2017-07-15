<?php
include "config/connection.php";

$day = 2;

$queryUpdate = "UPDATE as_orders SET status = '5', keterangan = 'Batal by System' WHERE DATEDIFF(CURDATE(),createdDate) > $day AND status = '1'";
mysqli_query($connect, $queryUpdate);
?>
<?php
include "header.php";

$selisihJam = "36:00:00";
$createdDate = date('Y-m-d H:i:s');

$querySales = "SELECT orderID,invoiceID FROM as_orders WHERE status = '1' AND (TIMEDIFF('$createdDate',createdDate)) > '$selisihJam'";
$sqlSales = mysqli_query($connect, $querySales);
while ($dtSales = mysqli_fetch_array($sqlSales))
{
	$queryConfirm = "SELECT * FROM as_confirms WHERE invoiceID = '$dtSales[invoiceID]'";
	$sqlConfirm = mysqli_query($connect, $queryConfirm);
	$numsConfirm = mysqli_num_rows($sqlConfirm);
	
	if ($numsConfirm == '0')
	{
		$queryOrder = "UPDATE as_orders SET status = '5', keterangan = 'Otomatis Batal by System' WHERE invoiceID = '$dtSales[invoiceID]'";
		mysqli_query($connect, $queryOrder);
	}
}

$selisihHari = 7;
$queryConsignment = "UPDATE as_orders SET status = '4' WHERE status = '3' AND consignment != '' AND DATEDIFF(CURDATE(),modifiedDate) > '$selisihHari'";
mysqli_query($connect, $queryConsignment);
?>
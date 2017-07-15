<?php
include "header.php";
$page = "chaddshipping.tpl";

$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
$sqlProvince = mysqli_query($connect, $queryProvince);

while ($dtProvince = mysqli_fetch_array($sqlProvince))
{
	$dataProvince[] = array(	'provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
}

$smarty->assign("dataProvince", $dataProvince);

$smarty->assign("metaTitle", "Add New Shipping");

include "footer.php";
?>
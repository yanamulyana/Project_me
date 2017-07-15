<?php
// include header
include "header.php";
// set the tpl page
$page = "product_buyautocomplete.tpl";

// if session is null, showing up the text and exit
if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

else 
{
	$q = $_GET['q'];
	
	$queryProduct = "SELECT productID, productCode, productName, buyPrice, salePrice FROM as_products WHERE productName LIKE '%$q%' OR productCode LIKE '%$q%'";
	$sqlProduct = mysqli_query($connect, $queryProduct);
	
	// fetch data
	while ($dtProduct = mysqli_fetch_array($sqlProduct))
	{
		echo "$dtProduct[productCode] - $dtProduct[productName] - $dtProduct[buyPrice] - $dtProduct[salePrice]\n";
	}	
}
?>
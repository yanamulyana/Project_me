<?php
include "header.php";
$page = "cart.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

// if mod is cart and act is input
if ($module == 'cart' && $act == 'input')
{
	// get the variable name
	$productID = $_POST['productID'];
	$qty = $_POST['qty'];
	$salePrice = $_POST['salePrice'];
	$buyPrice = $_POST['buyPrice'];
	$discountPrice = $_POST['discountPrice'];
	$productSeo = $_POST['productSeo'];
	$totalModal = $qty * $buyPrice;
	$server = $_SERVER['HTTP_REFERER'];
	
	// check the discount price what the discount price is not null
	if ($_SESSION['sessLevel'] == '2')
	{
		$subtotal = $salePrice * $qty;
		$price = $salePrice;
	}
	elseif ($_SESSION['sessLevel'] == '3')
	{
		$subtotal = $salePrice * $qty;
		$price = $salePrice;
	}
	else
	{
		if ($discountPrice != '0' || $discountPrice != '' || $discountPrice > 0)
		{
			$subtotal = $discountPrice * $qty;
			$price = $discountPrice;
		}
		// if the discount price is null
		else
		{
			$subtotal = $salePrice * $qty;
			$price = $salePrice;
		}
	}
	
	// check stock before
	$queryCheckCart = "SELECT qty FROM as_carts WHERE invoiceID = '$invoice' AND productID = '$productID'";
	$sqlCheckCart = mysqli_query($connect, $queryCheckCart);
	$dataCheckCart = mysqli_fetch_array($sqlCheckCart); 
	
	$queryStock = "SELECT qty FROM as_products WHERE productID = '$productID'";
	$sqlStock = mysqli_query($connect, $queryStock);
	$dataStock = mysqli_fetch_array($sqlStock);
	$numsStock = mysqli_num_rows($sqlStock);
	
	$totalQty = $dataCheckCart['qty'] + $qty;
	
	if ($totalQty > $dataStock['qty'])
	{
		$_SESSION['sessCart'] = 1;
		$_SESSION['referer'] = $server;
		
		header("Location: ".$server);
	}
	
	else
	{
		// check in the cart table what the this product and this invoice has already exist in the table
		$queryCart = "SELECT * FROM as_carts WHERE invoiceID = '$invoice' AND productID = '$productID'";
		$sqlCart = mysqli_query($connect, $queryCart);
		$numsCart = mysqli_num_rows($sqlCart);
		
		// if exist
		if ($numsCart > 0)
		{
			// update the cart
			$queryUpdate = "UPDATE as_carts SET	totalModal=totalModal+$buyPrice,
												price = '$price',
												qty=qty+$qty,
												subtotal=subtotal+$subtotal
												WHERE invoiceID = '$invoice' AND productID = '$productID'";
			mysqli_query($connect, $queryUpdate);
		}
		
		// if not exist
		else
		{
			// insert new in the table
			$queryInsert = "INSERT INTO as_carts (	invoiceID,
													productID,
													modal,
													totalModal,
													price,
													qty,
													subtotal)
											VALUES(	'$invoice',
													'$productID',
													'$buyPrice',
													'$totalModal',
													'$price',
													'$qty',
													'$subtotal')";
			mysqli_query($connect, $queryInsert);
		}
		
		// create session
		$_SESSION['sessCart'] = 2;
		//$_SESSION['sessPopUp'] = "OK";
		$_SESSION['referer'] = $server;
	
		header("Location: ".$server);
	}
}

// if mod is cart and act is update
elseif ($module == 'cart' && $act == 'update')
{
	$cartID = $_POST['cartID'];
	$price = $_POST['price'];
	$qty = $_POST['qty'];
	
	$subtotal = $price * $qty;
	
	// update the cart
	$queryUpdate = "UPDATE as_carts SET	qty= '$qty',
										subtotal = '$subtotal'
										WHERE cartID = '$cartID' AND invoiceID = '$invoice'";
	mysqli_query($connect, $queryUpdate);
	
	// create session
	$_SESSION['sessCart'] = 3;
	
	header("Location: checkout.html");
}

// if mod is cart and act is show
elseif ($module == 'cart' && $act == 'show')
{
	$smarty->assign("msg", $_SESSION['sessCart']);
	$_SESSION['sessCart'] = "";
	
	$queryCart = "SELECT A.cartID, B.weight, A.productID, A.sizeID, A.price, A.qty, A.subtotal, B.productSeo, B.productName, B.image1, C.sizeIndo, C.sizeUsa, C.sizeEur
				FROM as_carts A INNER JOIN as_products B ON A.productID=B.productID
				INNER JOIN as_sizes C ON C.sizeID=A.sizeID
				WHERE A.invoiceID = '$invoice'";
	$sqlCart = mysqli_query($connect, $queryCart);
	$i = 1;
	while ($dtCart = mysqli_fetch_array($sqlCart))
	{
		$weight = $dtCart['qty'] * $dtCart['weight'];
		
		$dataCart[] = array('cartID' => $dtCart['cartID'],
							'productID' => $dtCart['productID'],
							'sizeName' => "[INA : ".$dtCart['sizeIndo']."], [USA : ".$dtCart['sizeUsa']."], [EUR : ".$dtCart['sizeEur']."]",
							'sizeID' => $dtCart['sizeID'],
							'price' => $dtCart['price'],
							'priceRp' => format_rupiah($dtCart['price']),
							'qty' => $dtCart['qty'],
							'weight' => $weight,
							'subtotal' => $dtCart['subtotal'],
							'subtotalRp' => format_rupiah($dtCart['subtotal']),
							'productName' => $dtCart['productName'],
							'image' => $dtCart['image1'],
							'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCart", $dataCart);
	
	$smarty->assign("metaTitle", "Keranjang Belanja");
}

// if mod is cart and act is delete
elseif ($module == 'cart' && $act == 'delete')
{
	$cartID = $_GET['cartID'];
	
	$queryCart = "DELETE FROM as_carts WHERE cartID = '$cartID' AND invoiceID = '$invoice'";
	mysqli_query($connect, $queryCart);
	
	$_SESSION['sessCart'] = 4;
	
	header("Location: ".$_SERVER['HTTP_REFERER']);
}

include "footer.php";
?>
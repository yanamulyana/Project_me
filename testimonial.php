<?php
include "header.php";
$page = "testimonial.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

// if mod is testimonial and act is show
if ($module == 'testimonial' && $act == 'show')
{
	// showing up the testimonial
	$p = new PagingTestimonial;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$queryTestimonial = "SELECT * FROM as_testimonials WHERE status = 'Y' ORDER BY createdDate DESC LIMIT $posisi, $batas";
	$sqlTestimonial = mysqli_query($connect, $queryTestimonial);
	
	while ($dtTestimonial = mysqli_fetch_array($sqlTestimonial))
	{
		$created = explode(" ", $dtTestimonial['createdDate']);
		
		$dataTestimonial[] = array(	'fullName' => $dtTestimonial['fullName'],
									'testimonial' => $dtTestimonial['testimonial'],
									'createdDate' => tgl_indo2($created[0])." ".$created[1]);
	}
	
	$smarty->assign("dataTestimonial", $dataTestimonial);
	
	$queryJmlData = "SELECT * FROM as_testimonials WHERE status = 'Y'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsTestimonial", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Testimonial");
	
	// showing up the new product
	$queryNewProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY createdDate DESC LIMIT 5";
	$sqlNewProduct = mysqli_query($connect, $queryNewProduct);
	
	while ($dtNewProduct = mysqli_fetch_array($sqlNewProduct))
	{
		$dataNewProduct[] = array(	'productID' => $dtNewProduct['productID'],
									'productName' => $dtNewProduct['productName'],
									'productSeo' => $dtNewProduct['productSeo'],
									'salePrice' => format_rupiah($dtNewProduct['salePrice']),
									'discountPrice' => format_rupiah($dtNewProduct['discountPrice']),
									'image1' => $dtNewProduct['image1']);
	}
	
	$smarty->assign("dataNewProduct", $dataNewProduct);
}

// if mod is testimonial and act is add
elseif ($module == 'testimonial' && $act == 'add')
{
	if ($_SESSION['sessMemberID'] == "" && $_SESSION['sessEmail'] == ""){
		echo "Silahkan login terlebih dahulu ke member Anaku.com Anda";
		exit();
	}
	
	$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);
	
	// check the testimonial
	$queryTestimonial = "SELECT * FROM as_testimonials WHERE orderID = '$orderID'";
	$sqlTestimonial = mysqli_query($connect, $queryTestimonial);
	$numsTestimonial = mysqli_num_rows($sqlTestimonial);
	
	// check order
	$queryOrder = "SELECT status, invoiceID, orderID, customerID FROM as_orders WHERE orderID = '$orderID'";
	$sqlOrder = mysqli_query($connect, $queryOrder);
	$dataOrder = mysqli_fetch_array($sqlOrder);
	
	$queryMember = "SELECT A.firstName, A.lastName FROM as_members A INNER JOIN as_customers B ON A.memberID=B.memberID WHERE B.customerID = '$dataOrder[customerID]'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	
	if ($numsTestimonial > 0)
	{
		header("Location: history-".$orderID.".html");
	}
	elseif ($dataOrder['status'] != '4')
	{
		header("Location: history-".$orderID.".html");
	}
	
	$smarty->assign("orderID", $orderID);
	$smarty->assign("metaTitle", "Tambah Testimonial");
	
	$smarty->assign("createdDate", tgl_indo2(date('Y-m-d')));
	$smarty->assign("invoiceID", $dataOrder['invoiceID']);
	$smarty->assign("fullName", $dataMember['firstName']." ".$dataMember['lastName']);
}

// if mod is testimonial and act is input
elseif ($module == 'testimonial' && $act == 'input')
{
	$orderID = mysqli_real_escape_string($connect, $_POST['orderID']);
	$fullName = mysqli_real_escape_string($connect, $_POST['fullName']);
	$testimonial = mysqli_real_escape_string($connect, $_POST['testimonial']);
	$createdDate = date('Y-m-d H:i:s');
	
	// save into the database
	$queryTestimonial = "INSERT INTO as_testimonials (	orderID,
														fullName,
														testimonial,
														status,
														createdDate)
												VALUES(	'$orderID',
														'$fullName',
														'$testimonial',
														'Y',
														'$createdDate')";
	mysqli_query($connect, $queryTestimonial);
	
	header("Location: history-".$orderID.".html");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
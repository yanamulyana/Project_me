<?php
include "header.php";
$page = "sign_in.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

// if mod is sign_in and act is input
if ($module == 'sign_in' && $act == 'input')
{
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = md5($_POST['password']);
	
	$queryMember = "SELECT * FROM as_members WHERE email = '$email' AND password = '$password'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	$numsMember = mysqli_num_rows($sqlMember);
	
	if ($numsMember > 0)
	{
		// jika tidak aktif dan kode verifikasi tidak kosong
		if ($dataMember['status'] == 'N' && $dataMember['verificationCode'] != '')
		{
			$_SESSION['sessSignIn'] = 2;
			
			header("Location: sign-in.html");
		}
		
		elseif ($dataMember['status'] == 'Y')
		{
		
			$_SESSION['sessMemberID'] = $dataMember['memberID'];
			$_SESSION['sessEmail'] = $dataMember['email'];
			$_SESSION['sessFirstName'] = $dataMember['firstName'];
			$_SESSION['sessLastName'] = $dataMember['lastName'];
			$_SESSION['sessLevel'] = $dataMember['level'];
			$_SESSION['sessRequirement'] = $dataMember['requirement'];
			
			$date = date('Y-m-d');
			
			$queryPoint = "UPDATE as_members SET lastLogin = '$date', pointTotal=pointTotal+1 WHERE memberID = '$dataMember[memberID]' AND lastLogin < '$date'";
			mysqli_query($connect, $queryPoint);
			
			if ($dataMember['firstName'] == '' && $dataMember['lastName'] == '' || $dataMember['gender'] == '' || $dataMember['address'] == '' || $dataMember['provinceID'] == '0' || $dataMember['cityID'] == '0')
			{
				$_SESSION['sessLoginAccount'] = "1";
				
				header("Location: edit-account.html");
			}
			
			else
			{
				if (strpos($_SERVER['HTTP_REFERER'], "sign") !== FALSE)
				{
					header("Location: home");
				}
				else
				{
					header("Location: ".$_SERVER['HTTP_REFERER']);
				}
			}
		}
	}
	
	else
	{
		$_SESSION['sessSignIn'] = 1;
		
		header("Location: sign-in.html");
	}	
}

else
{
	$smarty->assign("msg", $_SESSION['sessSignIn']);
	$_SESSION['sessSignIn'] = "";
	
	$smarty->assign("metaTitle", "Login to Your Account");
	
	// showing up the best seller product
	$queryBestProduct = "SELECT productID, productName, productSeo, salePrice, discountPrice, image1 FROM as_products WHERE status = 'Y' ORDER BY sold DESC LIMIT 5";
	$sqlBestProduct = mysqli_query($connect, $queryBestProduct);
	
	while ($dtBestProduct = mysqli_fetch_array($sqlBestProduct))
	{
		$dataBestProduct[] = array(	'productID' => $dtBestProduct['productID'],
									'productName' => $dtBestProduct['productName'],
									'productSeo' => $dtBestProduct['productSeo'],
									'salePrice' => format_rupiah($dtBestProduct['salePrice']),
									'discountPrice' => format_rupiah($dtBestProduct['discountPrice']),
									'image1' => $dtBestProduct['image1']);
	}
	
	$smarty->assign("dataBestProduct", $dataBestProduct);
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
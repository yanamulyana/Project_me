<?php
include "header.php";
$page = "sign_up.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

// if mod is sign_up and act is input
if ($module == 'sign_up' && $act == 'input')
{
	$cellPhone = mysqli_real_escape_string($connect, $_POST['cellPhone']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = md5($_POST['password']);
	$confirmPassword = md5($_POST['confirmPassword']);
	$createdDate = date('Y-m-d H:i:s');
	
	$queryCheck = "SELECT memberID FROM as_members WHERE email = '$email'";
	$sqlCheck = mysqli_query($connect, $queryCheck);
	$numsCheck = mysqli_num_rows($sqlCheck);
	
	if ($numsCheck > 0)
	{
		$_SESSION['sessSignRegister'] = 2;
		
		header("Location: sign-up.html");
	}
	
	else
	{
		// if password and confirm password did not match
		if ($password != $confirmPassword)
		{
			$_SESSION['sessSignRegister'] = 1;
			
			header("Location: sign-up.html");
		}
		else
		{
			$_SESSION['sessSignCellPhone'] = "";
			$_SESSION['sessSignEmail'] = "";
			$_SESSION['sessLevel'] = 1;
			
			function generate_password($length = 10){
				$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
				$str = '';
				$max = strlen($chars) - 1;
				
				for ($i=0; $i < $length; $i++)
					$str .= $chars[rand(0, $max)];
					
				return $str;
			}
			
			$verificationCode = generate_password();
			
			// save into the database
			$queryRegister = "INSERT INTO as_members (	firstName,
														lastName,
														gender,
														address,
														provinceID,
														cityID,
														zipCode,
														phone,
														cellPhone,
														email,
														password,
														status,
														level,
														verificationCode,
														createdDate,
														pointTotal,
														lastLogin,
														requirement)
												VALUES(	'',
														'',
														'',
														'',
														'',
														'',
														'',
														'',
														'$cellPhone',
														'$email',
														'$password',
														'N',
														'1',
														'$verificationCode',
														'$createdDate',
														'1',
														'',
														'1')";
			mysqli_query($connect, $queryRegister);
			
			//$pass = $_POST['password'];
			$subject = "Email aktivasi: Aktifkan akun Anaku Anda melalui email ini!";
			$host = $_SERVER['HTTP_HOST'];
			$content = 
					"
					<body style='margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;'>
						<center>
						<table style='width: 600px; font-family: arial; text-align: center; font-size: 14px;'>
							<tr>
								<td style='border-bottom: 1px solid #ddd; padding-bottom: 10px;'><br><br>Importir yang bergerak di bidang penjualan produk - produk minuman dari brand ternama.</td>
							</tr>
							<tr>
								<td style='padding-top: 10px;' align='center'>
									<table>
										<tr>
											<td style='width: 60px;'>
												<img src='http://$host/images/logo.png' style='width: 50px;'>
											</td>
											<td>
												<span style='font-size: 18px;'><b>Anaku.Com</b></font>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<br>
						<table style='width: 600px; font-family: arial; font-size: 14px; background: #FFF; padding: 10px;'>
							<tr>
								<td>
									Kepada Yth <b>Customer</b>,<br> <br><br>
									Terima kasih atas kepercayaan Anda bergabung sebagai member di Anaku.com.<br><br>
									Hanya 1 langkah lagi Anda menjadi member Anaku.com<br><br>
									Klik url dibawah untuk mengaktifkan keanggotaan Anda.<br>
									<a href='http://$host/activate.php?code=$verificationCode&email=$email'>http://$host/activate.php?code=$verificationCode&email=$email</a><br><br><br>
									Best Regards,<br>
									Anaku.com
								</td>
							</tr>
						</table><br>
						<p style='font-family: arial; font-size: 12px; border-bottom: 1px solid #DDD; padding-bottom: 10px;'>Copyright &copy; 2016 Anaku.com. All Right Reserved.<br><br></p>
						<p style='font-family: arial; font-size: 12px;'>
							Mohon jangan balas email ini, karena email ini dikirim secara otomatis oleh sistem<br><br>
						</p>
						</center>
					</body>
					";
					
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers .= 'From: Anaku.com <no-reply@Anaku.com>' . "\r\n";
	
			mail($email, $subject, $content, $headers);
			
			header("Location: verification.html");
		}
	}
}

// if mod is sign_up and act is verification
elseif ($module == 'sign_up' && $act == 'verification')
{
	$smarty->assign("metaTitle", "Registrasi Berhasil");
}

else
{
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	
	$smarty->assign("dataProvince", $dataProvince);
		
	$smarty->assign("msg", $_SESSION['sessSignRegister']);
	$smarty->assign("sessSignFirstName", $_SESSION['sessSignFirstName']);
	$smarty->assign("sessSignLastName", $_SESSION['sessSignLastName']);
	$smarty->assign("sessSignGender", $_SESSION['sessSignGender']);
	$smarty->assign("sessSignAddress", $_SESSION['sessSignAddress']);
	$smarty->assign("sessSignProvinceID", $_SESSION['sessSignProvinceID']);
	
	if ($_SESSION['sessSignProvinceID'] != "")
	{
		$queryCity = "SELECT * FROM as_cities WHERE status = 'Y' AND provinceID = '$_SESSION[sessSignProvinceID]' ORDER BY cityName ASC";
		$sqlCity = mysqli_query($connect, $queryCity);
		
		while ($dtCity = mysqli_fetch_array($sqlCity))
		{
			$dataCity[] = array('cityID' => $dtCity['cityID'],
								'cityName' => $dtCity['cityName']);
		}
		
		$smarty->assign("dataCity", $dataCity);
	}
	
	$smarty->assign("sessSignCityID", $_SESSION['sessSignCityID']);
	$smarty->assign("sessSignZipCode", $_SESSION['sessSignZipCode']);
	$smarty->assign("sessSignPhone", $_SESSION['sessSignPhone']);
	$smarty->assign("sessSignCellPhone", $_SESSION['sessSignCellPhone']);
	$smarty->assign("sessSignEmail", $_SESSION['sessSignEmail']);
	
	$smarty->assign("msg", $_SESSION['sessSignRegister']);
	
	$_SESSION['sessSignRegister'] = "";
	
	$smarty->assign("metaTitle", "Register");
	
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
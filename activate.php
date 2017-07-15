<?php
include "header.php";
// set tpl
$page = "activate.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'verification' && $act == 'success')
{
	$smarty->assign("metaTitle", "Verifikasi Berhasil");
}

// if mod is verification and act is failed
elseif ($module == 'verification' && $act == 'failed')
{
	$smarty->assign("metaTitle", "Verifikasi Gagal");
}

else
{
	// get value method
	$email = $_GET['email'];
	$code = $_GET['code'];
	
	if ($email != '' && $code != ''){
		// check data member based on email and verification code and status
		$queryMember = "SELECT * FROM as_members WHERE email = '$email' AND status = 'N' AND verificationCode = '$code'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$numsMember = mysqli_num_rows($sqlMember);
		
		// if found
		if ($numsMember > 0)
		{
			$queryUpdate = "UPDATE as_members SET verificationCode = '', status = 'Y' WHERE email = '$email'";
			mysqli_query($connect, $queryUpdate);
			
			$subject = "Congratulation: Akun Anda telah Aktif";
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
									<b>Congratulation!</b>,<br> <br><br>
									Akun Anda telah aktif sekarang..<br><br>
									Dapatkan 1 poin reward per harinya setiap kali Anda login dan berkunjung ke Anaku.com<br><br>
									Silahkan isikan terlebih dahulu data profil Anda sebelum melakukan transaksi belanja pertama Anda.<br><br><br>
									
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
			
			header("Location: success-verification.html");
		}
		
		// if not found
		else{
			header("Location: failed-verification.html");
		}
	}
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
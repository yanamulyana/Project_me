<?php
include "header.php";
$page = "resend_email.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'resend' && $act == 'verification')
{
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	
	$queryMember = "SELECT * FROM as_members WHERE email = '$email'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$dataMember = mysqli_fetch_array($sqlMember);
	$numsMember = mysqli_num_rows($sqlMember);
	
	if ($numsMember > 0)
	{
		// jika tidak aktif dan kode verifikasi tidak kosong
		if ($dataMember['status'] == 'N' && $dataMember['verificationCode'] != '')
		{
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
									<a href='http://$host/activate.php?code=$dataMember[verificationCode]&email=$email'>http://$host/activate.php?code=$dataMember[verificationCode]&email=$email</a><br><br><br>
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
			
			$_SESSION['sessResend'] = 1;
			
			header("Location: resend-email.html");
		}
		
		elseif ($dataMember['status'] == 'Y')
		{
			$_SESSION['sessResend'] = 2;
			
			header("Location: resend-email.html");
		}
	}
	
	else
	{
		$_SESSION['sessResend'] = 3;
		
		header("Location: resend-email.html");
	}
}

else
{
	$smarty->assign("sessResend", $_SESSION['sessResend']);
	$_SESSION['sessResend'] = "";
	
	$smarty->assign("metaTitle", "Kirim Ulang Email Aktifasi");
}

include "footer.php";
?>
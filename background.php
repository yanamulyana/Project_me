<?php
$host = $_SERVER['HTTP_HOST'];
$content = 
"
<body style='margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;'>
	<center>
	<table style='width: 600px; font-family: arial; text-align: center; font-size: 14px;'>
		<tr>
			<td style='border-bottom: 1px solid #ddd; padding-bottom: 10px;'>Importir yang bergerak di bidang penjualan produk - produk minuman dari brand ternama.</td>
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
				Kepada <b>AA</b>,<br> <br><br>
				Terima kasih atas kepercayaan Anda bergabung sebagai member di Anaku.com.<br><br>
				Hanya 1 langkah lagi Anda menjadi member Anaku.com<br><br>
				Klik url dibawah untuk mengaktifkan keanggotaan Anda.<br>
				<a href='http://$host/activate.php?mod=activate&act=verify&verify=$verificationCode&email=$email'>http://$host/activate.php?mod=activate&act=verify&verify=$verificationCode&email=$email</a><br><br><br>
				Best Regards,<br>
				Anaku.com
			</td>
		</tr>
	</table><br>
	<p style='font-family: arial; font-size: 12px; border-bottom: 1px solid #DDD; padding-bottom: 10px;'>Copyright &copy; 2016 Anaku.com. All Right Reserved.<br><br></p>
	<p style='font-family: arial; font-size: 12px;'>
		Mohon jangan balas email ini, karena email ini dikirim secara otomatis oleh sistem
	</p>
	</center>
</body>
";
//<img src='assets/images/email_template/social_icon3.png' alt='' border='0' class='hover' width='30' height='auto' style='width: 30px; height: auto;'>
echo $content;
?>
<?php
include "header.php";
$page = "password.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'password' && $act == 'input')
{
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	
	$queryMember = "SELECT * FROM as_members WHERE email = '$email'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$numsMember = mysqli_num_rows($sqlMember);
	
	if ($numsMember == '0')
	{
		$_SESSION['sessForget'] = 1;
		
		header("Location: forgot-password.html");
	}
	else
	{
		function generate_password($length = 10){
			$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$str = '';
			$max = strlen($chars) - 1;
			
			for ($i=0; $i < $length; $i++)
				$str .= $chars[rand(0, $max)];
				
			return $str;
		}
		
		$verificationCode = generate_password();
		
		$queryUpdate = "UPDATE as_members SET verificationCode = '$verificationCode' WHERE email = '$email'";
		$save = mysqli_query($connect, $queryUpdate);
		
		if ($save)
		{
			$subject = "Anaku.Com: Reset Password!";
			$server = "http://Anaku.com";
			$html = "
					<p>Pelanggan Yth,</p>
					<p>Untuk mereset password Anda, klik link tautan berikut :</p>
					<p><a href='$server/password.php?mod=password&act=reset&email=$email&code=$verificationCode'>$server/password.php?mod=password&act=reset&email=$email&code=$verificationCode</a></p>
					<p>Link ini akan expire dalam 15 menit.</p>
					<p><br>Anaku.com</p>
					";
					
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers .= 'From: no-reply (Anaku.com) <no-reply@Anaku.com>' . "\r\n";
	
			mail($email, $subject, $html, $headers);
		}

		$_SESSION['sessForget'] = 2;
			
		header("Location: forgot-password.html");
	}
}

// reset
elseif ($module == 'password' && $act == 'reset')
{
	$email = mysqli_real_escape_string($connect, $_GET['email']);
	$code = mysqli_real_escape_string($connect, $_GET['code']);
	
	$queryMember = "SELECT * FROM as_members WHERE email = '$email' AND verificationCode = '$code'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$numsMember = mysqli_num_rows($sqlMember);
	$smarty->assign("numsMember", $numsMember);
	
	$smarty->assign("metaTitle", "Reset Password");
	$smarty->assign("email", $email);
	$smarty->assign("code", $code);
	
	$smarty->assign("msg", $_SESSION['sessReset']);
	$_SESSION['sessReset'] = "";
	$_SESSION['sessForget'] = "";
}

// update
elseif ($module == 'password' && $act == 'update')
{
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$code = mysqli_real_escape_string($connect, $_POST['code']);
	$newPassword = md5($_POST['newPassword']);
	$confirmPassword = md5($_POST['confirmPassword']);
	
	$queryMember = "SELECT * FROM as_members WHERE email = '$email' AND verificationCode = '$code'";
	$sqlMember = mysqli_query($connect, $queryMember);
	$numsMember = mysqli_num_rows($sqlMember);
	
	if ($numsMember == '0')
	{
		$_SESSION['sessReset'] = 1;
		
		header("Location: password.php?mod=password&act=reset&email=".$email."&code=".$code);
	}
	else
	{
		if ($newPassword != $confirmPassword)
		{
			$_SESSION['sessReset'] = 2;
			header("Location: password.php?mod=password&act=reset&email=".$email."&code=".$code);
		}
		else
		{
			$queryUpdate = "UPDATE as_members SET password = '$newPassword', verificationCode = '' WHERE email = '$email'";
			mysqli_query($connect, $queryUpdate);
			
			$_SESSION['sessReset'] = 3;
			header("Location: password.php?mod=password&act=success");
		}
	}
}

// success
elseif ($module == 'password' && $act == 'success')
{
	$_SESSION['sessReset'] = "";
	
	$smarty->assign("metaTitle", "Ubah Password Sukses");
}

else
{
	$smarty->assign("metaTitle", "Lupa Password");
	
	$smarty->assign("msg", $_SESSION['sessForget']);
	$_SESSION['sessForget'] = "";
	
	$_SESSION['sessReset'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
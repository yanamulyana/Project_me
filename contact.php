<?php
include "header.php";
$page = "contact.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'contact' && $act == 'input')
{
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$subject = mysqli_real_escape_string($connect, $_POST['subject']);
	$inquiry = mysqli_real_escape_string($connect, nl2br($_POST['inquiry']));
	$createdDate = date('Y-m-d H:i:s');
	
	$queryContact = "INSERT INTO as_contacts (	name,
												subject,
												email,
												inquiry,
												status,
												createdDate)
										VALUES ('$name',
												'$subject',
												'$email',
												'$inquiry',
												'1',
												'$createdDate')";
	mysqli_query($connect, $queryContact);
	
	$owner = $dataProfile['email'];
	$subj = "Anaku.com - Hubungi Kami";
	
	$html = "<p>Yth Anaku.com,</p>
			<p>Anaku.com telah menerima pertanyaan dari $name, berikut pertanyaan yang dikirimkan oleh $name :</p>
			<p>Subjek : $subject</p>
			<p>$inquiry</p><br>
			<p>Best Regards,<br>Anaku.com</p>";
			
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$headers .= 'From: '.$email . "\r\n";

	mail($owner, $subj, $html, $headers);
	
	$_SESSION['sessContact'] = 1;
	
	header("Location: contact-us.html");
}

else
{
	$smarty->assign("msg", $_SESSION['sessContact']);
	$_SESSION['sessContact'] = "";
	
	$smarty->assign("metaTitle", "Hubungi Kami");
}

include "footer.php";
?>
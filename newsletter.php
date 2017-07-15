<?php
include "header.php";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'newsletter' && $act == 'input')
{
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$createdDate = date('Y-m-d H:i:s');
	
	$queryCheck = "SELECT * FROM as_newsletters WHERE email = '$email'";
	$sqlCheck = mysqli_query($connect, $queryCheck);
	$numsCheck = mysqli_num_rows($sqlCheck);
	
	if ($numsCheck == '0')
	{
		$queryNewsletter = "INSERT INTO as_newsletters (email,
														status,
														createdDate)
												VALUES(	'$email',
														'Y',
														'$createdDate')";
		mysqli_query($connect, $queryNewsletter);
	}
	else
	{
		$queryNewsletter = "UPDATE as_newsletters SET status = 'Y' WHERE email = '$email'";
		mysqli_query($connect, $queryNewsletter);
	}
	
	$_SESSION['sessNewsletter'] = 1;
	
	header("Location: home");
}

include "footer.php";
?>
<?php
session_start();
include "config/connection.php"; 
include "config/facebook/facebook.php";
include "config/debug.php";

$app_id = "YOUR_APP_ID_FB";
$secret_id = "YOUR_SECRET_KEY_FB";

$facebook = new Facebook(array(
	'appId'  => $app_id,
	'secret' => $secret_id,
));

$user = $facebook->getUser();
$get_data = $facebook->api('/me?fields=first_name,last_name,email,id,gender', 'GET');
$created_date = date('Y-m-d H:i:s');
$first_name	= $get_data['first_name'];
$last_name = $get_data['last_name'];
$email = $get_data['email'];
$id	= $get_data['id'];

if ($get_data['gender'] == 'male')
{
	$gender = "L";
}
else
{
	$gender = "P";
}


$ip	= $_SERVER['REMOTE_ADDR'];

try 
{
	if($user)
	{
		$queryMember = "SELECT * FROM as_members WHERE email = '$email'";
		$sqlMember = mysqli_query($connect, $queryMember);
		$dataMember = mysqli_fetch_array($sqlMember);
		$numsMember = mysqli_num_rows($sqlMember);
		
		if ($numsMember == 1)
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
				$_SESSION['sessFacebook'] = 1;
				
				$_SESSION['sessLoginAccount'] = 1;
			}
		}
		else{
			$querySignUp = "INSERT INTO as_members(	firstName,
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
											VALUES(	'$first_name',
													'$last_name',
													'$gender',
													'',
													'',
													'',
													'',
													'',
													'',
													'$email',
													'',
													'Y',
													'1',
													'',
													'$created_date',
													'1',
													'',
													'1')";
			mysqli_query($connect, $querySignUp);
			
			$insertID = mysqli_insert_id($connect);
			
			/*$_SESSION['sessMemberID'] = $insertID;
			$_SESSION['sessEmail'] = $email;
			$_SESSION['sessFirstName'] = $first_name;
			$_SESSION['sessLastName'] = $last_name;
			$_SESSION['sessRequirement'] = 1;
			*/
			$_SESSION['sessMemberID'] = $insertID;
			$_SESSION['sessEmail'] = $email;
			$_SESSION['sessFirstName'] = $first_name;
			$_SESSION['sessLastName'] =$last_name;
			$_SESSION['sessLevel'] = 1;
			$_SESSION['sessRequirement'] = 1;
			
			$date = date('Y-m-d');
			$queryPoint = "UPDATE as_members SET lastLogin = '$date', pointTotal=pointTotal+1 WHERE memberID = '$dataMember[memberID]' AND lastLogin < '$date'";
			mysqli_query($connect, $queryPoint);
			
			if ($dataMember['firstName'] == '' && $dataMember['lastName'] == '' || $dataMember['gender'] == '' || $dataMember['address'] == '' || $dataMember['provinceID'] == '0' || $dataMember['cityID'] == '0')
			{
				$_SESSION['sessFacebook'] = 1;
				
				$_SESSION['sessLoginAccount'] = 1;
			}
		}
	}
}

//close bracket try
catch (facebookApiException $e) {
	error_log($e);
	$user = null;
}
?>
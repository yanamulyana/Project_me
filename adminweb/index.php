<?php
date_default_timezone_set("ASIA/QATAR");
error_reporting(0);
include "../config/connection.php";

// include all files are needed
require('../libs/Smarty.class.php');

// create smarty new object
$smarty = new Smarty;

$year = date('Y');

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module == 'login' && $act == 'submit')
{
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$password = md5($_POST['password']);
	$level = $_POST['level'];
	
	// check the username
	$queryUser = "SELECT * FROM as_users WHERE username = '$username' AND password = '$password' AND blocked = 'N'";
	$sqlUser = mysqli_query($connect, $queryUser);
	$numsUser = mysqli_num_rows($sqlUser);
	
	$dataUser = mysqli_fetch_array($sqlUser);
	
	if ($numsUser > 0)
	{
		session_start();
		
		$_SESSION['sessUserID'] = $dataUser['userID'];
		$_SESSION['sessUsername'] = $dataUser['username'];
		
		header("Location: home.php");
	}
	else
	{
		header("Location: index.php?msg=We could not find a user matching your request.");
	}
}

else 
{
	$msg = $_GET['msg'];
	
	$smarty->assign("msg", $msg);
}

$smarty->assign('year', $year);
$smarty->display("index.tpl");
?>
<?php
session_start();

$invoice = $_SESSION['invoice'];
if ($invoice == "")
{
	$_SESSION['invoice'] = date('ymdHis');
	$invoice = $_SESSION['invoice'];
}

header("Location: home");
?>
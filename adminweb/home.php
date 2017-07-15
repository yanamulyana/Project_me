<?php
include "header.php";
$page = "home.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

$smarty->assign("metaTitle", "Home");

include "footer.php";
?>
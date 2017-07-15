<?php
include "header.php";
$page = "voucher.tpl";

$queryVoucher = "SELECT * FROM as_voucher WHERE status = 'Y' AND voucherID = '1'";
$sqlVoucher = mysqli_query($connect, $queryVoucher);
$dataVoucher = mysqli_fetch_array($sqlVoucher);

$smarty->assign("voucherID", $dataVoucher['voucherID']);
$smarty->assign("pageTitle", $dataVoucher['pageTitle']);
$smarty->assign("description", $dataVoucher['description']);

$smarty->assign("metaTitle", "Voucher");

include "footer.php";
?>
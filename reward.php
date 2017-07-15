<?php
include "header.php";
$page = "reward.tpl";

$queryReward = "SELECT * FROM as_reward WHERE status = 'Y' AND rewardID = '1'";
$sqlReward = mysqli_query($connect, $queryReward);
$dataReward = mysqli_fetch_array($sqlReward);

$smarty->assign("rewardID", $dataReward['rewardID']);
$smarty->assign("pageTitle", $dataReward['pageTitle']);
$smarty->assign("description", $dataReward['description']);

$smarty->assign("metaTitle", "Reward");

include "footer.php";
?>
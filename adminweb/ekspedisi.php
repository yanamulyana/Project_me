<?php
include "header.php";
$page = "ekspedisi.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is ekspedisi and act is add
if ($module == 'ekspedisi' && $act == 'add')
{
	$smarty->assign("metaTitle", "Tambah Ekspedisi");
}

// if mod is ekspedisi and act is import
elseif ($module == 'ekspedisi' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Jasa Ekspedisi");
}

// if mod is ekspedisi and act is input
elseif ($module == 'ekspedisi' && $act == 'input')
{
	$courierName = mysqli_real_escape_string($connect, $_POST['courierName']);
	$addCost = $_POST['addCost'];
	$insurance = $_POST['insurance'];
	$filename = $_POST['filename'];
	$courierType = $_POST['courierType'];
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	// save into the database
	if ($filename != "")
	{
		$file = "../images/couriers/".$filename;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 60;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/couriers/thumb/small_".$filename);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);
	}
	
	$queryCourier = "INSERT INTO as_couriers (	courierName,
												image,
												courierType,
												addCost,
												insurance,
												status,
												createdDate,
												createdUserID,
												modifiedDate,
												modifiedUserID)
										VALUES(	'$courierName',
												'$filename',
												'$courierType',
												'$addCost',
												'$insurance',
												'$status',
												'$createdDate',
												'$sessUserID',
												'',
												'')";
	mysqli_query($connect, $queryCourier);
	
	$_SESSION['sessCourier'] = 1;
	
	header("Location: ekspedisi.php");
}

// if mod is ekspedisi and act is edit
elseif ($module == 'ekspedisi' && $act == 'edit')
{
	$courierID = $_GET['courierID'];
	
	// showing up the courier
	$queryCourier = "SELECT * FROM as_couriers WHERE courierID = '$courierID'";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	$dataCourier = mysqli_fetch_array($sqlCourier);
	
	$smarty->assign("courierID", $dataCourier['courierID']);
	$smarty->assign("courierName", $dataCourier['courierName']);
	$smarty->assign("courierType", $dataCourier['courierType']);
	$smarty->assign("addCost", $dataCourier['addCost']);
	$smarty->assign("insurance", $dataCourier['insurance']);
	$smarty->assign("status", $dataCourier['status']);
	$smarty->assign("image", $dataCourier['image']);
	
	$smarty->assign("metaTitle", "Edit Ekspedisi");
}

// if mod is ekspedisi and act is update
elseif ($module == 'ekspedisi' && $act == 'update')
{
	$courierID = $_POST['courierID'];
	$courierName = mysqli_real_escape_string($connect, $_POST['courierName']);
	$courierType = $_POST['courierType'];
	$addCost = $_POST['addCost'];
	$insurance = $_POST['insurance'];
	$status = $_POST['status'];
	$filename = $_POST['filename'];
	$oldfile = $_POST['oldfile'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	if ($filename != "")
	{
		unlink("../images/couriers/".$oldfile);
		unlink("../images/couriers/thumb/small_".$oldfile);
		
		$file = "../images/couriers/".$filename;
		$gbr_asli = imagecreatefromjpeg($file);
		$lebar = imagesx($gbr_asli);
		$tinggi = imagesy($gbr_asli);
		
		$tum_lebar = 150;
		$tum_tinggi = 60;
		
		$gbr_thumb = imagecreatetruecolor($tum_lebar, $tum_tinggi);
		imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $tum_lebar, $tum_tinggi, $lebar, $tinggi);
		
		imagejpeg($gbr_thumb, "../images/couriers/thumb/small_".$filename);
		
		imagedestroy($gbr_asli);
		imagedestroy($gbr_thumb);

		$queryCourier = "UPDATE as_couriers SET	courierName = '$courierName',
												image = '$filename',
												courierType = '$courierType',
												addCost = '$addCost',
												insurance = '$insurance',
												status = '$status',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE courierID = '$courierID'";
		mysqli_query($connect, $queryCourier);
	}
	else
	{
		$queryCourier = "UPDATE as_couriers SET	courierName = '$courierName',
												courierType = '$courierType',
												addCost = '$addCost',
												insurance = '$insurance',
												status = '$status',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE courierID = '$courierID'";
		mysqli_query($connect, $queryCourier);
	}
	
	$_SESSION['sessCourier'] = 2;
	
	header("Location: ekspedisi.php");
}

// if mod is ekspedisi and act is delete
elseif ($module == 'ekspedisi' && $act == 'delete')
{
	$courierID = $_GET['courierID'];
	$file = $_GET['file'];
	
	$queryCourier = "DELETE FROM as_couriers WHERE courierID = '$courierID'";
	mysqli_query($connect, $queryCourier);
	
	unlink("../images/couriers/".$file);
	unlink("../images/couriers/thumb/small_".$file);
	
	$_SESSION['sessCourier'] = 3;
	
	header("Location: ekspedisi.php");
}

else
{
	// showing up the courier
	$queryCourier = "SELECT * FROM as_couriers ORDER BY courierName ASC";
	$sqlCourier = mysqli_query($connect, $queryCourier);
	
	$i = 1;
	while ($dtCourier = mysqli_fetch_array($sqlCourier))
	{
		if ($dtCourier['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		if ($dtCourier['courierType'] == 'U')
		{
			$courierType = "Ekspedisi Umum";
		}
		else
		{
			$courierType = "Non Ekspedisi (Travel, Bus, dll)";
		}
		
		$dataCourier[] = array(	'courierID' => $dtCourier['courierID'],
								'courierName' => $dtCourier['courierName'],
								'courierType' => $courierType,
								'addCost' => format_rupiah($dtCourier['addCost']),
								'insurance' => $dtCourier['insurance'],
								'status' => $status,
								'image' => $dtCourier['image'],
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCourier", $dataCourier);
	
	$smarty->assign("metaTitle", "Manajemen Ekspedisi");
	
	$smarty->assign("msg", $_SESSION['sessCourier']);
	$_SESSION['sessCourier'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
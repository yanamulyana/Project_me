<?php
include "header.php";
$page = "fares.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is fare and act is add
if ($module == 'fare' && $act == 'add')
{
	if ($_SESSION['sessLevel'] != "1")
	{
		echo "Hanya administrator yang bisa mengakses halaman ini";
		exit();
	}
	
	$queryService = "SELECT * FROM as_services WHERE status = 'Y' ORDER BY serviceName ASC";
	$sqlService = mysqli_query($connect, $queryService);
	while ($dtService = mysqli_fetch_array($sqlService))
	{
		$dataService[] = array(	'serviceID' => $dtService['serviceID'],
								'serviceName' => $dtService['serviceName']);
	}
	
	$smarty->assign("dataService", $dataService);
	
	$smarty->assign("metaTitle", "Tambah Tarif Layanan");
}

// if mod is fare and act is input
elseif ($module == 'fare' && $act == 'input')
{
	if ($_SESSION['sessLevel'] != "1")
	{
		echo "Hanya administrator yang bisa mengakses halaman ini";
		exit();
	}
	
	$serviceID = $_POST['serviceID'];
	$fareName = mysqli_real_escape_string($connect, $_POST['fareName']);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryFare = "INSERT INTO as_fares (	serviceID,
											fareName,
											status,
											createdDate,
											createdUserID,
											modifiedDate,
											modifiedUserID)
									VALUES(	'$serviceID',
											'$fareName',
											'$status',
											'$createdDate',
											'$sessUserID',
											'',
											'')";
	mysqli_query($connect, $queryFare);
	
	$_SESSION['sessFare'] = 1;
	
	header("Location: fares.php");
}

// if mod is fare and act is edit
elseif ($module == 'fare' && $act == 'edit')
{
	if ($_SESSION['sessLevel'] != "1")
	{
		echo "Hanya administrator yang bisa mengakses halaman ini";
		exit();
	}
	
	$fareID = $_GET['fareID'];
	
	// showing up the fare
	$queryFare = "SELECT * FROM as_fares WHERE fareID = '$fareID'";
	$sqlFare = mysqli_query($connect, $queryFare);
	$dataFare = mysqli_fetch_array($sqlFare);
	
	$smarty->assign("fareID", $dataFare['fareID']);
	$smarty->assign("serviceID", $dataFare['serviceID']);
	$smarty->assign("fareName", $dataFare['fareName']);
	$smarty->assign("status", $dataFare['status']);
	
	$queryService = "SELECT * FROM as_services WHERE status = 'Y' ORDER BY serviceName ASC";
	$sqlService = mysqli_query($connect, $queryService);
	while ($dtService = mysqli_fetch_array($sqlService))
	{
		$dataService[] = array(	'serviceID' => $dtService['serviceID'],
								'serviceName' => $dtService['serviceName']);
	}
	
	$smarty->assign("dataService", $dataService);
	
	$smarty->assign("metaTitle", "Edit Tarif Layanan");
}

// if mod is fare and act is update
elseif ($module == 'fare' && $act == 'update')
{
	if ($_SESSION['sessLevel'] != "1")
	{
		echo "Hanya administrator yang bisa mengakses halaman ini";
		exit();
	}
	
	$fareID = $_POST['fareID'];
	$serviceID = $_POST['serviceID'];
	$fareName = mysqli_real_escape_string($connect, $_POST['fareName']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryFare = "UPDATE as_fares SET	serviceID = '$serviceID',
										fareName = '$fareName',
										status = '$status',
										modifiedDate = '$modifiedDate',
										modifiedUserID = '$sessUserID'
										WHERE fareID = '$fareID'";
	
	mysqli_query($connect, $queryFare);
	
	$_SESSION['sessFare'] = 2;
	
	header("Location: fares.php");
}

// if mod is fare and act is delete
elseif ($module == 'fare' && $act == 'delete')
{
	if ($_SESSION['sessLevel'] != "1")
	{
		echo "Hanya administrator yang bisa mengakses halaman ini";
		exit();
	}
	
	$fareID = $_GET['fareID'];
	
	$queryFare = "DELETE FROM as_fares WHERE fareID = '$fareID'";
	mysqli_query($connect, $queryFare);
	
	$_SESSION['sessFare'] = 3;
	
	header("Location: fares.php");
}

else
{
	if ($_SESSION['sessLevel'] != "1")
	{
		echo "Hanya administrator yang bisa mengakses halaman ini";
		exit();
	}
	
	$smarty->assign("msg", $_SESSION['sessFare']);
	$_SESSION['sessFare'] = "";
	
	// showing up the fare
	$p = new PagingFare;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the fare
	$queryFare = "SELECT * FROM as_fares ORDER BY serviceID, fareName ASC LIMIT $posisi,$batas";
	$sqlFare = mysqli_query($connect, $queryFare);
	$numsFare = mysqli_num_rows($sqlFare);
	
	$i = 1 + $posisi;
	while ($dtFare = mysqli_fetch_array($sqlFare))
	{
		if ($dtFare['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$queryService = "SELECT serviceName FROM as_services WHERE serviceID = '$dtFare[serviceID]'";
		$sqlService = mysqli_query($connect, $queryService);
		$dataService = mysqli_fetch_array($sqlService);
		
		$dataFare[] = array(	'fareID' => $dtFare['fareID'],
								'fareName' => $dtFare['fareName'],
								'serviceName' => $dataService['serviceName'],
								'status' => $status,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataFare", $dataFare);
	
	$queryJmlData = "SELECT * FROM as_fares";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsFare", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Tarif Layanan");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
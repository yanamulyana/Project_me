<?php
include "header.php";
$page = "provinces.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is province and act is add
if ($module == 'province' && $act == 'add')
{
	$smarty->assign("metaTitle", "Tambah Propinsi");
}

// if mod is province and act is import
elseif ($module == 'province' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Propinsi");
}

// if mod is province and act is input
elseif ($module == 'province' && $act == 'input')
{
	$provinceName = mysqli_real_escape_string($connect, $_POST['provinceName']);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryProvince = "INSERT INTO as_provinces (	provinceName,
													status,
													createdDate,
													createdUserID,
													modifiedDate,
													modifiedUserID)
											VALUES(	'$provinceName',
													'$status',
													'$createdDate',
													'$sessUserID',
													'',
													'')";
	mysqli_query($connect, $queryProvince);
	
	$_SESSION['sessProvince'] = 1;
	
	header("Location: provinces.php");
}

// if mod is province and act is edit
elseif ($module == 'province' && $act == 'edit')
{
	$provinceID = $_GET['provinceID'];
	
	// showing up the province
	$queryProvince = "SELECT * FROM as_provinces WHERE provinceID = '$provinceID'";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	$dataProvince = mysqli_fetch_array($sqlProvince);
	
	$smarty->assign("provinceID", $dataProvince['provinceID']);
	$smarty->assign("provinceName", $dataProvince['provinceName']);
	$smarty->assign("status", $dataProvince['status']);
	
	$smarty->assign("metaTitle", "Edit Propinsi");
}

// if mod is province and act is update
elseif ($module == 'province' && $act == 'update')
{
	$provinceID = $_POST['provinceID'];
	$provinceName = mysqli_real_escape_string($connect, $_POST['provinceName']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryProvince = "UPDATE as_provinces SET	provinceName = '$provinceName',
												status = '$status',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE provinceID = '$provinceID'";
	mysqli_query($connect, $queryProvince);
	
	$_SESSION['sessProvince'] = 2;
	
	header("Location: provinces.php");
}

// if mod is province and act is delete
elseif ($module == 'province' && $act == 'delete')
{
	$provinceID = $_GET['provinceID'];
	
	$queryProvince = "DELETE FROM as_provinces WHERE provinceID = '$provinceID'";
	mysqli_query($connect, $queryProvince);
	
	$_SESSION['sessProvince'] = 3;
	
	header("Location: provinces.php");
}

else
{
	// showing up the provinces
	$p = new PagingProvince;
	// limit hanya 12 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the province
	$queryProvince = "SELECT * FROM as_provinces ORDER BY provinceID ASC LIMIT $posisi,$batas";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	
	$i = 1 + $posisi;
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		if ($dtProvince['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName'],
								'status' => $status,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataProvince", $dataProvince);
	
	$queryJmlData = "SELECT * FROM as_provinces";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsProvince", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Propinsi");
	
	$smarty->assign("msg", $_SESSION['sessProvince']);
	$_SESSION['sessProvince'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
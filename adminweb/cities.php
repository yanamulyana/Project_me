<?php
include "header.php";
$page = "cities.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is city and act is add
if ($module == 'city' && $act == 'add')
{
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	
	$smarty->assign("dataProvince", $dataProvince);
	
	$smarty->assign("metaTitle", "Tambah Kota");
}

// if mod is city and act is import
elseif ($module == 'city' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Kota");
}

// if mod is city and act is input
elseif ($module == 'city' && $act == 'input')
{
	$provinceID = $_POST['provinceID'];
	$cityName = mysqli_real_escape_string($connect, $_POST['cityName']);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryCity = "INSERT INTO as_cities (	provinceID,
											cityName,
											status,
											createdDate,
											createdUserID,
											modifiedDate,
											modifiedUserID)
									VALUES(	'$provinceID',
											'$cityName',
											'$status',
											'$createdDate',
											'$sessUserID',
											'',
											'')";
	mysqli_query($connect, $queryCity);
	
	$_SESSION['sessCity'] = 1;
	
	header("Location: cities.php");
}

// if mod is city and act is edit
elseif ($module == 'city' && $act == 'edit')
{
	$cityID = $_GET['cityID'];
	
	// showing up the city
	$queryCity = "SELECT * FROM as_cities WHERE cityID = '$cityID'";
	$sqlCity = mysqli_query($connect, $queryCity);
	$dataCity = mysqli_fetch_array($sqlCity);
	
	$smarty->assign("provinceID", $dataCity['provinceID']);
	$smarty->assign("cityID", $dataCity['cityID']);
	$smarty->assign("cityName", $dataCity['cityName']);
	$smarty->assign("status", $dataCity['status']);
	
	$smarty->assign("metaTitle", "Edit Kota");
	
	$queryProvince = "SELECT * FROM as_provinces WHERE status = 'Y' ORDER BY provinceName ASC";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	while ($dtProvince = mysqli_fetch_array($sqlProvince))
	{
		$dataProvince[] = array('provinceID' => $dtProvince['provinceID'],
								'provinceName' => $dtProvince['provinceName']);
	}
	
	$smarty->assign("dataProvince", $dataProvince);
}

// if mod is city and act is update
elseif ($module == 'city' && $act == 'update')
{
	$provinceID = $_POST['provinceID'];
	$cityID = $_POST['cityID'];
	$cityName = mysqli_real_escape_string($connect, $_POST['cityName']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryCity = "UPDATE as_cities SET	provinceID = '$provinceID',
										cityName = '$cityName',
										status = '$status',
										modifiedDate = '$modifiedDate',
										modifiedUserID = '$sessUserID'
										WHERE cityID = '$cityID'";
	mysqli_query($connect, $queryCity);
	
	$_SESSION['sessCity'] = 2;
	
	header("Location: cities.php");
}

// if mod is city and act is delete
elseif ($module == 'city' && $act == 'delete')
{
	$cityID = $_GET['cityID'];
	
	$queryCity = "DELETE FROM as_cities WHERE cityID = '$cityID'";
	mysqli_query($connect, $queryCity);
	
	$_SESSION['sessCity'] = 3;
	
	header("Location: cities.php");
}

elseif ($module == 'city' && $act == 'search')
{
	$q = mysqli_real_escape_string($connect, $_GET['q']);
	
	// showing up the cities
	$queryCity = "SELECT A.cityID, A.provinceID, A.cityName, A.status, B.provinceName FROM as_cities A INNER JOIN as_provinces B ON A.provinceID = B.provinceID WHERE A.cityName LIKE '%$q%' ORDER BY A.provinceID, A.cityName ASC";
	$sqlCity = mysqli_query($connect, $queryCity);
	
	$i = 1 + $posisi;
	while ($dtCity = mysqli_fetch_array($sqlCity))
	{
		if ($dtCity['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataCity[] = array('cityID' => $dtCity['cityID'],
							'provinceID' => $dtCity['provinceID'],
							'provinceName' => $dtCity['provinceName'],
							'cityName' => $dtCity['cityName'],
							'status' => $status,
							'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCity", $dataCity);
	
	$queryJmlData = "SELECT * FROM as_cities A INNER JOIN as_provinces B ON A.provinceID=B.provinceID WHERE A.cityName LIKE '%$q%'";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsCity", $numsJmlData);
	
	$smarty->assign("q", $q);
	
	$smarty->assign("metaTitle", "Manajemen Kota");
}

else
{
	// showing up the cities
	$p = new PagingCity;
	// limit hanya 12 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the cities
	$queryCity = "SELECT A.cityID, A.provinceID, A.cityName, A.status, B.provinceName FROM as_cities A INNER JOIN as_provinces B ON A.provinceID = B.provinceID ORDER BY A.provinceID, A.cityName ASC LIMIT $posisi,$batas";
	$sqlCity = mysqli_query($connect, $queryCity);
	
	$i = 1 + $posisi;
	while ($dtCity = mysqli_fetch_array($sqlCity))
	{
		if ($dtCity['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataCity[] = array('cityID' => $dtCity['cityID'],
							'provinceID' => $dtCity['provinceID'],
							'provinceName' => $dtCity['provinceName'],
							'cityName' => $dtCity['cityName'],
							'status' => $status,
							'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCity", $dataCity);
	
	$queryJmlData = "SELECT * FROM as_cities A INNER JOIN as_provinces B ON A.provinceID=B.provinceID";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsCity", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Kota");
	
	$smarty->assign("msg", $_SESSION['sessCity']);
	$_SESSION['sessCity'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
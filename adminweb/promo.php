<?php
include "header.php";
$page = "promo.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}


// if mod is promo and act is add
if ($module == 'promo' && $act == 'add')
{
	$smarty->assign("metaTitle", "Tambah Promosi");
}

// if mod is promo and act is input
elseif ($module == 'promo' && $act == 'input')
{
	$title = mysqli_real_escape_string($connect, $_POST['title']);
	$title_seo = seo_title($title);
	$image = $_POST['filename'];
	$status = $_POST['status'];
	$url = mysqli_real_escape_string($connect, $_POST['url']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$createdDate = date('Y-m-d H:i:s');
	
	$queryPromo = "INSERT INTO as_promos (	title,
											title_seo,
											image,
											description,
											status,
											url,
											createdDate,
											createdUserID,
											modifiedDate,
											modifiedUserID)
									VALUES(	'$title',
											'$title_seo',
											'$image',
											'$description',
											'$status',
											'$url',
											'$createdDate',
											'$sessUserID',
											'',
											'')";
	mysqli_query($connect, $queryPromo);
	
	$_SESSION['sessPromo'] = 1;
	header("Location: promo.php");
}

// if mod is promo and act is edit
elseif ($module == 'promo' && $act == 'edit')
{
	$promoID = mysqli_real_escape_string($connect, $_GET['promoID']);
	
	$queryPromo = "SELECT * FROM as_promos WHERE promoID = '$promoID'";
	$sqlPromo = mysqli_query($connect, $queryPromo);
	$dataPromo = mysqli_fetch_array($sqlPromo);
	
	$smarty->assign("title", $dataPromo['title']);
	$smarty->assign("image", $dataPromo['image']);
	$smarty->assign("status", $dataPromo['status']);
	$smarty->assign("url", $dataPromo['url']);
	$smarty->assign("description", $dataPromo['description']);
	$smarty->assign("promoID", $dataPromo['promoID']);
	
	$smarty->assign("metaTitle", "Edit Promo");
}

// if mod is promo and act is update
elseif ($module == 'promo' && $act == 'update')
{
	$promoID = mysqli_real_escape_string($connect, $_POST['promoID']);
	$title = mysqli_real_escape_string($connect, $_POST['title']);
	$title_seo = seo_title($title);
	$image = $_POST['filename'];
	$status = $_POST['status'];
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$oldfile = $_POST['oldfile'];
	$url = mysqli_real_escape_string($connect, $_POST['url']);
	$modifiedDate = date('Y-m-d H:i:s');
	
	if ($image != "")
	{
		unlink("../images/promo/".$oldfile);
		$queryPromo = "UPDATE as_promos SET	title = '$title',
											title_seo = '$title_seo',
											image = '$image',
											description = '$description',
											status = '$status',
											url = '$url',
											modifiedDate = '$modifiedDate',
											modifiedUserID = '$sessUserID'
											WHERE promoID = '$promoID'";
	}
	else 
	{
		$queryPromo = "UPDATE as_promos SET	title = '$title',
											title_seo = '$title_seo',
											description = '$description',
											status = '$status',
											url = '$url',
											modifiedDate = '$modifiedDate',
											modifiedUserID = '$sessUserID'
											WHERE promoID = '$promoID'";
	}
	
	mysqli_query($connect, $queryPromo);
	
	$_SESSION['sessPromo'] = 2;
	
	header("Location: promo.php");
}

// if mod is promo and act is delete
elseif ($module == 'promo' && $act == 'delete')
{
	$promoID = $_GET['promoID'];
	$file = $_GET['file'];
	
	unlink("../images/promo/".$file);
	
	$queryPromo = "DELETE FROM as_promos WHERE promoID = '$promoID'";
	mysqli_query($connect, $queryPromo);
	
	$_SESSION['sessPromo'] = 3;
	
	header("Location: promo.php");
}

else
{
	// showing up the admin promo
	$p = new PagingAdminPromo;
	// limit hanya 20 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the promo
	$queryPromo = "SELECT * FROM as_promos ORDER BY createdDate DESC LIMIT $posisi,$batas";
	$sqlPromo = mysqli_query($connect, $queryPromo);
	
	$i = 1 + $posisi;
	while ($dtPromo = mysqli_fetch_array($sqlPromo))
	{
		if ($dtPromo['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataPromo[] = array(	'promoID' => $dtPromo['promoID'],
								'title' => $dtPromo['title'],
								'title_seo' => $dtPromo['title_seo'],
								'url' => $dtPromo['url'],
								'status' => $status,
								'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataPromo", $dataPromo);
	
	$queryJmlData = "SELECT * FROM as_promos";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsPromo", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Promo");
	
	$smarty->assign("msg", $_SESSION['sessPromo']);
	$_SESSION['sessPromo'] = "";
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
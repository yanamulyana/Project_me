<?php
include "header.php";
$page = "categories.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is categrories and act is add
if ($module == 'category' && $act == 'add')
{
	$smarty->assign("metaTitle", "Add Category");
}

// if mod is category and act is import
elseif ($module == 'category' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Kategori");
}

// if mod is category and act is input
elseif ($module == 'category' && $act == 'input')
{
	$category = mysqli_real_escape_string($connect, $_POST['category']);
	$categorySeo = seo_title($category);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryCategory = "INSERT INTO as_categories (	categoryName,
													categorySeo,
													status,
													createdDate,
													createdUserID,
													modifiedDate,
													modifiedUserID)
											VALUES(	'$category',
													'$categorySeo',
													'$status',
													'$createdDate',
													'$sessUserID',
													'',
													'')";
	mysqli_query($connect, $queryCategory);
	
	header("Location: categories.php?msg=1");
}

// if mod is category and act is edit
elseif ($module == 'category' && $act == 'edit')
{
	$categoryID = $_GET['categoryID'];
	
	// showing up the category
	$queryCategory = "SELECT * FROM as_categories WHERE categoryID = '$categoryID'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	$smarty->assign("categoryID", $dataCategory['categoryID']);
	$smarty->assign("categoryName", $dataCategory['categoryName']);
	$smarty->assign("status", $dataCategory['status']);
	
	$smarty->assign("metaTitle", "Edit Category");
}

// if mod is category and act is update
elseif ($module == 'category' && $act == 'update')
{
	$categoryID = $_POST['categoryID'];
	$category = mysqli_real_escape_string($connect, $_POST['category']);
	$categorySeo = seo_title($category);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryCategory = "UPDATE as_categories SET	categoryName = '$category',
												categorySeo = '$categorySeo',
												status = '$status',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE categoryID = '$categoryID'";
	mysqli_query($connect, $queryCategory);
	
	header("Location: categories.php?msg=2");
}

// if mod is category and act is delete
elseif ($module == 'category' && $act == 'delete')
{
	$categoryID = $_GET['categoryID'];
	
	$queryCategory = "DELETE FROM as_categories WHERE categoryID = '$categoryID'";
	mysqli_query($connect, $queryCategory);
	
	header("Location: categories.php?msg=3");
}

else
{
	// showing up the categories
	$p = new PagingCategory;
	// limit hanya 12 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the categories
	$queryCategory = "SELECT * FROM as_categories ORDER BY categoryName ASC LIMIT $posisi,$batas";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	
	$i = 1;
	while ($dtCategory = mysqli_fetch_array($sqlCategory))
	{
		if ($dtCategory['status'] == 'Y')
		{
			$status = "Akfif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataCategory[] = array(	'categoryID' => $dtCategory['categoryID'],
									'categoryName' => $dtCategory['categoryName'],
									'status' => $status,
									'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCategory", $dataCategory);
	
	$queryJmlData = "SELECT * FROM as_categories";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsCategory", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Kategori");
	
	$smarty->assign("msg", $_GET['msg']);
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
<?php
include "header.php";
$page = "subcategories.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}


// if mod is subcategories and act is add
if ($module == 'subcategory' && $act == 'add')
{
	$queryCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	while ($dtCategory = mysqli_fetch_array($sqlCategory))
	{
		$dataCategory[] = array('categoryID' => $dtCategory['categoryID'],
								'categoryName' => $dtCategory['categoryName']);
	}
	$smarty->assign("dataCategory", $dataCategory);
	
	$smarty->assign("metaTitle", "Tambah Sub Kategori");
}

// if mod is subcategory and act is import
elseif ($module == 'subcategory' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Sub Kategori");
}

// if mod is subcategory and act is input
elseif ($module == 'subcategory' && $act == 'input')
{
	$categoryID = $_POST['categoryID'];
	$category = mysqli_real_escape_string($connect, $_POST['category']);
	$categorySeo = seo_title($category);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$queryCategory = "INSERT INTO as_sub_categories (	categoryID,
														subCategoryName,
														subCategorySeo,
														status,
														createdDate,
														createdUserID,
														modifiedDate,
														modifiedUserID)
												VALUES(	'$categoryID',
														'$category',
														'$categorySeo',
														'$status',
														'$createdDate',
														'$sessUserID',
														'',
														'')";
	mysqli_query($connect, $queryCategory);
	
	header("Location: subcategories.php?msg=1");
}

// if mod is category and act is edit
elseif ($module == 'subcategory' && $act == 'edit')
{
	$queryCategory = "SELECT * FROM as_categories WHERE status = 'Y' ORDER BY categoryName ASC";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	while ($dtCategory = mysqli_fetch_array($sqlCategory))
	{
		$dataCategory[] = array('categoryID' => $dtCategory['categoryID'],
								'categoryName' => $dtCategory['categoryName']);
	}
	$smarty->assign("dataCategory", $dataCategory);
	
	$subCategoryID = $_GET['subCategoryID'];
	
	// showing up the category
	$queryCategory = "SELECT * FROM as_sub_categories WHERE subCategoryID = '$subCategoryID'";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	$dataCategory = mysqli_fetch_array($sqlCategory);
	
	$smarty->assign("subCategoryID", $dataCategory['subCategoryID']);
	$smarty->assign("categoryID", $dataCategory['categoryID']);
	$smarty->assign("subCategoryName", $dataCategory['subCategoryName']);
	$smarty->assign("status", $dataCategory['status']);
	
	$smarty->assign("metaTitle", "Edit Sub Kategori");
}

// if mod is sub category and act is update
elseif ($module == 'subcategory' && $act == 'update')
{
	$subCategoryID = $_POST['subCategoryID'];
	$categoryID = $_POST['categoryID'];
	$category = mysqli_real_escape_string($connect, $_POST['category']);
	$categorySeo = seo_title($category);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$queryCategory = "UPDATE as_sub_categories SET	categoryID = '$categoryID',
													subCategoryName = '$category',
													subCategorySeo = '$categorySeo',
													status = '$status',
													modifiedDate = '$modifiedDate',
													modifiedUserID = '$sessUserID'
													WHERE subCategoryID = '$subCategoryID'";
	mysqli_query($connect, $queryCategory);
	
	header("Location: subcategories.php?msg=2");
}

// if mod is subcategory and act is delete
elseif ($module == 'subcategory' && $act == 'delete')
{
	$subCategoryID = $_GET['subCategoryID'];
	
	$queryCategory = "DELETE FROM as_sub_categories WHERE subCategoryID = '$subCategoryID'";
	mysqli_query($connect, $queryCategory);
	
	header("Location: subcategories.php?msg=3");
}

else
{
	// showing up the sub categories
	$p = new PagingSubCategory;
	// limit hanya 12 per halaman
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	// showing up the categories
	$queryCategory = "SELECT A.status, A.subCategoryName, A.subCategoryID, B.categoryName, B.categoryID FROM as_sub_categories A INNER JOIN as_categories B ON A.categoryID=B.categoryID ORDER BY B.categoryName ASC LIMIT $posisi,$batas";
	$sqlCategory = mysqli_query($connect, $queryCategory);
	
	$i = 1;
	while ($dtCategory = mysqli_fetch_array($sqlCategory))
	{
		if ($dtCategory['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataCategory[] = array(	'subCategoryID' => $dtCategory['subCategoryID'],
									'subCategoryName' => $dtCategory['subCategoryName'],
									'status' => $status,
									'categoryName' => $dtCategory['categoryName'],
									'categoryID' => $dtCategory['categoryID'],
									'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataCategory", $dataCategory);
	
	$queryJmlData = "SELECT A.subCategoryID FROM as_sub_categories A INNER JOIN as_categories B ON A.categoryID=B.categoryID";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsSubCategory", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Sub Kategori");
	
	$smarty->assign("msg", $_GET['msg']);
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
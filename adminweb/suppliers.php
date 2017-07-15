<?php
include "header.php";
$page = "suppliers.tpl";

$module = $_GET['mod'];
$act = $_GET['act'];

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

// if mod is supplier and act is add
if ($module == 'supplier' && $act == 'add')
{
	$smarty->assign("metaTitle", "Tambah Supplier");
}

// if mod is supplier and act is import
elseif ($module == 'supplier' && $act == 'import')
{
	$smarty->assign("msg", $_SESSION['sessImport']);
	$_SESSION['sessImport'] = "";
	
	$smarty->assign("metaTitle", "Import Supplier");
}

// if mod is supplier and act is input
elseif ($module == 'supplier' && $act == 'input')
{
	$supplierName = mysqli_real_escape_string($connect, $_POST['supplierName']);
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$phone = mysqli_real_escape_string($connect, $_POST['phone']);
	$fax = mysqli_real_escape_string($connect, $_POST['fax']);
	$contactPerson = mysqli_real_escape_string($connect, $_POST['contactPerson']);
	$cpphone = mysqli_real_escape_string($connect, $_POST['cpphone']);
	$status = $_POST['status'];
	$createdDate = date('Y-m-d H:i:s');
	
	$querySupplier = "INSERT INTO as_suppliers (supplierName,
												address,
												phone,
												fax,
												contactPerson,
												cpphone,
												status,
												createdDate,
												createdUserID,
												modifiedDate,
												modifiedUserID)
										VALUES(	'$supplierName',
												'$address',
												'$phone',
												'$fax',
												'$contactPerson',
												'$cpphone',
												'$status',
												'$createdDate',
												'$sessUserID',
												'',
												'')";
	mysqli_query($connect, $querySupplier);
	
	$_SESSION['sessSupplier'] = 1;
	
	header("Location: suppliers.php");
}

// if mod is supplier and act is delete
elseif ($module == 'supplier' && $act == 'delete')
{
	$supplierID = $_GET['supplierID'];
	
	$querySupplier = "DELETE FROM as_suppliers WHERE supplierID = '$supplierID'";
	mysqli_query($connect, $querySupplier);
	
	$_SESSION['sessSupplier'] = 3;
		
	header("Location: suppliers.php");
}

// if mod is supplier and act is view 
elseif ($module == 'supplier' && $act == 'view')
{
	$supplierID = $_GET['supplierID'];
	
	$querySupplier = "SELECT * FROM as_suppliers WHERE supplierID = '$supplierID'";
	$sqlSupplier = mysqli_query($connect, $querySupplier);
	$dataSupplier = mysqli_fetch_array($sqlSupplier);
	
	$smarty->assign("supplierID", $dataSupplier['supplierID']);
	$smarty->assign("supplierName", $dataSupplier['supplierName']);
	$smarty->assign("address", $dataSupplier['address']);
	$smarty->assign("phone", $dataSupplier['phone']);
	$smarty->assign("fax", $dataSupplier['fax']);
	$smarty->assign("contactPerson", $dataSupplier['contactPerson']);
	$smarty->assign("cpphone", $dataSupplier['cpphone']);
	$smarty->assign("status", $dataSupplier['status']);
	
	$smarty->assign("metaTitle", "View Supplier");
}

// if mod is supplier and act is edit
elseif ($module == 'supplier' && $act == 'edit')
{
	$supplierID = $_GET['supplierID'];
	
	$querySupplier = "SELECT * FROM as_suppliers WHERE supplierID = '$supplierID'";
	$sqlSupplier = mysqli_query($connect, $querySupplier);
	$dataSupplier = mysqli_fetch_array($sqlSupplier);
	
	$smarty->assign("supplierID", $dataSupplier['supplierID']);
	$smarty->assign("supplierName", $dataSupplier['supplierName']);
	$smarty->assign("address", $dataSupplier['address']);
	$smarty->assign("phone", $dataSupplier['phone']);
	$smarty->assign("fax", $dataSupplier['fax']);
	$smarty->assign("contactPerson", $dataSupplier['contactPerson']);
	$smarty->assign("cpphone", $dataSupplier['cpphone']);
	$smarty->assign("status", $dataSupplier['status']);
	
	$smarty->assign("metaTitle", "Edit Supplier");
}

// if mod is supplier and act is update
elseif ($module == 'supplier' && $act == 'update')
{
	$supplierID = $_POST['supplierID'];
	$supplierName = mysqli_real_escape_string($connect, $_POST['supplierName']);
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$phone = mysqli_real_escape_string($connect, $_POST['phone']);
	$fax = mysqli_real_escape_string($connect, $_POST['fax']);
	$contactPerson = mysqli_real_escape_string($connect, $_POST['contactPerson']);
	$cpphone = mysqli_real_escape_string($connect, $_POST['cpphone']);
	$status = $_POST['status'];
	$modifiedDate = date('Y-m-d H:i:s');
	
	$querySupplier = "UPDATE as_suppliers SET	supplierName = '$supplierName',
												address = '$address',
												phone = '$phone',
												fax = '$fax',
												contactPerson = '$contactPerson',
												cpphone = '$cpphone',
												status = '$status',
												modifiedDate = '$modifiedDate',
												modifiedUserID = '$sessUserID'
												WHERE supplierID = '$supplierID'";
	mysqli_query($connect, $querySupplier);
	
	$_SESSION['sessSupplier'] = 2;
	
	header("Location: suppliers.php");
}

else
{
	$smarty->assign("msg", $_SESSION['sessSupplier']);
	$_SESSION['sessSupplier'] = "";
	
	// showing up the admin supplier
	$p = new PagingSupplier;
	// limit is only 20 per page 
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$querySupplier = "SELECT * FROM as_suppliers ORDER BY supplierName DESC LIMIT $posisi,$batas";
	$sqlSupplier = mysqli_query($connect, $querySupplier);
	$i = 1 + $posisi;
	while ($dtSupplier = mysqli_fetch_array($sqlSupplier))
	{
		if ($dtSupplier['status'] == 'Y')
		{
			$status = "Aktif";
		}
		else
		{
			$status = "Tidak Aktif";
		}
		
		$dataSupplier[] = array(	'supplierID' => $dtSupplier['supplierID'],
									'supplierName' => $dtSupplier['supplierName'],
									'address' => $dtSupplier['address'],
									'phone' => $dtSupplier['phone'],
									'contactPerson' => $dtSupplier['contactPerson'],
									'cpphone' => $dtSupplier['cpphone'],
									'status' => $status,
									'no' => $i);
		$i++;
	}
	
	$smarty->assign("dataSupplier", $dataSupplier);
	
	$queryJmlData = "SELECT * FROM as_suppliers";
	$sqlJmlData = mysqli_query($connect, $queryJmlData);
	$numsJmlData = mysqli_num_rows($sqlJmlData);
	
	$smarty->assign("numsSupplier", $numsJmlData);
	
	$jmlhalaman = $p->jumlahHalaman($numsJmlData, $batas);
	$linkhalaman = $p->navHalaman($_GET['page'], $jmlhalaman);
	$smarty->assign("pageLink", $linkhalaman);
	
	$smarty->assign("metaTitle", "Manajemen Supplier");
}

$smarty->assign("module", $module);
$smarty->assign("act", $act);

include "footer.php";
?>
<?php
include "header.php";

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module != 'sales' && $act != 'printsent')
{
	exit();
}

ob_start();
require ("../config/html2pdf/html2pdf.class.php");

$now = date('Y-m-d');
$invoiceID = mysqli_real_escape_string($connect, $_GET['invoiceID']);
$orderID = mysqli_real_escape_string($connect, $_GET['orderID']);

$filename= $orderID."-".$invoiceID.".pdf";
$content = ob_get_clean();

$queryProfile = "SELECT address, phone, email, fax, senderName FROM as_profiles WHERE status = 'Y' AND profileID = '1'";
$sqlProfile = mysqli_query($connect, $queryProfile);
$dataProfile = mysqli_fetch_array($sqlProfile);

// update
$queryUpdateLabel = "UPDATE as_orders SET printed = 'Y' WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
mysqli_query($connect, $queryUpdateLabel);

// showing up the sales data
$queryOrder = "SELECT customerID, pointID, note, weightTotal, courierName, serviceName, locationName, insurance, coupon FROM as_orders WHERE orderID = '$orderID' AND invoiceID = '$invoiceID'";
$sqlOrder = mysqli_query($connect, $queryOrder);
$dataOrder = mysqli_fetch_array($sqlOrder);

// showing the customer
$queryCustomer = "SELECT * FROM as_customers WHERE customerID = '$dataOrder[customerID]'";
$sqlCustomer = mysqli_query($connect, $queryCustomer);
$dataCustomer = mysqli_fetch_array($sqlCustomer);

// showing member
$queryMember = "SELECT * FROM as_members WHERE memberID = '$dataCustomer[memberID]'";
$sqlMember = mysqli_query($connect, $queryMember);
$dataMember = mysqli_fetch_array($sqlMember);

// showing city
$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
$sqlCity = mysqli_query($connect, $queryCity);
$dataCity = mysqli_fetch_array($sqlCity);

// showing province
$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
$sqlProvince = mysqli_query($connect, $queryProvince);
$dataProvince = mysqli_fetch_array($sqlProvince);

// point
$queryPoint = "SELECT pointName FROM as_points WHERE pointID = '$dataOrder[pointID]'";
$sqlPoint = mysqli_query($connect, $queryPoint);
$dataPoint = mysqli_fetch_array($sqlPoint);

if ($dataCustomer['phone'] != "")
{
	$phone = $dataCustomer['phone'];
}
else
{
	$phone = "-";
}

if ($dataCustomer['cellPhone'] != "")
{
	$cellPhone = $dataCustomer['cellPhone'];
}
else
{
	$cellPhone = "-";
}

if ($dataOrder['insurance'] > 0)
{
	$insurance = "Ya";
}
else
{
	$insurance = "Tidak";
}

$querySum = "SELECT SUM(qty) as qty FROM as_order_details WHERE invoiceID = '$invoiceID' AND orderID = '$orderID'";
$sqlSum = mysqli_query($connect, $querySum);
$dataSum = mysqli_fetch_array($sqlSum);

$dus = ceil($dataSum['qty'] / 12);

$address = chunk_split($dataCustomer['address'], 50, "<br>");
$pointName = chunk_split($dataPoint['pointName'], 50, "<br>");
$profileAddress = chunk_split($dataProfile['address'], 50, "<br>");
$courierName = chunk_split($dataOrder['courierName'], 50, "<br>");
$serviceName = chunk_split($dataOrder['serviceName'], 50, "<br>");
$locationName = chunk_split($dataOrder['locationName'], 50, "<br>");
$note = chunk_split($dataOrder['note'], 50, "<br>");
$memberName = chunk_split($dataMember['firstName']." ".$dataMember['lastName'], 50, "<br>");
$memberAddress = chunk_split($dataMember['address'], 50, "<br>");

$content = "<p style='text-align: center; width: 105mm; font-size: 10pt; color: red;'><b>INI SISI ATAS, JANGAN DIBALIK!</b></p>
			<table cellpadding='0' cellspacing='0' style='width: 90mm;'>
				<tr>
					<td style='padding: 2px; font-size: 8pt; width: 23mm; border-left: 1px solid; border-top: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Nama Penerima</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; width: 67mm; border-top: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>$dataCustomer[receivedName]</td>
				</tr>
				<tr valign='top'>
					<td rowspan='2' style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Alamat Kirim</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid;'>$address</td>
				</tr>
				<tr>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$dataCustomer[cityName] $dataCustomer[provinceName] $dataCustomer[zipCode]</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Telp / HP</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$phone / $cellPhone</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Catatan</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$note</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; width: 23mm; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Berat</td>
					<td style='padding: 2px; font-size: 8pt; width: 10mm; border-right: 1px solid; border-bottom: 1px solid;'><b>$dataOrder[weightTotal]</b> Kg</td>
					<td style='padding: 2px; font-size: 8pt; width: 10mm; border-right: 1px solid; border-bottom: 1px solid;'><b>$dus</b> Dus</td>
					<td style='padding: 2px; font-size: 8pt; width: 47mm; border-right: 1px solid; border-bottom: 1px solid;'><b>Isi</b> : Suplemen</td>
				</tr>";
			if ($dataCustomer['chooseShipping'] == '2')
			{ 
	$content .= "<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Nama Pengirim</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$memberName</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Alamat</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$memberAddress</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Telp</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$dataMember[cellPhone]</td>
				</tr>";
			}
			else
			{
	$content .= "<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Nama Pengirim</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$dataProfile[senderName]</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Alamat</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$profileAddress</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Telp</td>
					<td colspan='3' style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$dataProfile[phone]</td>
				</tr>";			
			}
	$content .= "</table>
			<p style='text-align: center; width: 105mm; font-size: 10pt; color: red;'><b>JANGAN DIBANTING!! Pecah Belah</b></p>
			<table cellpadding='0' cellspacing='0' style='width: 90mm;'>
				<tr>
					<td style='padding: 2px; font-size: 8pt; width: 23mm; border-left: 1px solid; border-top: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Kurir</td>
					<td style='padding: 2px; font-size: 8pt; width: 67mm; border-top: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>$courierName</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Jasa Pengantaran</td>
					<td style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$serviceName</td>
				</tr>
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Lokasi Agen</td>
					<td style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$locationName</td>
				</tr>";
				if ($dataOrder['insurance'] > 0)
				{
	$content .= "
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid; color: red;'>Asuransi</td>
					<td style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid; color: red;'>$insurance</td>
				</tr>";
				}
				else
				{
	$content .= "
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Asuransi</td>
					<td style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>$insurance</td>
				</tr>";
				}
				if ($dataOrder['pointID'] != '')
				{
					$coupon = format_rupiah($dataOrder['coupon']);
	$content .= "
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Reward</td>
					<td style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid; color: red;'>$pointName</td>
				</tr>";
				}
				else
				{
	$content .= "
				<tr valign='top'>
					<td style='padding: 2px; font-size: 8pt; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;'>Reward</td>
					<td style='padding: 2px; font-size: 8pt; border-right: 1px solid; border-bottom: 1px solid;'>-</td>
				</tr>";
				}
	$content .= "
			</table>
			<table cellpadding='0' cellspacing='0' style='width: 85mm;'>
				<tr>
					<th style='width: 3mm; padding: 5px; font-size: 8pt;'>No</th>
					<th style='text-align: center; width: 5mm; padding: 5px; font-size: 8pt;'>Qty</th>
					<th style='width: 77mm; padding: 5px; font-size: 8pt;'>Nama Produk</th>
				</tr>";
				
				$queryList = "SELECT * FROM as_order_details WHERE invoiceID = '$invoiceID' AND orderID = '$orderID'";
				$sqlList = mysqli_query($connect, $queryList);
				$i = 1;
				while ($dtList = mysqli_fetch_array($sqlList))
				{
					$productName = chunk_split($dtList['productName'], 50, "<br>");
						
					$content .= "
					<tr valign='top'>
						<td style='padding: 2px 5px 2px 5px; font-size: 8pt;'>$i</td>
						<td style='text-align: center; padding: 2px 5px 2px 5px; font-size: 8pt;'>$dtList[qty]</td>
						<td style='padding: 2px 5px 2px 5px; font-size: 8pt;'>$productName</td>
					</tr>
					";
					$i++;
				}
				$content .= "
			</table>
			";
			
ob_end_clean();
// conversion HTML => PDF
try
{
	$html2pdf = new HTML2PDF('P', array('105', '148'),'fr', false, 'ISO-8859-15',array(2, 2, 2, 2)); //setting ukuran kertas dan margin pada dokumen anda
	// $html2pdf->setModeDebug();
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
<iframe src="<?php echo $filename; ?>" onload="window.print()"></iframe>
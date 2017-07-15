<?php
include "header.php";

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module != 'sales' && $act != 'invoice')
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

$queryProfile = "SELECT address, phone, email, fax FROM as_profiles WHERE status = 'Y' AND profileID = '1'";
$sqlProfile = mysqli_query($connect, $queryProfile);
$dataProfile = mysqli_fetch_array($sqlProfile);

// showing up the order data
$queryOrder = "SELECT * FROM as_orders WHERE invoiceID = '$invoiceID' AND orderID = '$orderID'";
$sqlOrder = mysqli_query($connect, $queryOrder);
$dataOrder = mysqli_fetch_array($sqlOrder);

$queryMember = "SELECT A.firstName, A.lastName, A.address, A.zipCode, A.cityID, A.provinceID FROM as_members A INNER JOIN as_customers B ON A.memberID=B.memberID WHERE B.customerID = '$dataOrder[customerID]'";
$sqlMember = mysqli_query($connect, $queryMember);
$numsMember = mysqli_num_rows($sqlMember);
$dataMember = mysqli_fetch_array($sqlMember);

if ($numsMember == '0')
{
	$queryCustomer = "SELECT * FROM as_customers WHERE customerID = '$dataOrder[customerID]'";
	$sqlCustomer = mysqli_query($connect, $queryCustomer);
	$dataCustomer = mysqli_fetch_array($sqlCustomer);
	
	$fullName = $dataCustomer['receivedName'];
	$addressCustomer = $dataCustomer['address'];
	$cityName = $dataCustomer['cityName'];
	$provinceName = $dataCustomer['provinceName'];
	$zipCode = $dataCustomer['zipCode'];
}

else
{
	$fullName = $dataMember['firstName']." ".$dataMember['lastName'];
	$addressCustomer = $dataMember['address'];
	
	$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dataMember[cityID]'";
	$sqlCity = mysqli_query($connect, $queryCity);
	$dataCity = mysqli_fetch_array($sqlCity);
	
	$queryProvince = "SELECT provinceName FROM as_provinces WHERE provinceID = '$dataMember[provinceID]'";
	$sqlProvince = mysqli_query($connect, $queryProvince);
	$dataProvince = mysqli_fetch_array($sqlProvince);
	
	$cityName = $dataCity['cityName'];
	$provinceName = $dataProvince['provinceName'];
	$zipCode = $dataMember['zipCode'];
}

$invoiceDate = tgl_indo2($dataOrder['invoiceDate']);

$content = "<table style='border-bottom: 1px solid #999999; padding-bottom: 10px; width: 200mm;'>
				<tr valign='top'>
					<td style='width: 200mm;' valign='middle'>
						<div style='font-weight: bold; padding-bottom: 5px; font-size: 12pt;'>
							Anaku.com
						</div>
						<span style='font-size: 8pt;'>$dataProfile[address], Telp. $dataProfile[phone], Fax. $dataProfile[fax], Email: $dataProfile[email]</span>
					</td>
				</tr>
			</table>
			<p style='text-align: center; width: 200mm; font-size: 10pt;'><b><u>INVOICE PENJUALAN</u></b></p>
			<table>
				<tr>
					<td style='font-size: 8pt; width: 13mm;'>Invoice</td>
					<td style='font-size: 8pt; width: 2mm;'>:</td>
					<td style='font-size: 8pt; width: 50mm;'>$dataOrder[invoiceID]</td>
					<td style='font-size: 8pt; width: 17mm;'>Kepada Yth.</td>
					<td style='font-size: 8pt; width: 127mm;'>$fullName</td>
				</tr>
				<tr>
					<td style='font-size: 8pt;'>Tanggal</td>
					<td style='font-size: 8pt;'>:</td>
					<td style='font-size: 8pt;'>$invoiceDate</td>
					<td style='font-size: 8pt;'></td>
					<td style='font-size: 8pt;'>$addressCustomer</td>
				</tr>
				<tr>
					<td style='font-size: 8pt;'></td>
					<td style='font-size: 8pt;'></td>
					<td style='font-size: 8pt;'></td>
					<td style='font-size: 8pt;'></td>
					<td style='font-size: 8pt;'>$cityName $provinceName $zipCode</td>
				</tr>
			</table>
			<br>
			<table cellpadding='0' cellspacing='0' style='width: 200px;'>
				<tr>
					<th style='width: 5mm; padding: 5px; font-size: 8pt;'>No</th>
					<th style='width: 90mm; padding: 5px; font-size: 8pt;'>Nama Produk</th>
					<th style='text-align: center; width: 15mm; padding: 5px; font-size: 8pt;'>Vol (ML)</th>
					<th style='text-align: center; width: 15mm; padding: 5px; font-size: 8pt;'>Kadar (%)</th>
					<th style='text-align: right; width: 15mm; padding: 5px; font-size: 8pt;'>Harga</th>
					<th style='text-align: center; width: 10mm; padding: 5px; font-size: 8pt;'>Qty</th>
					<th style='text-align: right; width: 15mm; padding: 5px; font-size: 8pt;'>Subtotal</th>
				</tr>";
				
				// order list
				$queryList = "SELECT * FROM as_order_details WHERE invoiceID = '$invoiceID' AND orderID = '$orderID'";
				$sqlList = mysqli_query($connect, $queryList);
				$i = 1;
				while ($dtList = mysqli_fetch_array($sqlList))
				{
					$price = format_rupiah($dtList['unitPrice']);
					$subtotal = format_rupiah($dtList['subtotal']);
					
					$content .= "
					<tr valign='top'>
						<td style='padding: 2px 5px 2px 5px; font-size: 8pt;'>$i</td>
						<td style='padding: 2px 5px 2px 5px; font-size: 8pt;'>$dtList[productName]</td>
						<td style='text-align: center; padding: 2px 5px 2px 5px; font-size: 8pt;'>$dtList[ukuran]</td>
						<td style='text-align: right; padding: 2px 5px 2px 5px; font-size: 8pt;'>$price</td>
						<td style='text-align: center; padding: 2px 5px 2px 5px; font-size: 8pt;'>$dtList[qty]</td>
						<td style='text-align: right; padding: 2px 5px 2px 5px; font-size: 8pt;'>$subtotal</td>
					</tr>
					";
					$subt = $subt + $dtList['subtotal'];
					$i++;
				}
				$subtRp = format_rupiah($subt);
				$shippingTotal = format_rupiah($dataOrder['shippingTotal']);
				$grandtotal = format_rupiah($dataOrder['grandtotal']);
				$content .= "
				<tr>
					<td colspan='6' align='right' style='border-top: 1px solid; font-size: 8pt; padding: 2px 5px 2px 5px;'><b>SUBTOTAL (Rp)</b></td>
					<td align='right' style='border-top: 1px solid; font-size: 8pt; padding: 2px 5px 2px 5px;'><b>$subtRp</b></td>
				</tr>
				<tr>
					<td colspan='6' align='right' style='font-size: 8pt; padding: 2px 5px 2px 5px;'><b>Total Poin</b></td>
					<td align='right' style='font-size: 8pt; padding: 2px 5px 2px 5px;'><b>$dataOrder[pointTotal]</b></td>
				</tr>
				<tr>
					<td colspan='6' align='right' style='font-size: 8pt; padding: 2px 5px 2px 5px;'><b>Total Berat (Kg)</b></td>
					<td align='right' style='font-size: 8pt; padding: 2px 5px 2px 5px;'><b>$dataOrder[weightTotal]</b></td>
				</tr>
				<tr>
					<td colspan='6' align='right' style='font-size: 8pt; padding: 2px 5px 2px 5px;'><b>Total Biaya Kirim (Rp)</b></td>
					<td align='right' style='font-size: 8pt; padding: 2px 5px 2px 5px;'><b>$shippingTotal</b></td>
				</tr>
				<tr>
					<td colspan='6' align='right' style='font-size: 8pt; padding: 2px 5px 2px 5px;'><b>Grandtotal (Rp)</b></td>
					<td align='right' style='font-size: 8pt; padding: 2px 5px 2px 5px;'><b>$grandtotal</b></td>
				</tr>
			</table>
			";
			
ob_end_clean();
// conversion HTML => PDF
try
{
	$html2pdf = new HTML2PDF('P', 'A4','fr', false, 'ISO-8859-15',array(3, 3, 3, 3)); //setting ukuran kertas dan margin pada dokumen anda
	// $html2pdf->setModeDebug();
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
<iframe src="<?php echo $filename; ?>" onload="window.print()"></iframe>
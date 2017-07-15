<?php
include "header.php";

if ($_SESSION['sessUserID'] == "" && $_SESSION['sessUsername'] == "")
{
	echo "You do not have authorization to enter into this page.";
	exit();
}

$module = $_GET['mod'];
$act = $_GET['act'];

if ($module != 'report' && $act != 'pdf')
{
	exit();
}

ob_start();
require ("../config/html2pdf/html2pdf.class.php");

$now = date('Y-m-d');
$nowDate = tgl_indo2($now);
$supplierID = mysqli_real_escape_string($connect, $_GET['supplierID']);

$querySupplier = "SELECT supplierName FROM as_suppliers WHERE supplierID = '$supplierID'";
$sqlSupplier = mysqli_query($connect, $querySupplier);
$dataSupplier = mysqli_fetch_array($sqlSupplier);

$filename="laporan-empty-stock-".$supplierID.".pdf";
$content = ob_get_clean();

$queryProfile = "SELECT address, phone, email, fax FROM as_profiles WHERE status = 'Y' AND profileID = '1'";
$sqlProfile = mysqli_query($connect, $queryProfile);
$dataProfile = mysqli_fetch_array($sqlProfile);

$content = "<table style='border-bottom: 1px solid #999999; padding-bottom: 10px; width: 283mm;'>
				<tr valign='top'>
					<td style='width: 283mm;' valign='middle'>
						<div style='font-weight: bold; padding-bottom: 5px; font-size: 13pt;'>
							Anaku.com
						</div>
						<span style='font-size: 10pt;'>$dataProfile[address], Telp. $dataProfile[phone], Fax. $dataProfile[fax], Email: $dataProfile[email]</span>
					</td>
				</tr>
			</table>
			<p style='text-align: center; width: 206mm; font-size: 9pt;'><b><u>Laporan Empty Stock</u></b> <br><span style='font-size: 9pt;'>$dataSupplier[supplierName] / $nowDate</span></p>
			<br>
			<table cellpadding='0' cellspacing='0' style='width: 206mm;'>
				<tr>
					<th style='width: 10mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>No.</th>
					<th style='width: 30mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Kode Produk</th>
					<th style='width: 100mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Nama Produk</th>
					<th style='width: 20mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>Vol (ML)</th>
					<th style='width: 30mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>Request Qty <br>(From Member)</th>
					<th style='width: 20mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>Stok Ready</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>Requirement Stok</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>Request Stok</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Harga Beli</th>";
	$content .= "</tr>";
				
				if ($supplierID == 'A')
				{
					$queryReport = "SELECT * FROM as_products WHERE qty < requirementQty ORDER BY qty ASC";
				}
				else
				{
					$queryReport = "SELECT * FROM as_products WHERE supplierID = '$supplierID' AND qty < requirementQty ORDER BY qty ASC";
				}
				
				$sqlReport = mysqli_query($connect, $queryReport);
				$i = 1;
				while ($dtReport = mysqli_fetch_array($sqlReport))
				{
					$request = $dtReport['requirementQty'] - $dtReport['qty'];
					
					$price = format_rupiah($dtReport['buyPrice']);
					$productName = chunk_split($dtReport['productName'], 60, "<br>");
					
					$queryRequestOrder = "SELECT SUM(qty) as qty FROM as_request_order WHERE productID = '$dtReport[productID]'";
					$sqlRequestOrder = mysqli_query($connect, $queryRequestOrder);
					$dataRequestOrder = mysqli_fetch_array($sqlRequestOrder);
		
					$content .= "
						<tr valign='top'>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$i</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$dtReport[productCode]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$productName</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$dtReport[ukuran]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$dataRequestOrder[qty]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$dtReport[qty]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$dtReport[requirementQty]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$request</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$price</td>";
					$content .=	"</tr>";
					$i++;
				}

	$content .= 
				"
			</table>
			
			"; 
			 
ob_end_clean();
// conversion HTML => PDF
try
{
	$html2pdf = new HTML2PDF('L', 'A4','fr', false, 'ISO-8859-15',array(5, 5, 5, 5)); //setting ukuran kertas dan margin pada dokumen anda
	// $html2pdf->setModeDebug();
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
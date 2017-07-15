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
$startDate = mysqli_real_escape_string($connect, $_GET['startDate']);
$endDate = mysqli_real_escape_string($connect, $_GET['endDate']);
$start = tgl_indo2($startDate);
$end = tgl_indo2($endDate);

$filename="laporan-pembeli-terbanyak-".$startDate."-".$endDate.".pdf";
$content = ob_get_clean();

$queryProfile = "SELECT address, phone, email, fax FROM as_profiles WHERE status = 'Y' AND profileID = '1'";
$sqlProfile = mysqli_query($connect, $queryProfile);
$dataProfile = mysqli_fetch_array($sqlProfile);

$content = "<table style='border-bottom: 1px solid #999999; padding-bottom: 10px; width: 197mm;'>
				<tr valign='top'>
					<td style='width: 197mm;' valign='middle'>
						<div style='font-weight: bold; padding-bottom: 5px; font-size: 12pt;'>
							Anaku.com
						</div>
						<span style='font-size: 8pt;'>$dataProfile[address], Telp. $dataProfile[phone], Fax. $dataProfile[fax], Email: $dataProfile[email]</span>
					</td>
				</tr>
			</table>
			<p style='text-align: center; width: 197mm; font-size: 9pt;'><b><u>Laporan Pembelian</u></b> <br><span style='font-size: 9pt;'>$start s/d $end</span></p>
			<br>
			<table cellpadding='0' cellspacing='0' style='width: 206mm;'>
				<tr>
					<th style='width: 10mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>No.</th>
					<th style='width: 60mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Nama Member</th>
					<th style='width: 50mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Kota</th>
					<th style='width: 15mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>Total Qty</th>
					<th style='width: 20mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right''>Subtotal</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Biaya Kirim</th>
					<th style='width: 20mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Total</th>";
			$content .= "</tr>";
				
				if ($startDate != "" && $endDate != "")
				{
					$queryReport = "SELECT SUM(B.qty) as total, SUM(A.subtotal) as subtotal, SUM(A.shippingTotal) as shippingTotal, SUM(A.grandtotal) as grandtotal, D.firstName, D.lastName, D.cityID FROM as_orders A INNER JOIN as_order_details B ON A.orderID = B.orderID 
									INNER JOIN as_customers C ON A.customerID = C.customerID
									INNER JOIN as_members D ON C.memberID = D.memberID
									WHERE A.status = '4' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' GROUP BY C.memberID ORDER BY total DESC LIMIT 100";
				}
				else
				{
					$queryReport = "SELECT SUM(B.qty) as total, SUM(A.subtotal) as subtotal, SUM(A.shippingTotal) as shippingTotal, SUM(A.grandtotal) as grandtotal, D.firstName, D.lastName, D.cityID FROM as_orders A INNER JOIN as_order_details B ON A.orderID = B.orderID 
									INNER JOIN as_customers C ON A.customerID = C.customerID
									INNER JOIN as_members D ON C.memberID = D.memberID
									WHERE A.status = '4' GROUP BY C.memberID ORDER BY total DESC LIMIT 100";
				}
				
				$sqlReport = mysqli_query($connect, $queryReport);
				$i = 1;
				while ($dtReport = mysqli_fetch_array($sqlReport))
				{
					$queryCity = "SELECT cityName FROM as_cities WHERE cityID = '$dtReport[cityID]'";
					$sqlCity = mysqli_query($connect, $queryCity);
					$dataCity = mysqli_fetch_array($sqlCity);
					
					$totalQty = format_rupiah($dtReport['total']);
					$subtotal = format_rupiah($dtReport['subtotal']);
					$shippingTotal = format_rupiah($dtReport['shippingTotal']);
					$total = format_rupiah($dtReport['grandtotal']);
					
					$content .= "
						<tr>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$i</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$dtReport[firstName] $dtReport[lastName]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$dataCity[cityName]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$totalQty</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$subtotal</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$shippingTotal</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$total</td>";
					$content .= "</tr>
					";
					$grand = $grand + $dtReport['subtotal'];
					$qty = $qty + $dataDetail['qty'];
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
	$html2pdf = new HTML2PDF('P', 'A4','fr', false, 'ISO-8859-15',array(5, 5, 5, 5)); //setting ukuran kertas dan margin pada dokumen anda
	// $html2pdf->setModeDebug();
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
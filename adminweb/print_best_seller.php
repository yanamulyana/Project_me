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

$filename="laporan-best-seller-".$startDate."-".$endDate.".pdf";
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
			<p style='text-align: center; width: 206mm; font-size: 10pt;'><b><u>Laporan Best Seller</u></b> <br><span style='font-size: 10pt;'>$start s/d $end</span></p>
			<br>
			<table cellpadding='0' cellspacing='0' style='width: 206mm;'>
				<tr>
					<th style='width: 10mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>No.</th>
					<th style='width: 30mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Kode Produk</th>
					<th style='width: 140mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Nama Produk</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Harga</th>
					<th style='width: 30mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Harga Diskon</th>
					<th style='width: 20mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>Terjual</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Sisa Saat Ini</th>";
	$content .= "</tr>";
				
				if ($startDate != "" && $endDate != "")
				{
					$queryReport = "SELECT SUM(A.qty) as total, A.productCode, A.productName, A.ukuran, C.salePrice, C.discountPrice, C.qty as stock 
								FROM as_order_details A INNER JOIN as_orders B ON A.orderID = B.orderID
								INNER JOIN as_products C ON C.productCode = A.productCode
								WHERE B.status = '4' AND B.invoiceDate BETWEEN '$startDate' AND '$endDate' GROUP BY A.productName ORDER BY total DESC LIMIT 100";
				}
				else
				{
					$queryReport = "SELECT SUM(A.qty) as total, A.productCode, A.productName, A.ukuran, C.salePrice, C.discountPrice, C.qty as stock 
								FROM as_order_details A INNER JOIN as_orders B ON A.orderID = B.orderID
								INNER JOIN as_products C ON C.productCode = A.productCode
								WHERE B.status = '4' GROUP BY A.productName ORDER BY total DESC LIMIT 100";
				}
				
				$sqlReport = mysqli_query($connect, $queryReport);
				$i = 1;
				while ($dtReport = mysqli_fetch_array($sqlReport))
				{
					$price = format_rupiah($dtReport['salePrice']);
					$discountPrice = format_rupiah($dtReport['discountPrice']);
					
					$content .= "
						<tr>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$i</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$dtReport[productCode]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$dtReport[productName]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$price</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$discountPrice</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$dtReport[total]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$dtReport[stock]</td>";
					$content .=	"</tr>";
					
					$qty = $qty + $dtReport['total'];
					$stock = $stock + $dtReport['stock'];
					$i++;
				}

				$totalQty = format_rupiah($qty);
				$totalStock = format_rupiah($stock);
				
				$content .= "
						<tr>
							<td colspan='5'></td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$totalQty</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$totalStock</td>
						</tr>
					";
				
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
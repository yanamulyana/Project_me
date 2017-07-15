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

$filename="laporan-penjualan-".$startDate."-".$endDate.".pdf";
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
			<p style='text-align: center; width: 206mm; font-size: 10pt;'><b><u>Laporan Penjualan</u></b> <br><span style='font-size: 10pt;'>$start s/d $end</span></p>
			<br>
			<table cellpadding='0' cellspacing='0' style='width: 206mm;'>
				<tr>
					<th style='width: 10mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>No.</th>
					<th style='width: 20mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Tanggal</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Invoice</th>
					<th style='width: 45mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Pemesan</th>
					<th style='width: 45mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Penerima</th>
					<th style='width: 40mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Sumber</th>
					<th style='width: 10mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>Qty</th>
					<th style='width: 22mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Subtotal</th>
					<th style='width: 22mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Biaya Kirim</th>
					<th style='width: 22mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Grandtotal</th>
					<th style='width: 22mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Laba</th>";
	$content .= "</tr>";
				
				$queryReport = "SELECT A.orderID, A.invoiceID, A.invoiceDate, A.shippingTotal, A.coupon, A.insurance, A.grandtotal, B.receivedName, A.subtotal, B.memberID, A.customerID, A.status FROM as_orders A INNER JOIN as_customers B ON A.customerID = B.customerID WHERE A.status = '4' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' OR A.status = '6' AND A.invoiceDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.invoiceDate DESC LIMIT 100";
				$sqlReport = mysqli_query($connect, $queryReport);
				$i = 1;
				while ($dtReport = mysqli_fetch_array($sqlReport))
				{
					$tgl = tgl_indo2($dtReport['invoiceDate']);
					
					$queryMember = "SELECT firstName, lastName FROM as_members WHERE memberID = '$dtReport[memberID]'";
					$sqlMember = mysqli_query($connect, $queryMember);
					$dataMember = mysqli_fetch_array($sqlMember);
					
					$subtotal = format_rupiah($dtReport['subtotal']);
					$grandtotal = format_rupiah($dtReport['grandtotal']);
					$shippingTotal = format_rupiah($dtReport['shippingTotal']);
					
					$queryOrder = "SELECT SUM(qty) as qty FROM as_order_details WHERE orderID = '$dtReport[orderID]' AND invoiceID = '$dtReport[invoiceID]'";
					$sqlOrder = mysqli_query($connect, $queryOrder);
					$dataOrder = mysqli_fetch_array($sqlOrder);
					
					$name = $dataMember['firstName']." ".$dataMember['lastName'];
					
					$receivedName = chunk_split($dtReport['receivedName'], 23, "<br>");
					$memberName = chunk_split($name, 23, "<br>");
					
					$queryOrderDetail = "SELECT SUM(subtotalModal) as modal FROM as_order_details WHERE orderID = '$dtReport[orderID]' AND invoiceID = '$dtReport[invoiceID]'";
					$sqlOrderDetail = mysqli_query($connect, $queryOrderDetail);
					$dataOrderDetail = mysqli_fetch_array($sqlOrderDetail);
					
					$profit = $dtReport['grandtotal'] - ($dtReport['shippingTotal'] + $dtReport['insurance'] + $dataOrderDetail['modal']);
					$profitRp = format_rupiah($profit);
					
					if ($dtReport['status'] == '4')
					{
						$status = "Online";
					}
					else
					{
						$status = "Penjualan Langsung";
					}
					
					$content .= "
						<tr>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$i</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$tgl</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$dtReport[invoiceID]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$memberName</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$receivedName</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$status</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$dataOrder[qty]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$subtotal</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$shippingTotal</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$grandtotal</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$profitRp</td>";
					$content .=	"</tr>";
					
					$subtGrand = $subtGrand + $dtReport['subtotal'];
					$shipGrand = $shipGrand + $dtReport['shippingTotal'];
					$grand = $grand + $dtReport['grandtotal'];
					$qty = $qty + $dataOrder['qty'];
					$grandProfit = $grandProfit + $profit;
					$i++;
				}

				$subtGrandRp = format_rupiah($subtGrand);
				$shipGrandRp = format_rupiah($shipGrand);
				$grandRp = format_rupiah($grand);
				$totalQty = format_rupiah($qty);
				$grandProfitRp = format_rupiah($grandProfit);
				
				$content .= "
						<tr>
							<td colspan='6'></td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: center;'>$totalQty</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$subtGrandRp</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$shipGrandRp</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$grandRp</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$grandProfitRp</td>
						</tr>
					";
				
	$content .= 
				"
			</table>
			<p><i>Note : Laba (setelah dikurangi modal/harga beli, biaya kirim, asuransi, serta penggunaan reward).</i></p>
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
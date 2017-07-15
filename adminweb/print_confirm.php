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

$filename="laporan-konfirmasi-pembayaran-".$startDate."-".$endDate.".pdf";
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
			<p style='text-align: center; width: 206mm; font-size: 10pt;'><b><u>Laporan Konfirmasi Pembayaran</u></b> <br><span style='font-size: 10pt;'>$start s/d $end</span></p>
			<br>
			<table cellpadding='0' cellspacing='0' style='width: 206mm;'>
				<tr>
					<th style='width: 10mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>No.</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>No Order</th>
					<th style='width: 100mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Bank Tujuan</th>
					<th style='width: 100mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Note</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt;'>Tanggal Transfer</th>
					<th style='width: 25mm; padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>Jumlah Transfer</th>";
	$content .= "</tr>";
				
				if ($startDate != "" && $endDate != "")
				{
					$queryReport = "SELECT A.note, A.invoiceID, A.bankTo, A.transferDate, A.amount FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1' AND A.transferDate BETWEEN '$startDate' AND '$endDate' ORDER BY A.createdDate ASC";
				}
				else
				{
					$queryReport = "SELECT A.note, A.invoiceID, A.bankTo, A.transferDate, A.amount FROM as_confirms A LEFT JOIN as_orders B ON A.invoiceID=B.invoiceID WHERE B.status = '1' ORDER BY A.createdDate ASC";
				}
				$sqlReport = mysqli_query($connect, $queryReport);
				$i = 1;
				while ($dtReport = mysqli_fetch_array($sqlReport))
				{
					$transferDate = tgl_indo2($dtReport['transferDate']);
					$amount = format_rupiah($dtReport['amount']);
					$note = chunk_split($dtReport['note'], 50, "<br>");
					
					$content .= "
						<tr>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$i</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$dtReport[invoiceID]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$dtReport[bankTo]</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$note</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt;'>$transferDate</td>
							<td style='padding: 5px 0px 5px 0px; font-size: 8pt; text-align: right;'>$amount</td>";
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
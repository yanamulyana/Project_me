{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<script src="../js/jquery-migrate-1.1.1.min.js"></script>
<link rel="stylesheet" href="js/development-bundle/themes/base/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.widget.js"></script>

{literal}
	<script>
		$(document).ready(function() {
			
			$( "#startDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				yearRange: '2015:c-0'
			});
			
			$( "#endDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				yearRange: '2015:c-0'
			});
		});
	</script>
{/literal}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'report' AND $act == 'search'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Laporan Penjualan
				<small>Laporan Penjualan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="report.php?mod=report&act=search"><i class="fa fa-dashboard"></i> Laporan Penjualan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="report.php">
			<input type="hidden" name="mod" value="report">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Periode Awal</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="startDate" id="startDate" value="{$startDate}" placeholder="Periode Awal" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="endDate" id="endDate" value="{$endDate}" placeholder="Periode Akhir" style="width: 300px;" required></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
			<p>&nbsp;</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="40">No <i class="fa fa-sort"></i></th>
						<th width="60">Tanggal<i class="fa fa-sort"></i></th>
						<th width="60">Invoice <i class="fa fa-sort"></i></th>
						<th width="100">Pemesan <i class="fa fa-sort"></i></th>
						<th width="100">Penerima <i class="fa fa-sort"></i></th>
						<th width="80">Sumber Trx <i class="fa fa-sort"></i></th>
						<th width="50">Grandtotal <i class="fa fa-sort"></i></th>
						<th width="80">Biaya Kirim <i class="fa fa-sort"></i></th>
						<th width="50">Modal <i class="fa fa-sort"></i></th>
						<th width="50">Laba <i class="fa fa-sort"></i></th>
					</tr>
				</thead>
				<tbody>
					{section name=dataReport loop=$dataReport}
						<tr>
							<td>{$dataReport[dataReport].no}</td>
							<td>{$dataReport[dataReport].invoiceDate}</td>
							<td>{$dataReport[dataReport].invoiceID}</td>
							<td>{$dataReport[dataReport].memberName}</td>
							<td>{$dataReport[dataReport].receivedName}</td>
							<td>{$dataReport[dataReport].statusAlias}</td>
							<td align="right">{$dataReport[dataReport].grandtotal}</td>
							<td align="right">{$dataReport[dataReport].shippingTotal}</td>
							<td align="right">{$dataReport[dataReport].modal}</td>
							<td align="right">{$dataReport[dataReport].profit}</td>
						</tr>
					{/section}
				</tbody>
			</table>
			<p><i>Note : Laba (setelah dikurangi modal/harga beli, biaya kirim, asuransi, serta penggunaan reward).</i></p>
			<a href="print_sales_report_pdf.php?mod=report&act=pdf&startDate={$startDate}&endDate={$endDate}" target="_blank"><button type="button" name="button" class="btn btn-danger">Cetak PDF</button></a>
			<a href="print_sales_report_excel.php?mod=report&act=excel&startDate={$startDate}&endDate={$endDate}"><button type="button" name="button" class="btn btn-success">Cetak Excel</button></a>
			
		</section>
		
	{else}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Laporan Penjualan
				<small>Laporan Penjualan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="report.php?mod=report&act=search"><i class="fa fa-dashboard"></i> Laporan Penjualan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="report.php">
			<input type="hidden" name="mod" value="report">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Periode Awal</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" value="{$startDate}" name="startDate" id="startDate" placeholder="Periode Awal" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="{$endDate}" name="endDate" id="endDate" placeholder="Periode Akhir" style="width: 300px;" required></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
		</section>
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}
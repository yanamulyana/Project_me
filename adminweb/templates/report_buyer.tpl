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
				Laporan Pembeli Terbanyak
				<small>Laporan Pembeli Terbanyak</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="report_buyer.php?mod=report&act=search"><i class="fa fa-dashboard"></i> Laporan Pembeli Terbanyak</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="report_buyer.php">
			<input type="hidden" name="mod" value="report">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Periode Awal</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="startDate" id="startDate" value="{$startDate}" placeholder="Periode Awal" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="endDate" id="endDate" value="{$endDate}" placeholder="Periode Akhir" style="width: 300px;"></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
			<p>&nbsp;</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="40">No <i class="fa fa-sort"></i></th>
						<th width="100">Nama Member <i class="fa fa-sort"></i></th>
						<th width="100">Kota <i class="fa fa-sort"></i></th>
						<th width="50">Total Qty<i class="fa fa-sort"></i></th>
						<th width="50">Subtotal <i class="fa fa-sort"></i></th>
						<th width="60">Biaya Kirim <i class="fa fa-sort"></i></th>
						<th width="60">Total <i class="fa fa-sort"></i></th>
					</tr>
				</thead>
				<tbody>
					{section name=dataReport loop=$dataReport}
						<tr>
							<td>{$dataReport[dataReport].no}</td>
							<td>{$dataReport[dataReport].firstName} {$dataReport[dataReport].lastName}</td>
							<td>{$dataReport[dataReport].cityName}</td>
							<td>{$dataReport[dataReport].total}</td>
							<td style="text-align: right;">{$dataReport[dataReport].subtotal}</td>
							<td style="text-align: right;">{$dataReport[dataReport].shippingTotal}</td>
							<td style="text-align: right;">{$dataReport[dataReport].grandtotal}</td>
						</tr>
					{/section}
				</tbody>
			</table>
			<a href="print_buyer.php?mod=report&act=pdf&startDate={$startDate}&endDate={$endDate}" target="_blank"><button type="button" name="button" class="btn btn-danger">Cetak PDF</button></a>
			<a href="print_buyer_excel.php?mod=report&act=excel&startDate={$startDate}&endDate={$endDate}"><button type="button" name="button" class="btn btn-success">Cetak Excel</button></a>
		</section>
		
	{else}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Laporan Pembeli Terbanyak
				<small>Laporan Pembeli Terbanyak</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="report_buyer.php?mod=report&act=search"><i class="fa fa-dashboard"></i> Laporan Pembeli Terbanyak</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="report_buyer.php">
			<input type="hidden" name="mod" value="report">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Periode Awal</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" value="{$startDate}" name="startDate" id="startDate" placeholder="Periode Awal" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="{$endDate}" name="endDate" id="endDate" placeholder="Periode Akhir" style="width: 300px;"></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
		</section>
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}
{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<script src="../js/jquery-migrate-1.1.1.min.js"></script>
<link rel="stylesheet" href="js/development-bundle/themes/base/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.widget.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">

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

	{if $module == 'confirm' AND $act == 'detail'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Konfirmasi Pembayaran
			</h1>
			<ol class="breadcrumb">
				<li><a href="confirm.php"><i class="fa fa-dashboard"></i> Konfirmasi Pembayaran</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">No Order</td>
					<td width="10">:</td>
					<td><a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID={$orderID}&invoiceID={$invoiceID}">{$invoiceID}</a></td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td>{$bankTo}</td>
				</tr>
				<tr>
					<td>Tanggal Transfer</td>
					<td>:</td>
					<td>{$transferDate}</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. {$amount}</td>
				</tr>
				<tr>
					<td>Bukti Pembayaran</td>
					<td>:</td>
					<td><a href="../images/confirms/{$image}" target="_blank">Klik Disini</a></td>
				</tr>
				<tr>
					<td>Catatan</td>
					<td>:</td>
					<td style="font-size: red;">{$note}</td>
				</tr>
			</table>
		</section>
	
	{elseif $module == 'confirm' AND $act == 'search'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Konfirmasi Pembayaran
			</h1>
			<ol class="breadcrumb">
				<li><a href="confirm.php"><i class="fa fa-dashboard"></i> Konfirmasi Pembayaran</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="confirm.php">
			<input type="hidden" name="mod" value="confirm">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Periode Awal</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="startDate" id="startDate" placeholder="Periode Awal" value="{$startDate}" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="endDate" id="endDate" placeholder="Periode Akhir" value="{$endDate}" style="width: 300px;"></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
			<br>
			<p>Total konfirmasi pembayaran : {$numsConfirm}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="70">No Order <i class="fa fa-sort"></i></th>
						<th width="150">Bank Tujuan <i class="fa fa-sort"></i></th>
						<th width="100">Jumlah <i class="fa fa-sort"></i></th>
						<th width="100">Tgl Transfer <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataConfirm loop=$dataConfirm}
						<tr>
							<td>{$dataConfirm[dataConfirm].no}</td>
							<td><a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}">{$dataConfirm[dataConfirm].invoiceID}</a></td>
							<td>{$dataConfirm[dataConfirm].bankTo}</td>
							<td>{$dataConfirm[dataConfirm].amount}</td>
							<td>{$dataConfirm[dataConfirm].transferDate}</td>
							<td>
								<a href="confirm.php?mod=confirm&act=detail&confirmID={$dataConfirm[dataConfirm].confirmID}" title="Detail">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="../images/confirms/{$dataConfirm[dataConfirm].image}" title="Bukti Pembayaran" target="_blank">
									<img src="../images/icon/bank.png" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<!--<div class="pagination">{$pageLink}</div>-->
			<a href="print_confirm.php?mod=report&act=pdf&startDate={$startDate}&endDate={$endDate}" target="_blank"><button type="button" name="button" class="btn btn-success">Cetak PDF</button></a>
		</section><!-- /.content -->
	
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Konfirmasi Pembayaran
			</h1>
			<ol class="breadcrumb">
				<li><a href="confirm.php"><i class="fa fa-dashboard"></i> Konfirmasi Pembayaran</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="confirm.php">
			<input type="hidden" name="mod" value="confirm">
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
			<br>
			<p>Total konfirmasi pembayaran : {$numsConfirm}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="70">No Order <i class="fa fa-sort"></i></th>
						<th width="150">Bank Tujuan <i class="fa fa-sort"></i></th>
						<th width="100">Jumlah <i class="fa fa-sort"></i></th>
						<th width="100">Tgl Transfer <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataConfirm loop=$dataConfirm}
						<tr>
							<td>{$dataConfirm[dataConfirm].no}</td>
							<td><a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}">{$dataConfirm[dataConfirm].invoiceID}</a></td>
							<td>{$dataConfirm[dataConfirm].bankTo}</td>
							<td>{$dataConfirm[dataConfirm].amount}</td>
							<td>{$dataConfirm[dataConfirm].transferDate}</td>
							<td>
								<a href="confirm.php?mod=confirm&act=detail&confirmID={$dataConfirm[dataConfirm].confirmID}" title="Detail">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="../images/confirms/{$dataConfirm[dataConfirm].image}" title="Bukti Pembayaran" target="_blank">
									<img src="../images/icon/bank.png" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}
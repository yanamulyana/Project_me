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

	{if $module == 'request' AND $act == 'edit'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Form Konfirmasi Request Qty
			</h1>
			<ol class="breadcrumb">
				<li><a href="request_order.php"><i class="fa fa-dashboard"></i> Request Qty</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="request_order.php?mod=request&act=confirm">
			<input type="hidden" name="requestID" value="{$requestID}">
			<input type="hidden" name="email" value="{$email}">
			<input type="hidden" name="hp" value="{$hp}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Request ID</td>
					<td width="10">:</td>
					<td>{$requestID}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>{$email}</td>
				</tr>
				<tr>
					<td>Nomor HP</td>
					<td>:</td>
					<td>{$hp}</td>
				</tr>
				<tr>
					<td>Nama Produk</td>
					<td>:</td>
					<td><a href="../product-{$productID}-{$productSeo}.html" target="_blank">{$productCode} - {$productName}</td>
				</tr>
				<tr>
					<td>Qty</td>
					<td>:</td>
					<td>{$qty}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td>{if $status == 'N'}Belum Dibalas{else}Sudah Dibalas{/if}</td>
				</tr>
				<tr valign="top">
					<td>Subjek</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="subject" placeholder="Subjek" value="TELAH TERSEDIA KEMBALI!! {$productName}" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Body</td>
					<td>:</td>
					<td><textarea name="message" class="form-control" placeholder="Body" style="width: 100%; height: 150px;">
Untuk pemesanan silahkan buka link berikut :
http://www.Anaku.com/product-{$productID}-{$productSeo}.html
							
Terima kasih
www.Anaku.com
					</textarea></td>
				</tr>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-success">SIMPAN & KIRIM KONFIRMASI</button>
						<button type="reset" class="btn btn-default">RESET</button>
					</td>
				</tr>
			</table>
			</form>
		</section>
	
	{elseif $module == 'request' AND $act == 'search'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Request Qty
			</h1>
			<ol class="breadcrumb">
				<li><a href="request_order.php"><i class="fa fa-dashboard"></i> Request Qty</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="request_order.php">
			<input type="hidden" name="mod" value="request">
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
			<p>Total request qty : {$numsConfirm}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="150">Email <i class="fa fa-sort"></i></th>
						<th width="80">No HP <i class="fa fa-sort"></i></th>
						<th width="150">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataRequest loop=$dataRequest}
						<tr>
							<td>{$dataRequest[dataRequest].no}</td>
							<td>{$dataRequest[dataRequest].email}</td>
							<td>{$dataRequest[dataRequest].hp}</td>
							<td><a href="../product-{$dataRequest[dataRequest].productID}-{$dataRequest[dataRequest].productSeo}.html" target="_blank">{$dataRequest[dataRequest].productCode} - {$dataRequest[dataRequest].productName}</a></td>
							<td>{$dataRequest[dataRequest].qty}</td>
							<td>{if $dataRequest[dataRequest].status == 'N'}Belum Dibalas{else}Sudah Dibalas{/if}</td>
							<td>
								<a href="request_order.php?mod=request&act=edit&requestID={$dataRequest[dataRequest].requestID}" title="Konfirmasi">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="request_order.php?mod=request&act=delete&requestID={$dataRequest[dataRequest].requestID}" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus request qty ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Request Qty
			</h1>
			<ol class="breadcrumb">
				<li><a href="request_order.php"><i class="fa fa-dashboard"></i> Request Qty</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
		
			{if $msg == '1'}
				<p style="color: #5cb85c;">Request Qty berhasil dikonfimasi.</p>
			{/if}
			<form method="GET" action="request_order.php">
			<input type="hidden" name="mod" value="request">
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
			<p>Total request qty : {$numsRequest}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="150">Email <i class="fa fa-sort"></i></th>
						<th width="80">No HP <i class="fa fa-sort"></i></th>
						<th width="150">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataRequest loop=$dataRequest}
						<tr>
							<td>{$dataRequest[dataRequest].no}</td>
							<td>{$dataRequest[dataRequest].email}</td>
							<td>{$dataRequest[dataRequest].hp}</td>
							<td><a href="../product-{$dataRequest[dataRequest].productID}-{$dataRequest[dataRequest].productSeo}.html" target="_blank">{$dataRequest[dataRequest].productCode} - {$dataRequest[dataRequest].productName}</a></td>
							<td>{$dataRequest[dataRequest].qty}</td>
							<td>{if $dataRequest[dataRequest].status == 'N'}Belum Dibalas{else}Sudah Dibalas{/if}</td>
							<td>
								<a href="request_order.php?mod=request&act=edit&requestID={$dataRequest[dataRequest].requestID}" title="Konfirmasi">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="request_order.php?mod=request&act=delete&requestID={$dataRequest[dataRequest].requestID}" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus request qty ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}
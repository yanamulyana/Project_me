{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'report' AND $act == 'search'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Laporan Stok Kosong
			</h1>
			<ol class="breadcrumb">
				<li><a href="report_empty_stock.php?mod=report&act=search"><i class="fa fa-dashboard"></i> Laporan Stok Kosong</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="report_empty_stock.php">
			<input type="hidden" name="mod" value="report">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Supplier</td>
					<td width="10">:</td>
					<td><select class="form-control" name="supplierID" style="width: 300px;">
							<option value="A">- semua supplier -</option>
							{section name=dataSupplier loop=$dataSupplier}
								{if $dataSupplier[dataSupplier].supplierID == $supplierID}
									<option value="{$dataSupplier[dataSupplier].supplierID}" SELECTED>{$dataSupplier[dataSupplier].supplierName}</option>
								{else}
									<option value="{$dataSupplier[dataSupplier].supplierID}">{$dataSupplier[dataSupplier].supplierName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
			<p>&nbsp;</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="40">No <i class="fa fa-sort"></i></th>
						<th width="25">Kode Produk <i class="fa fa-sort"></i></th>
						<th width="190">Nama Produk<i class="fa fa-sort"></i></th>
						<th width="60">Ukuran (S,M,L,X,XXL)<i class="fa fa-sort"></i></th>
						<!-- <th width="60">Vol (ML)<i class="fa fa-sort"></i></th> -->
						<th width="90">Request Qty (From Member)<i class="fa fa-sort"></i></th>
						<th width="90">Stok Ready<i class="fa fa-sort"></i></th>
						<th width="100">Requirement Stok <i class="fa fa-sort"></i></th>
						<th width="90">Request Stok<i class="fa fa-sort"></i></th>
						<th width="100">Harga Beli <i class="fa fa-sort"></i></th>
					</tr>
				</thead>
				<tbody>
					{section name=dataReport loop=$dataReport}
						<tr>
							<td>{$dataReport[dataReport].no}</td>
							<td>{$dataReport[dataReport].productCode}</td>
							<td>{$dataReport[dataReport].productName}</td>
							<td>{$dataReport[dataReport].ukuran}</td>
							<!-- <td>{$dataReport[dataReport].volume}</td> -->
							<td>{$dataReport[dataReport].requestStok}</td>
							<td style="text-align: center;">{$dataReport[dataReport].qty}</td>
							<td style="text-align: center;">{$dataReport[dataReport].requirementQty}</td>
							<td>{$dataReport[dataReport].request}</td>
							<td style="text-align: center;">{$dataReport[dataReport].buyPrice}</td>
						</tr>
					{/section}
				</tbody>
			</table>
			<a href="print_empty_stock.php?mod=report&act=pdf&supplierID={$supplierID}" target="_blank"><button type="button" name="button" class="btn btn-danger">Cetak PDF</button></a>
			<a href="print_empty_stock_excel.php?mod=report&act=excel&supplierID={$supplierID}"><button type="button" name="button" class="btn btn-success">Cetak Excel</button></a>
		</section>
		
	{else}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Laporan Stok Kosong
			</h1>
			<ol class="breadcrumb">
				<li><a href="report_empty_stock.php?mod=report&act=search"><i class="fa fa-dashboard"></i> Laporan Stok Kosong</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="report_empty_stock.php">
			<input type="hidden" name="mod" value="report">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Supplier</td>
					<td width="10">:</td>
					<td><select class="form-control" name="supplierID" style="width: 300px;">
							<option value="A">- semua supplier -</option>
							{section name=dataSupplier loop=$dataSupplier}
								<option value="{$dataSupplier[dataSupplier].supplierID}">{$dataSupplier[dataSupplier].supplierName}</option>
							{/section}
						</select>
					</td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
		</section>
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}
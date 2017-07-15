{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	
	{if $module == 'supplier' AND $act == 'add'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Supplier
				<small>Tambah Supplier</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="suppliers.php"><i class="fa fa-dashboard"></i> Manajemen Supplier</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="suppliers.php?mod=supplier&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Supplier</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="supplierName" placeholder="Nama Supplier" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Address</td>
					<td>:</td>
					<td><textarea class="form-control" name="address" placeholder="Address" style="width: 300px; height: 120px;" required></textarea></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="phone" placeholder="Nomor telepon" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Fax</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="fax" placeholder="Nomor fax" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Kontak Person</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="contactPerson" placeholder="Kontak person" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>HP</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="cpphone" placeholder="Nomor hp" style="width: 300px;"></td>
				</tr>
				<tr valign="top">
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" required>
							<option value=""></option>
							<option value="Y" SELECTED>Aktif</option>
							<option value="N">Tidak Aktif</option>
					</td>
				</tr>
			</table>
			<button type="submit" class="btn btn-success">SIMPAN</button>
			<button type="reset" class="btn btn-default">RESET</button>
			</form>
		</section>

	{elseif $module == 'supplier' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Supplier
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="suppliers.php"><i class="fa fa-dashboard"></i> Manajemen Supplier</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, supplier berhasil diubah/ditambahkan</p>
			{/if}
			<form method="POST" action="import_suppliers.php?mod=supplier&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Supplier</td>
					<td width="10">:</td>
					<td><a href="export_suppliers.php?mod=supplier&act=export">Export Supplier</a></td>
				</tr>
				<tr valign="top">
					<td width="120">File Import</td>
					<td width="10">:</td>
					<td><input type="file" name="filename" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-success">IMPORT</button>
					</td>
				</tr>
			</table>	
			</form>
		</section>

	{elseif $module == 'supplier' AND $act == 'edit'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Supplier
				<small>Edit Supplier</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="suppliers.php"><i class="fa fa-dashboard"></i> Manajemen Supplier</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="suppliers.php?mod=supplier&act=update">
			<input type="hidden" name="supplierID" value="{$supplierID}">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Supplier</td>
					<td width="10">:</td>
					<td><input type="text" value="{$supplierName}" class="form-control" name="supplierName" placeholder="Nama Supplier" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Address</td>
					<td>:</td>
					<td><textarea class="form-control" name="address" placeholder="Address" style="width: 300px; height: 120px;" required>{$address}</textarea></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><input type="text" value="{$phone}" class="form-control" name="phone" placeholder="Nomor telepon" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Fax</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="{$fax}" name="fax" placeholder="Nomor fax" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Kontak Person</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="{$contactPerson}" name="contactPerson" placeholder="Kontak person" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>HP</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="{$cpphone}" name="cpphone" placeholder="Nomor hp" style="width: 300px;"></td>
				</tr>
				<tr valign="top">
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" required>
							<option value=""></option>
							<option value="Y" {if $status == 'Y'}SELECTED{/if}>Ya</option>
							<option value="N" {if $status == 'N'}SELECTED{/if}>Tidak</option>
					</td>
				</tr>
			</table>
			<button type="submit" class="btn btn-success">SIMPAN</button>
			<button type="reset" class="btn btn-default">RESET</button>
			</form>
		</section>
	
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Supplier
				<small>Daftar Supplier</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="suppliers.php"><i class="fa fa-dashboard"></i> Manajemen Supplier</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Supplier berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Supplier berhasil diubah</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Supplier berhasil dihapus</p>
			{/if}
			<p>
				<a href="suppliers.php?mod=supplier&act=add"><button class="btn btn-primary">Tambah Supplier</button></a>
				<a href="export_suppliers.php?mod=supplier&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="suppliers.php?mod=supplier&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total Supplier : {$numsSupplier}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Nama Supplier <i class="fa fa-sort"></i></th>
						<th>Alamat <i class="fa fa-sort"></i></th>
						<th>Tlp <i class="fa fa-sort"></i></th>
						<th>Kontak Person <i class="fa fa-sort"></i></th>
						<th>Hp <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataSupplier loop=$dataSupplier}
						<tr>
							<td>{$dataSupplier[dataSupplier].no}</td>
							<td>{$dataSupplier[dataSupplier].supplierName}</td>
							<td>{$dataSupplier[dataSupplier].address}</td>
							<td>{$dataSupplier[dataSupplier].phone}</td>
							<td>{$dataSupplier[dataSupplier].contactPerson}</td>
							<td>{$dataSupplier[dataSupplier].cpphone}</td>
							<td>{$dataSupplier[dataSupplier].status}</td>
							<td>
								<a href="suppliers.php?mod=supplier&act=edit&supplierID={$dataSupplier[dataSupplier].supplierID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="suppliers.php?mod=supplier&act=delete&supplierID={$dataSupplier[dataSupplier].supplierID}" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus supplier ini?')">
									<img src="../images/icon/delete.jpg" width="20">
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
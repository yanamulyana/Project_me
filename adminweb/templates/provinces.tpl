{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'province' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Propinsi
				<small>Tambah Propinsi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="provinces.php"><i class="fa fa-dashboard"></i> Manajemen Propinsi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="provinces.php?mod=province&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Propinsi</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="provinceName" placeholder="Nama propinsi" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" SELECTED>Aktif</option>
							<option value="N">Tidak Aktif</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-success">SIMPAN</button>
						<button type="reset" class="btn btn-default">RESET</button>
					</td>
				</tr>
			</table>	
			</form>
		</section>
	
	{elseif $module == 'province' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Propinsi
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="provinces.php"><i class="fa fa-dashboard"></i> Manajemen Propinsi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, propinsi berhasil diubah/ditambahkan</p>
			{/if}
			<form method="POST" action="import_provinces.php?mod=province&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Propinsi</td>
					<td width="10">:</td>
					<td><a href="export_provinces.php?mod=province&act=export">Export Propinsi</a></td>
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
		
	{elseif $module == 'province' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Propinsi
				<small>Edit Propinsi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="provinces.php"><i class="fa fa-dashboard"></i> Manajemen Propinsi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="provinces.php?mod=province&act=update">
			<input type="hidden" name="provinceID" value="{$provinceID}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Propinsi</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="provinceName" placeholder="Nama propinsi" style="width: 300px;" value="{$provinceName}" required></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" {if $status == 'Y'}SELECTED{/if}>Aktif</option>
							<option value="N" {if $status == 'N'}SELECTED{/if}>Tidak Aktif</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-success">SIMPAN</button>
						<button type="reset" class="btn btn-default">RESET</button>
					</td>
				</tr>
			</table>	
			</form>
		</section>
	
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Propinsi
				<small>Daftar Propinsi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="provinces.php"><i class="fa fa-dashboard"></i> Manajemen Propinsi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Propinsi berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Propinsi berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Propinsi berhasil dihapus.</p>
			{/if}
			<p>
				<a href="provinces.php?mod=province&act=add"><button class="btn btn-primary">Tambah Propinsi</button></a>
				<a href="export_provinces.php?mod=province&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="provinces.php?mod=province&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total propinsi : {$numsProvince}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="200">Nama Propinsi <i class="fa fa-sort"></i></th>
						<th width="100">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataProvince loop=$dataProvince}
						<tr>
							<td>{$dataProvince[dataProvince].no}</td>
							<td>{$dataProvince[dataProvince].provinceName}</td>
							<td>{$dataProvince[dataProvince].status}</td>
							<td>
								<a href="provinces.php?mod=province&act=edit&provinceID={$dataProvince[dataProvince].provinceID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="provinces.php?mod=province&act=delete&provinceID={$dataProvince[dataProvince].provinceID}" title="Delete" onClick="return confirm('Are you sure want to delete this province?')">
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
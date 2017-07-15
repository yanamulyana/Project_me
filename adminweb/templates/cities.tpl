{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'city' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Kota
				<small>Tambah Kota</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="cities.php"><i class="fa fa-dashboard"></i> Manajemen Kota</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="cities.php?mod=city&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Propinsi</td>
					<td width="10">:</td>
					<td>
						<select class="form-control" name="provinceID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataProvince loop=$dataProvince}
								<option value="{$dataProvince[dataProvince].provinceID}">{$dataProvince[dataProvince].provinceName}</option>
							{/section}
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Nama Kota</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="cityName" placeholder="Nama kota" style="width: 300px;" required></td>
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
	
	{elseif $module == 'city' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Kota
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="cities.php"><i class="fa fa-dashboard"></i> Manajemen Kota</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, kota berhasil diubah/ditambahkan</p>
			{/if}
			<form method="POST" action="import_cities.php?mod=city&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Kota</td>
					<td width="10">:</td>
					<td><a href="export_cities.php?mod=city&act=export">Export Kota</a></td>
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
		
	{elseif $module == 'city' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Kota
				<small>Edit Kota</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="cities.php"><i class="fa fa-dashboard"></i> Manajemen Kota</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="cities.php?mod=city&act=update">
			<input type="hidden" name="cityID" value="{$cityID}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Propinsi</td>
					<td width="10">:</td>
					<td>
						<select class="form-control" name="provinceID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataProvince loop=$dataProvince}
								{if $dataProvince[dataProvince].provinceID == $provinceID}
									<option value="{$dataProvince[dataProvince].provinceID}" SELECTED>{$dataProvince[dataProvince].provinceName}</option>
								{else}
									<option value="{$dataProvince[dataProvince].provinceID}">{$dataProvince[dataProvince].provinceName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Nama Kota</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="cityName" placeholder="Nama kota" value="{$cityName}" style="width: 300px;" required></td>
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
				Kota
				<small>Daftar Kota</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="cities.php"><i class="fa fa-dashboard"></i> Manajemen Kota</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Kota berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Kota berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Kota berhasil dihapus.</p>
			{/if}
			<p>
				<a href="cities.php?mod=city&act=add"><button class="btn btn-primary">Tambah Kota</button></a>
				<a href="export_cities.php?mod=city&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="cities.php?mod=city&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total kota : {$numsCity}</p>
			<form method="GET" action="cities.php">
			<input type="hidden" name="mod" value="city">
			<input type="hidden" name="act" value="search">
			<p>
				<table>
					<tr>
						<td>Cari kota : </td>
						<td><input type="text" class="form-control" name="q" placeholder="Nama kota" value="{$q}" style="width: 300px;" required></td>
						<td><button type="submit" class="btn btn-success">Cari</button></td>
					</tr>
				</table>
			</p>
			</form>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="200">Nama Propinsi <i class="fa fa-sort"></i></th>
						<th width="200">Nama Kota <i class="fa fa-sort"></i></th>
						<th width="100">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataCity loop=$dataCity}
						<tr>
							<td>{$dataCity[dataCity].no}</td>
							<td>{$dataCity[dataCity].provinceName}</td>
							<td>{$dataCity[dataCity].cityName}</td>
							<td>{$dataCity[dataCity].status}</td>
							<td>
								<a href="cities.php?mod=city&act=edit&cityID={$dataCity[dataCity].cityID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="cities.php?mod=city&act=delete&cityID={$dataCity[dataCity].cityID}" title="Delete" onClick="return confirm('Are you sure want to delete this city?')">
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
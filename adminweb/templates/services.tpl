{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'service' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Layanan
				<small>Tambah Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="services.php"><i class="fa fa-dashboard"></i> Manajemen Layanan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="services.php?mod=service&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Ekspedisi</td>
					<td width="10">:</td>
					<td><select class="form-control" name="courierID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataCourier loop=$dataCourier}
								<option value="{$dataCourier[dataCourier].courierID}">{$dataCourier[dataCourier].courierName}</option>
							{/section}
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Nama Layanan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="serviceName" placeholder="Nama layanan" style="width: 300px;" required></td>
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
	
	{elseif $module == 'service' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Layanan Ekspedisi
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="services.php"><i class="fa fa-dashboard"></i> Manajemen Layanan Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, jasa layanan ekspedisi berhasil diubah/ditambahkan</p>
			{/if}
			<form method="POST" action="import_services.php?mod=service&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="160">Export Layanan Ekspedisi</td>
					<td width="10">:</td>
					<td><a href="export_services.php?mod=service&act=export">Export Layanan Ekspedisi</a></td>
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
		
	{elseif $module == 'service' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Layanan Ekspedisi
				<small>Edit Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="services.php"><i class="fa fa-dashboard"></i> Manajemen Layanan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="services.php?mod=service&act=update">
			<input type="hidden" name="serviceID" value="{$serviceID}">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Ekspedisi</td>
					<td width="10">:</td>
					<td><select class="form-control" name="courierID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataCourier loop=$dataCourier}
								{if $dataCourier[dataCourier].courierID == $courierID}
									<option value="{$dataCourier[dataCourier].courierID}" SELECTED>{$dataCourier[dataCourier].courierName}</option>
								{else}
									<option value="{$dataCourier[dataCourier].courierID}">{$dataCourier[dataCourier].courierName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Nama Layanan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="serviceName" value="{$serviceName}" placeholder="Nama layanan" style="width: 300px;" value="{$brandName}" required></td>
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
				Manajemen Layanan
				<small>Daftar Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="services.php"><i class="fa fa-dashboard"></i> Manajemen Layanan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Layanan ekspedisi berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Layanan ekspedisi berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Layanan ekspedisi berhasil dihapus.</p>
			{/if}
			<p>
				<a href="services.php?mod=service&act=add"><button class="btn btn-primary">Tambah Layanan</button></a>
				<a href="export_services.php?mod=service&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="services.php?mod=service&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total layanan : {$numsService}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Ekspedisi <i class="fa fa-sort"></i></th>
						<th>Layanan <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataService loop=$dataService}
						<tr>
							<td>{$dataService[dataService].no}</td>
							<td>{$dataService[dataService].courierName}</td>
							<td>{$dataService[dataService].serviceName}</td>
							<td>{$dataService[dataService].status}</td>
							<td>
								<a href="services.php?mod=service&act=edit&serviceID={$dataService[dataService].serviceID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="services.php?mod=service&act=delete&serviceID={$dataService[dataService].serviceID}&file={$dataService[dataService].image}" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus layanan ekspedisi ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
		</section><!-- /.content -->
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}
{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

{literal}
	<script>
		$(document).ready(function(){
			$("#provinceID").change(function(){
				var provinceID = $("#provinceID").val();
				$.ajax({
					url: "../get_cities.php",
					data: "provinceID="+provinceID,
					cache: false,
					success: function(msg){
						$("#cityID").html(msg);
					}
				});
			});
		});
	</script>
{/literal}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'location' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Lokasi Pengambilan
				<small>Tambah Lokasi Pengambilan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="locations.php"><i class="fa fa-dashboard"></i> Manajemen Lokasi Pengambilan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="locations.php?mod=location&act=input">
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
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><select class="form-control" id="provinceID" name="provinceID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataProvince loop=$dataProvince}
								<option value="{$dataProvince[dataProvince].provinceID}">{$dataProvince[dataProvince].provinceName}</option>
							{/section}
						</select>
					</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><select class="form-control" name="cityID" id="cityID" style="width: 300px;" required>
							<option value=""></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="locationName" placeholder="Lokasi Pengambilan" style="width: 300px;" required></td>
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
		
	{elseif $module == 'location' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Lokasi Pengambilan
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="locations.php"><i class="fa fa-dashboard"></i> Manajemen Lokasi Pengambilan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, lokasi pengambilan berhasil diubah/ditambahkan</p>
			{/if}
			<form method="POST" action="import_locations.php?mod=location&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="170">Export Lokasi Pengambilan</td>
					<td width="10">:</td>
					<td><a href="export_locations.php?mod=location&act=export">Export Lokasi Pengambilan</a></td>
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
	
	{elseif $module == 'location' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Lokasi Pengambilan
				<small>Edit Lokasi Pengambilan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="locations.php"><i class="fa fa-dashboard"></i> Manajemen Lokasi Pengambilan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="locations.php?mod=location&act=update">
			<input type="hidden" name="locationID" value="{$locationID}">
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
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><select class="form-control" name="provinceID" id="provinceID" style="width: 300px;" required>
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
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><select class="form-control" name="cityID" id="cityID" style="width: 300px;" required>
							{section name=dataCity loop=$dataCity}
								{if $dataCity[dataCity].cityID == $cityID}
									<option value="{$dataCity[dataCity].cityID}" SELECTED>{$dataCity[dataCity].cityName}</option>
								{else}
									<option value="{$dataCity[dataCity].cityID}">{$dataCity[dataCity].cityName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="locationName" value="{$locationName}" placeholder="Lokasi Pengambilan" style="width: 300px;" required></td>
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
				<small>Manajemen Lokasi Pengambilan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="locations.php"><i class="fa fa-dashboard"></i> Manajemen Lokasi Pengambilan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Lokasi pengambilan berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Lokasi pengambilan berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Lokasi pengambilan berhasil dihapus.</p>
			{/if}
			<p>
				<a href="locations.php?mod=location&act=add"><button class="btn btn-primary">Tambah Lokasi Pengambilan</button></a>
				<a href="export_locations.php?mod=location&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="locations.php?mod=location&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total lokasi pengambilan : {$numsLocation}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Ekspedisi <i class="fa fa-sort"></i></th>
						<th>Propinsi <i class="fa fa-sort"></i></th>
						<th>Kota <i class="fa fa-sort"></i></th>
						<th>Lokasi Pengambilan <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataLocation loop=$dataLocation}
						<tr>
							<td>{$dataLocation[dataLocation].no}</td>
							<td>{$dataLocation[dataLocation].courierName}</td>
							<td>{$dataLocation[dataLocation].provinceName}</td>
							<td>{$dataLocation[dataLocation].cityName}</td>
							<td>{$dataLocation[dataLocation].locationName}</td>
							<td>{$dataLocation[dataLocation].status}</td>
							<td>
								<a href="locations.php?mod=location&act=edit&locationID={$dataLocation[dataLocation].locationID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="locations.php?mod=location&act=delete&locationID={$dataLocation[dataLocation].locationID}" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus lokasi pengambilan ekspedisi ini?')">
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
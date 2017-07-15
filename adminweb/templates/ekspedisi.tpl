{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

{if $act == 'add' || $act == 'edit'}
	<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Ajaxfile-upload.css">
	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	
	<style>
		li{
			list-style: none;
		}
	</style>
	{literal}
	<script>
		$(document).ready(function(){
			
			var btnUpload=$('#me');
			var mestatus=$('#mestatus');
			var files=$('#files');
			new AjaxUpload(btnUpload, {
				action: '../upload/upload_courier.php',
				name: 'uploadfile',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
		                // extension is not allowed 
						mestatus.text('Only JPG file are allowed');
						return false;
					}
					mestatus.html('<img src="../images/ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					//On completion clear the status
					mestatus.text('');
					//On completion clear the status
					files.html('');
					//Add uploaded file to list
					if(response == 'bigger'){
						alert('The file size should not exceed 100kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files').html('<img src="../images/couriers/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc"/><br />').addClass('success');
							$('<li></li>').appendTo('#ekspedisi').html('<input type="hidden" name="filename" value="'+response+'">').addClass('nameupload');
							
						} else{
							$('<li></li>').appendTo('#files').text(file).addClass('error');
						}
					}
				}
			});
		});
	</script>
	{/literal}
{/if}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'ekspedisi' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Ekspedisi
				<small>Tambah Ekspedisi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="ekspedisi.php"><i class="fa fa-dashboard"></i> Manajemen Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="ekspedisi.php?mod=ekspedisi&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Ekspedisi</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="courierName" placeholder="Nama ekspedisi" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Jenis Ekspedisi</td>
					<td>:</td>
					<td><select class="form-control" name="courierType" style="width: 300px;" required>
							<option value=""></option>
							<option value="U">Ekspedisi Umum</option>
							<option value="N">Non Ekspedisi Umum (Travel, Bus, dll)</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Tambahan Biaya</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="addCost" placeholder="Tambahan biaya" style="width: 300px;"></td>
				</tr>
				<tr valign="top">
					<td>Asuransi</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="insurance" placeholder="Asuransi (berapa % dari total biaya)" style="width: 300px;"></td>
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
				<tr valign="top">
					<td>Upload Gambar</td>
					<td>:</td>
					<td>
						<p>File size should not exceed uploaded 100 KB and only JPG/JPEG allowed.</p>
						
						<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
							<button class="button_profile"><img src="../images/add.png" width="50"></button>
							
							<div id="ekspedisi">
								<li class="nameupload"></li>
							</div>
							<div id="files">
								<li class="success"></li>
							</div>
						</div>
						<span id="mestatus"></span>
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
		
	{elseif $module == 'ekspedisi' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Jasa Ekspedisi
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="ekspedisi.php"><i class="fa fa-dashboard"></i> Manajemen Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, jasa ekspedisi berhasil diubah/ditambahkan</p>
			{/if}
			<form method="POST" action="import_ekspedisi.php?mod=ekspedisi&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Ekspedisi</td>
					<td width="10">:</td>
					<td><a href="export_ekspedisi.php?mod=ekspedisi&act=export">Export Ekspedisi</a></td>
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
		
	{elseif $module == 'ekspedisi' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Ekspedisi
				<small>Edit Ekspedisi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="ekspedisi.php"><i class="fa fa-dashboard"></i> Manajemen Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="ekspedisi.php?mod=ekspedisi&act=update">
			<input type="hidden" name="courierID" value="{$courierID}">
			<input type="hidden" name="oldfile" value="{$image}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Ekspedisi</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="courierName" placeholder="Nama ekspedisi" style="width: 300px;" value="{$courierName}" required></td>
				</tr>
				<tr>
					<td>Jenis Ekspedisi</td>
					<td>:</td>
					<td><select class="form-control" name="courierType" style="width: 300px;" required>
							<option value=""></option>
							<option value="U" {if $courierType == 'U'}SELECTED{/if}>Ekspedisi Umum</option>
							<option value="N" {if $courierType == 'N'}SELECTED{/if}>Non Ekspedisi Umum (Travel, Bus, dll)</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Tambahan Biaya</td>
					<td>:</td>
					<td><input type="number" value="{$addCost}" class="form-control" name="addCost" placeholder="Tambahan biaya" style="width: 300px;"></td>
				</tr>
				<tr valign="top">
					<td>Asuransi</td>
					<td>:</td>
					<td><input type="text" value="{$insurance}" class="form-control" name="insurance" placeholder="Asuransi (berapa % dari total biaya)" style="width: 300px;"></td>
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
				<tr valign="top">
					<td>Upload Gambar</td>
					<td>:</td>
					<td>
						<p>File size should not exceed uploaded 100 KB and only JPG/JPEG allowed.</p>
						
						<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
							<button class="button_profile"><img src="../images/add.png" width="50"></button>
							
							<div id="ekspedisi">
								<li class="nameupload"></li>
							</div>
							<div id="files">
								<li class="success">
									{if $image != ""}
										<img src="../images/couriers/thumb/small_{$image}" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc"><br>
										<p><a href="../upload/delete_courier.php?mod=courier&act=delete&courierID={$courierID}&file={$image}" style="font-size: 10pt;" onClick="return confirm('Anda yakin ingin menghapus gambar ini?')">Hapus</a></p>
									{/if}
								</li>
							</div>
						</div>
						<span id="mestatus"></span>
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
				Ekspedisi
				<small>Daftar Ekspedisi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="ekspedisi.php"><i class="fa fa-dashboard"></i> Manajemen Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Ekspedisi berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Ekspedisi berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Ekspedisi berhasil dihapus.</p>
			{/if}
			<p>
				<a href="ekspedisi.php?mod=ekspedisi&act=add"><button class="btn btn-primary">Tambah Ekspedisi</button></a>
				<a href="export_ekspedisi.php?mod=ekspedisi&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="ekspedisi.php?mod=ekspedisi&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="50">Logo <i class="fa fa-sort"></i></th>
						<th width="200">Nama Ekspedisi <i class="fa fa-sort"></i></th>
						<th width="200">Jenis Ekspedisi <i class="fa fa-sort"></i></th>
						<th width="60">Tambahan Biaya <i class="fa fa-sort"></i></th>
						<th width="60">Asuransi <i class="fa fa-sort"></i></th>
						<th width="100">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataCourier loop=$dataCourier}
						<tr>
							<td>{$dataCourier[dataCourier].no}</td>
							<td>{if $dataCourier[dataCourier].image != ""} <img src="../images/couriers/thumb/small_{$dataCourier[dataCourier].image}" width="80"> {/if}</td>
							<td>{$dataCourier[dataCourier].courierName}</td>
							<td>{$dataCourier[dataCourier].courierType}</td>
							<td>{$dataCourier[dataCourier].addCost}</td>
							<td>{$dataCourier[dataCourier].insurance}</td>
							<td>{$dataCourier[dataCourier].status}</td>
							<td>
								<a href="ekspedisi.php?mod=ekspedisi&act=edit&courierID={$dataCourier[dataCourier].courierID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="ekspedisi.php?mod=ekspedisi&act=delete&courierID={$dataCourier[dataCourier].courierID}&file={$dataCourier[dataCourier].image}" title="Delete" onClick="return confirm('Anda yakin ingin menghapus ekspedisi ini?')">
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
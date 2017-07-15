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
				action: '../upload/upload_promo.php',
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
						alert('The file size should not exceed 500kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files').html('<img src="../images/promo/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc"/><br />').addClass('success');
							$('<li></li>').appendTo('#promo').html('<input type="hidden" name="filename" value="'+response+'">').addClass('nameupload');
							
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

	{if $module == 'promo' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Promosi
				<small>Tambah Promosi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="promo.php"><i class="fa fa-dashboard"></i> Manajemen Promosi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="promo.php?mod=promo&act=input">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Judul</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="title" placeholder="Judul promosi" style="width: 300px;" required></td>
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
					<td>Upload</td>
					<td>:</td>
					<td>
						<p>File size should not exceed uploaded 500 KB and only JPG/JPEG allowed. The resolution must be 1000 x 350 pixels</p>
						<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
							<button class="button_profile"><img src="../images/add.png" width="50"></button>
								
							<div id="promo">
								<li class="nameupload"></li>
							</div>
							<div id="files">
								<li class="success"></li>
					        </div>
						</div>
						<span id="mestatus"></span>
					</td>
				</tr>
				<tr valign="top">
					<td>URL</td>
					<td>:</td>
					<td><input type="url" class="form-control" name="url" placeholder="Url" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Deskripsi</td>
					<td>:</td>
					<td><textarea id="description" name="description"></textarea></td>
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
		
	{elseif $module == 'promo' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Promosi
				<small>Edit Promosi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="promo.php"><i class="fa fa-dashboard"></i> Manajemen Promosi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="promo.php?mod=promo&act=update">
			<input type="hidden" name="promoID" value="{$promoID}">
			<input type="hidden" name="oldfile" value="{$image}">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Judul</td>
					<td width="10">:</td>
					<td><input type="text" value="{$title}" class="form-control" name="title" placeholder="Judul promosi" style="width: 300px;" required></td>
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
					<td>Upload</td>
					<td>:</td>
					<td>
						<p>File size should not exceed uploaded 500 KB and only JPG/JPEG allowed. The resolution must be 1000 x 350 pixels</p>
						<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
							<button class="button_profile"><img src="../images/add.png" width="50"></button>
								
							<div id="promo">
								<li class="nameupload"></li>
							</div>
							<div id="files">
								<li class="success">
									{if $image != ""}
										<img src="../images/promo/{$image}" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc">
									{/if}
								</li>
					        </div>
						</div>
						<span id="mestatus"></span>
					</td>
				</tr>
				<tr valign="top">
					<td>URL</td>
					<td>:</td>
					<td><input type="url" class="form-control" name="url" value="{$url}" placeholder="Url" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Deskripsi</td>
					<td>:</td>
					<td><textarea id="description" name="description">{$description}</textarea></td>
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
				Promosi
				<small>Daftar Promosi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="promo.php"><i class="fa fa-dashboard"></i> Manajemen Promosi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Promosi berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Promosi berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Promosi berhasil dihapus.</p>
			{/if}
			<p><a href="promo.php?mod=promo&act=add"><button class="btn btn-primary">Tambah Promosi</button></a></p>
			<p>Total promosi : {$numsPromo}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="50">No <i class="fa fa-sort"></i></th>
						<th>Judul <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Url / Link <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataPromo loop=$dataPromo}
						<tr valign="top">
							<td>{$dataPromo[dataPromo].no}</td>
							<td>{$dataPromo[dataPromo].title}</td>
							<td>{$dataPromo[dataPromo].status}</td>
							<td>{$dataPromo[dataPromo].url}</td>
							<td>
								<a href="promo.php?mod=promo&act=edit&promoID={$dataPromo[dataPromo].promoID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="promo.php?mod=promo&act=delete&promoID={$dataPromo[dataPromo].promoID}" title="Delete" onClick="return confirm('Are you sure want to delete this promotion?')">
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

{if $act == 'add' || $act == 'edit'}
	{literal}
	<script>
		CKEDITOR.replace( 'description' );
	</script>
	{/literal}
{/if}

{include file="footer.tpl"}
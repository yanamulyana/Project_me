{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'category' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Kategori
				<small>Tambah Kategori</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="categories.php"><i class="fa fa-dashboard"></i> Manajemen Kategori</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="categories.php?mod=category&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Category Name</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="category" placeholder="Category name" style="width: 300px;" required></td>
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
	
	{elseif $module == 'category' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Kategori
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="categories.php"><i class="fa fa-dashboard"></i> Manajemen Kategori</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, kategori berhasil diubah/ditambahkan</p>
			{/if}
			<form method="POST" action="import_categories.php?mod=category&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Kategori</td>
					<td width="10">:</td>
					<td><a href="export_categories.php?mod=category&act=export">Export Kategori</a></td>
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
		
	{elseif $module == 'category' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Kategori
				<small>Edit Kategori</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="categories.php"><i class="fa fa-dashboard"></i> Manajemen Kategori</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="categories.php?mod=category&act=update">
			<input type="hidden" name="categoryID" value="{$categoryID}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Category Name</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="category" placeholder="Category name" style="width: 300px;" value="{$categoryName}" required></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" {if $status == 'Y'}SELECTED{/if}>Active</option>
							<option value="N" {if $status == 'N'}SELECTED{/if}>Not Active</option>
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
				Kategori
				<small>Daftar Kategori</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="categories.php"><i class="fa fa-dashboard"></i> Categories</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Kategori berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Kategori berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Kategori berhasil dihapus.</p>
			{/if}
			<p>
				<a href="categories.php?mod=category&act=add"><button class="btn btn-primary">Tambah Kategori</button></a>
				<a href="export_categories.php?mod=category&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="categories.php?mod=category&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total category : {$numsCategory}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="200">Category Name <i class="fa fa-sort"></i></th>
						<th width="100">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataCategory loop=$dataCategory}
						<tr>
							<td>{$dataCategory[dataCategory].no}</td>
							<td>{$dataCategory[dataCategory].categoryName}</td>
							<td>{$dataCategory[dataCategory].status}</td>
							<td>
								<a href="categories.php?mod=category&act=edit&categoryID={$dataCategory[dataCategory].categoryID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="categories.php?mod=category&act=delete&categoryID={$dataCategory[dataCategory].categoryID}" title="Delete" onClick="return confirm('Are you sure want to delete this category?')">
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
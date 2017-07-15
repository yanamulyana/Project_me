{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'subcategory' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Sub Kategori
				<small>Tambah Subkategori</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="subcategories.php"><i class="fa fa-dashboard"></i> Manajemen Sub Kategori</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="subcategories.php?mod=subcategory&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="140">Category Name</td>
					<td width="10">:</td>
					<td><select class="form-control" name="categoryID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataCategory loop=$dataCategory}
								<option value="{$dataCategory[dataCategory].categoryID}">{$dataCategory[dataCategory].categoryName}</option>
							{/section}
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Sub Category Name</td>
					<td>:</td>
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
	
	{elseif $module == 'subcategory' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Sub Kategori
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="subcategories.php"><i class="fa fa-dashboard"></i> Manajemen Sub Kategori</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, subkategori berhasil diubah/ditambahkan</p>
			{/if}
			<form method="POST" action="import_subcategories.php?mod=subcategory&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="140">Export Sub Kategori</td>
					<td width="10">:</td>
					<td><a href="export_subcategories.php?mod=subcategory&act=export">Export Sub Kategori</a></td>
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
		
	{elseif $module == 'subcategory' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Sub Kategori
				<small>Edit Sub Kategori</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="subcategories.php"><i class="fa fa-dashboard"></i> Manajemen Sub Kategori</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="subcategories.php?mod=subcategory&act=update">
			<input type="hidden" name="subCategoryID" value="{$subCategoryID}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="140">Category Name</td>
					<td width="10">:</td>
					<td><select class="form-control" name="categoryID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataCategory loop=$dataCategory}
								{if $dataCategory[dataCategory].categoryID == $categoryID}
									<option value="{$dataCategory[dataCategory].categoryID}" SELECTED>{$dataCategory[dataCategory].categoryName}</option>
								{else}
									<option value="{$dataCategory[dataCategory].categoryID}">{$dataCategory[dataCategory].categoryName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Sub Category Name</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="category" placeholder="Sub Category name" style="width: 300px;" value="{$subCategoryName}" required></td>
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
				Sub Kategori
				<small>Daftar Sub Kategori</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="subcategories.php"><i class="fa fa-dashboard"></i> Manajemen Sub Kategori</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Sub kategori berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Sub kategori berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Sub kategori berhasil dihapus.</p>
			{/if}
			<p>
				<a href="subcategories.php?mod=subcategory&act=add"><button class="btn btn-primary">Tambah Sub Kategori</button></a>
				<a href="export_subcategories.php?mod=subcategory&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="subcategories.php?mod=subcategory&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total subkategori : {$numsSubCategory}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="50">No <i class="fa fa-sort"></i></th>
						<th width="200">Category <i class="fa fa-sort"></i></th>
						<th width="200">Sub Category <i class="fa fa-sort"></i></th>
						<th width="100">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataCategory loop=$dataCategory}
						<tr>
							<td>{$dataCategory[dataCategory].no}</td>
							<td>{$dataCategory[dataCategory].categoryName}</td>
							<td>{$dataCategory[dataCategory].subCategoryName}</td>
							<td>{$dataCategory[dataCategory].status}</td>
							<td>
								<a href="subcategories.php?mod=subcategory&act=edit&subCategoryID={$dataCategory[dataCategory].subCategoryID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="subcategories.php?mod=subcategory&act=delete&subCategoryID={$dataCategory[dataCategory].subCategoryID}" title="Delete" onClick="return confirm('Are you sure want to delete this subcategory?')">
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
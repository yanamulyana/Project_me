{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'fare' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Tarif Layanan Ekspedisi
				<small>Tambah Tarif Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="fares.php"><i class="fa fa-dashboard"></i> Manajemen Tarif Layanan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="fares.php?mod=fare&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Layanan Ekspedisi</td>
					<td width="10">:</td>
					<td>
						<select class="form-control" name="serviceID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataService loop=$dataService}
								<option value="{$dataService[dataService].serviceID}">{$dataService[dataService].serviceName}</option>
							{/section}
						</select>
					</td>
				</tr>
				<tr>
					<td>Nama Tarif Layanan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="fareName" placeholder="Nama tarif, ie : REG, YES, ONS, dll" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y">Active</option>
							<option value="N">Not Active</option>
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
		
	{elseif $module == 'fare' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Tarif Layanan Ekspedisi
				<small>Edit Tarif Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="fares.php"><i class="fa fa-dashboard"></i> Manajemen Tarif Layanan Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="fares.php?mod=fare&act=update">
			<input type="hidden" name="fareID" value="{$fareID}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Layanan Ekspedisi</td>
					<td width="10">:</td>
					<td>
						<select class="form-control" name="serviceID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataService loop=$dataService}
								{if $dataService[dataService].serviceID == $serviceID}
									<option value="{$dataService[dataService].serviceID}" SELECTED>{$dataService[dataService].serviceName}</option>
								{else}
									<option value="{$dataService[dataService].serviceID}">{$dataService[dataService].serviceName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr>
					<td>Nama Tarif Layanan</td>
					<td>:</td>
					<td><input type="text" value="{$fareName}" class="form-control" name="fareName" placeholder="Nama tarif, ie : REG, YES, ONS, dll" style="width: 300px;" required></td>
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
				Manajemen Tarif Layanan
				<small>Daftar Nama Tarif Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="fares.php"><i class="fa fa-dashboard"></i> Manajemen Tarif Layanan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Tarif Layanan ekspedisi berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Tarif Layanan ekspedisi berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Tarif Layanan ekspedisi berhasil dihapus.</p>
			{/if}
			<p><a href="fares.php?mod=fare&act=add"><button class="btn btn-primary">Tambah Tarif Layanan Ekspedisi</button></a></p>
			<p>Total tarif : {$numsFare}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Nama Layanan <i class="fa fa-sort"></i></th>
						<th>Nama Tarif <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataFare loop=$dataFare}
						<tr>
							<td>{$dataFare[dataFare].no}</td>
							<td>{$dataFare[dataFare].serviceName}</td>
							<td>{$dataFare[dataFare].fareName}</td>
							<td>{$dataFare[dataFare].status}</td>
							<td>
								<a href="fares.php?mod=fare&act=edit&fareID={$dataFare[dataFare].fareID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="fares.php?mod=fare&act=delete&fareID={$dataFare[dataFare].fareID}" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus tarif layanan ekspedisi ini?')">
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
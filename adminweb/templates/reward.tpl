{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'reward' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Reward
				<small>Tambah Reward</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="reward.php"><i class="fa fa-dashboard"></i> Manajemen Reward</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="reward.php?mod=reward&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="140">Nama Poin</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="pointName" placeholder="Nama poin" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Min. Penukaran Poin</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="minPoint" placeholder="Minimal penukaran poin" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Min. Transaksi</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="minTrx" placeholder="Minimal transaksi" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Voucher Kupon</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="coupon" placeholder="Voucher coupon" style="width: 300px;" required></td>
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
					<td>Deskripsi</td>
					<td>:</td>
					<td><textarea class="form-control" name="description" placeholder="Deskripsi" style="width: 500px; height: 150px;" required></textarea></td>
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
		
	{elseif $module == 'reward' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Reward
				<small>Edit Reward</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="reward.php"><i class="fa fa-dashboard"></i> Manajemen Reward</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="reward.php?mod=reward&act=update">
			<input type="hidden" name="pointID" value="{$pointID}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="140">Nama Poin</td>
					<td width="10">:</td>
					<td><input type="text" value="{$pointName}" class="form-control" name="pointName" placeholder="Nama poin" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Min. Penukaran Poin</td>
					<td>:</td>
					<td><input type="number" value="{$minPoint}" class="form-control" name="minPoint" placeholder="Minimal penukaran poin" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Min. Transaksi</td>
					<td>:</td>
					<td><input type="number" value="{$minTrx}" class="form-control" name="minTrx" placeholder="Minimal transaksi" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Voucher Kupon</td>
					<td>:</td>
					<td><input type="number" value="{$coupon}" class="form-control" name="coupon" placeholder="Voucher coupon" style="width: 300px;" required></td>
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
					<td>Deskripsi</td>
					<td>:</td>
					<td><textarea class="form-control" name="description" placeholder="Deskripsi" style="width: 500px; height: 150px;" required>{$description}</textarea></td>
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
	
	{elseif $module == 'reward' AND $act == 'import'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Poin Reward
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="reward.php"><i class="fa fa-dashboard"></i> Poin Reward</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, reward berhasil diubah</p>
			{/if}
			<form method="POST" action="import_rewards.php?mod=reward&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Reward</td>
					<td width="10">:</td>
					<td><a href="export_rewards.php?mod=reward&act=export">Export Reward</a></td>
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
	
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Reward
				<small>Daftar Reward</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="reward.php"><i class="fa fa-dashboard"></i> Reward</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Reward berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Reward berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Reward berhasil dihapus.</p>
			{/if}
			<p><a href="reward.php?mod=reward&act=add"><button class="btn btn-primary">Tambah Reward</button></a>
				<a href="export_rewards.php?mod=reward&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="reward.php?mod=reward&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total reward : {$numsPoint}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="100">Nama Poin <i class="fa fa-sort"></i></th>
						<th width="100">Min. Tukar Poin <i class="fa fa-sort"></i></th>
						<th width="100">Min. Trx <i class="fa fa-sort"></i></th>
						<th width="100">Nominal Kupon <i class="fa fa-sort"></i></th>
						<th width="100">Deskripsi <i class="fa fa-sort"></i></th>
						<th width="50">Status <i class="fa fa-sort"></i></th>
						<th width="50">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataReward loop=$dataReward}
						<tr>
							<td>{$dataReward[dataReward].no}</td>
							<td>{$dataReward[dataReward].pointName}</td>
							<td>{$dataReward[dataReward].minPoint}</td>
							<td>{$dataReward[dataReward].minTrx}</td>
							<td>{$dataReward[dataReward].coupon}</td>
							<td>{$dataReward[dataReward].description}</td>
							<td>{$dataReward[dataReward].status}</td>
							<td>
								<a href="reward.php?mod=reward&act=edit&pointID={$dataReward[dataReward].pointID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="reward.php?mod=reward&act=delete&pointID={$dataReward[dataReward].pointID}" title="Delete" onClick="return confirm('Are you sure want to delete this reward?')">
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
{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'bank' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Bank
				<small>Tambah Bank</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="bank.php"><i class="fa fa-dashboard"></i> Manajemen Bank</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="bank.php?mod=bank&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Bank</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="bankName" placeholder="Nama bank" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Nomor Rekening</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="accountNo" placeholder="Nomor rekening" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Pemilik Rekening</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="accountName" placeholder="Pemilik rekening" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Cabang Bank</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="branch" placeholder="Cabang" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Saldo Awal</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="balance" placeholder="Saldo Awal" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Display?</td>
					<td>:</td>
					<td><select class="form-control" name="display" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" SELECTED>Ya</option>
							<option value="N">Tidak</option>
						</select>
					</td>
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
		
	{elseif $module == 'bank' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Bank
				<small>Edit Bank</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="bank.php"><i class="fa fa-dashboard"></i> Manajemen Bank</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="bank.php?mod=bank&act=update">
			<input type="hidden" name="bankID" value="{$bankID}">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Bank</td>
					<td width="10">:</td>
					<td><input type="text" value="{$bankName}" class="form-control" name="bankName" placeholder="Nama bank" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Nomor Rekening</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="{$accountNo}" name="accountNo" placeholder="Nomor rekening" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Pemilik Rekening</td>
					<td>:</td>
					<td><input type="text" value="{$accountName}" class="form-control" name="accountName" placeholder="Pemilik rekening" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Cabang Bank</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="{$branch}" name="branch" placeholder="Cabang" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Saldo Awal</td>
					<td>:</td>
					<td><input type="number" value="{$balance}" class="form-control" name="balance" placeholder="Saldo Awal" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Saldo Akhir</td>
					<td>:</td>
					<td><input type="number" class="form-control" value="{$endBalance}" name="endBalance" placeholder="Saldo Akhir" style="width: 300px;" DISABLED></td>
				</tr>
				<tr>
					<td>Display?</td>
					<td>:</td>
					<td><select class="form-control" name="display" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" {if $display == 'Y'}SELECTED{/if}>Ya</option>
							<option value="N" {if $display == 'N'}SELECTED{/if}>Tidak</option>
						</select>
					</td>
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
				Bank
				<small>Daftar Bank</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="bank.php"><i class="fa fa-dashboard"></i> Manajemen Bank</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Bank berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Bank berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Bank berhasil dihapus.</p>
			{/if}
			<p><a href="bank.php?mod=bank&act=add"><button class="btn btn-primary">Tambah Bank</button></a></p>
			<p>Total bank : {$numsBank}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="100">Nama Bank <i class="fa fa-sort"></i></th>
						<th width="100">Nomor Rekening <i class="fa fa-sort"></i></th>
						<th width="150">Nama Pemilik Rekening <i class="fa fa-sort"></i></th>
						<th width="100">Cabang <i class="fa fa-sort"></i></th>
						<th width="100">Saldo Awal <i class="fa fa-sort"></i></th>
						<th width="100">Saldo Akhir <i class="fa fa-sort"></i></th>
						<th width="50">Display <i class="fa fa-sort"></i></th>
						<th width="70">Status <i class="fa fa-sort"></i></th>
						<th width="60">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataBank loop=$dataBank}
						<tr>
							<td>{$dataBank[dataBank].no}</td>
							<td>{$dataBank[dataBank].bankName}</td>
							<td>{$dataBank[dataBank].accountNo}</td>
							<td>{$dataBank[dataBank].accountName}</td>
							<td>{$dataBank[dataBank].branch}</td>
							<td>{$dataBank[dataBank].balance}</td>
							<td>{$dataBank[dataBank].endBalance}</td>
							<td>{$dataBank[dataBank].display}</td>
							<td>{$dataBank[dataBank].status}</td>
							<td>
								<a href="bank.php?mod=bank&act=edit&bankID={$dataBank[dataBank].bankID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="bank.php?mod=bank&act=delete&bankID={$dataBank[dataBank].bankID}" title="Delete" onClick="return confirm('Are you sure want to delete this bank?')">
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
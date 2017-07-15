{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	
	{if $module == 'user' AND $act == 'add'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen User
				<small>Tambah User</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="users.php"><i class="fa fa-dashboard"></i> Manajemen User</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="users.php?mod=user&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Lengkap</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="fullName" placeholder="Nama Lengkap" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Address</td>
					<td>:</td>
					<td><textarea class="form-control" name="address" placeholder="Address" style="width: 300px; height: 120px;" required></textarea></td>
				</tr>
				<tr>
					<td>Cellphone</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="cellphone" placeholder="Nomor telepon" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="email" class="form-control" name="email" placeholder="Email" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="username" placeholder="Username" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="password" placeholder="Password" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Rekening</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="account" placeholder="Rekening bank" style="width: 300px;"></td>
				</tr>
				<tr valign="top">
					<td>Blokir</td>
					<td>:</td>
					<td><select class="form-control" name="block" required>
							<option value=""></option>
							<option value="Y">Ya</option>
							<option value="N" SELECTED>Tidak</option>
					</td>
				</tr>
			</table>
			<button type="submit" class="btn btn-success">SIMPAN</button>
			<button type="reset" class="btn btn-default">RESET</button>
			</form>
		</section>

	{elseif $module == 'user' AND $act == 'view'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen User
				<small>Detail User</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="users.php"><i class="fa fa-dashboard"></i> Manajemen User</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Lengkap</td>
					<td width="10">:</td>
					<td>{$fullName}</td>
				</tr>
				<tr valign="top">
					<td>Address</td>
					<td>:</td>
					<td>{$address}</td>
				</tr>
				<tr>
					<td>Cellphone</td>
					<td>:</td>
					<td>{$cellphone}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>{$email}</td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td>{$username}</td>
				</tr>
				<tr>
					<td>Rekening</td>
					<td>:</td>
					<td>{$account}</td>
				</tr>
				<tr valign="top">
					<td>Blokir</td>
					<td>:</td>
					<td>{if $blocked == 'Y'}Ya{else}Tidak{/if}</td>
				</tr>
			</table>
		</section>
	
	{elseif $module == 'user' AND $act == 'edit'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen User
				<small>Edit User</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="users.php"><i class="fa fa-dashboard"></i> Manajemen User</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="users.php?mod=user&act=update">
			<input type="hidden" name="userID" value="{$userID}">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Lengkap</td>
					<td width="10">:</td>
					<td><input type="text" value="{$fullName}" class="form-control" name="fullName" placeholder="Nama Lengkap" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Address</td>
					<td>:</td>
					<td><textarea class="form-control" name="address" placeholder="Address" style="width: 300px; height: 120px;" required>{$address}</textarea></td>
				</tr>
				<tr>
					<td>Cellphone</td>
					<td>:</td>
					<td><input type="text" value="{$cellphone}" class="form-control" name="cellphone" placeholder="Nomor telepon" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="email" class="form-control" value="{$email}" name="email" placeholder="Email" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="username" value="{$username}" placeholder="Username" style="width: 300px;" DISABLED></td>
				</tr>
				<tr>
					<td>Rekening</td>
					<td>:</td>
					<td><input type="text" value="{$account}" class="form-control" name="account" placeholder="Rekening bank" style="width: 300px;"></td>
				</tr>
				<tr valign="top">
					<td>Blokir</td>
					<td>:</td>
					<td><select class="form-control" name="block" required>
							<option value=""></option>
							<option value="Y" {if $blocked == 'Y'}SELECTED{/if}>Ya</option>
							<option value="N" {if $blocked == 'N'}SELECTED{/if}>Tidak</option>
					</td>
				</tr>
			</table>
			<button type="submit" class="btn btn-success">SIMPAN</button>
			<button type="reset" class="btn btn-default">RESET</button>
			</form>
		</section>
	
	{elseif $module == 'user' AND $act == 'search'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen User
				<small>Daftar User</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="users.php"><i class="fa fa-dashboard"></i> Manajemen User</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form metho="GET" action="users.php">
				<input type="hidden" name="mod" value="user">
				<input type="hidden" name="act" value="search">
				<table>
					<tr>
						<td width="100">Temukan User :</td>
						<td>
							<input type="text" class="form-control" name="q" placeholder="Username" style="width: 300px;" value="{$q}" required>
						</td>
						<td>
							<button type="submit" class="btn btn-success">GO</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			<p><a href="users.php?mod=user&act=add"><button class="btn btn-primary">Tambah User</button></a></p>
			<p>Hasil pencarian <i>{$q}</i> : {$numsUser}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Nama Lengkap <i class="fa fa-sort"></i></th>
						<th>Username <i class="fa fa-sort"></i></th>
						<th>Phone <i class="fa fa-sort"></i></th>
						<th>Blokir <i class="fa fa-sort"></i></th>
						<th>Email <i class="fa fa-sort"></i></th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataUser loop=$dataUser}
						<tr>
							<td>{$dataUser[dataUser].no}</td>
							<td>{$dataUser[dataUser].fullName}</td>
							<td>{$dataUser[dataUser].username}</td>
							<td>{$dataUser[dataUser].cellphone}</td>
							<td>{$dataUser[dataUser].blocked}</td>
							<td>{$dataUser[dataUser].email}</td>
							<td>
								<a href="users.php?mod=user&act=view&userID={$dataUser[dataUser].userID}" title="View">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="users.php?mod=user&act=edit&userID={$dataUser[dataUser].userID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="users.php?mod=user&act=delete&userID={$dataUser[dataUser].userID}&level={$dataUser[dataUser].levelori}" title="Delete" onClick="return confirm('Anda yakin ingin menghapus user ini?')">
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
	
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen User
				<small>Daftar User</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="users.php"><i class="fa fa-dashboard"></i> Manajemen User</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form metho="GET" action="users.php">
				<input type="hidden" name="mod" value="user">
				<input type="hidden" name="act" value="search">
				<table>
					<tr>
						<td width="100">Temukan User :</td>
						<td>
							<input type="text" class="form-control" name="q" placeholder="Username" style="width: 300px;" required>
						</td>
						<td>
							<button type="submit" class="btn btn-success">GO</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			{if $msg == '1'}
				<p style="color: #5cb85c;">User berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">User berhasil diubah</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">User berhasil dihapus</p>
			{/if}
			<p><a href="users.php?mod=user&act=add"><button class="btn btn-primary">Tambah User</button></a></p>
			<p>Total User : {$numsUser}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Nama Lengkap <i class="fa fa-sort"></i></th>
						<th>Username <i class="fa fa-sort"></i></th>
						<th>Phone <i class="fa fa-sort"></i></th>
						<th>Blokir <i class="fa fa-sort"></i></th>
						<th>Email <i class="fa fa-sort"></i></th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataUser loop=$dataUser}
						<tr>
							<td>{$dataUser[dataUser].no}</td>
							<td>{$dataUser[dataUser].fullName}</td>
							<td>{$dataUser[dataUser].username}</td>
							<td>{$dataUser[dataUser].cellphone}</td>
							<td>{$dataUser[dataUser].blocked}</td>
							<td>{$dataUser[dataUser].email}</td>
							<td>
								<a href="users.php?mod=user&act=view&userID={$dataUser[dataUser].userID}" title="View">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="users.php?mod=user&act=edit&userID={$dataUser[dataUser].userID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="users.php?mod=user&act=delete&userID={$dataUser[dataUser].userID}&level={$dataUser[dataUser].levelori}" title="Delete" onClick="return confirm('Anda yakin ingin menghapus user ini?')">
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
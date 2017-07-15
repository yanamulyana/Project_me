{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ubah Password
			<small>Ubah Password</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="change_password.php"><i class="fa fa-dashboard"></i> Ubah Password</a></li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		{if $msg == '1'}
			<p style="color: red;">Password lama salah.</p>
		{/if}
		{if $msg == '2'}
			<p style="color: red;">Password baru dan password konfirmasi tidak sama.</p>
		{/if}
		{if $msg == '3'}
			<p style="color: #5cb85c;">Password berhasil diubah.</p>
		{/if}
			
		<form method="POST" action="change_password.php?mod=password&act=update">
		<table cellpadding="5" cellspacing="5">
			<tr valign="top">
				<td width="120">Current Password</td>
				<td width="10">:</td>
				<td><input type="password" class="form-control" name="currentPassword" placeholder="Password saat ini" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>New Password</td>
				<td>:</td>
				<td><input type="password" class="form-control" name="newPassword" placeholder="Password baru" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>Confirm Password</td>
				<td>:</td>
				<td><input type="password" class="form-control" name="confirmPassword" placeholder="Ulangi password baru" style="width: 300px;" required></td>
			</tr>
			<tr>
				<td colspan="3">
					<button type="submit" class="btn btn-success">UBAH PASSWORD</button>
					<button type="reset" class="btn btn-default">RESET</button>
				</td>
			</tr>
		</table>	
		</form>
	</section>
		
</aside><!-- /.right-side -->

{include file="footer.tpl"}
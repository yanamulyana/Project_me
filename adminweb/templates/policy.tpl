{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Setting Profiles
			<small>Ketentuan Layanan</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="policy.php"><i class="fa fa-dashboard"></i> Ketentuan Layanan</a></li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		{if $msg == '1'}
			<p style="color: #5cb85c;">Ketentuan layanan berhasil diubah.</p>
		{/if}
		<form method="POST" action="policy.php?mod=policy&act=update">
		<input type="hidden" name="policyID" value="{$policyID}">
		<table cellpadding="5" cellspacing="5" width="100%">
			<tr valign="top">
				<td width="120">Judul Halaman</td>
				<td width="10">:</td>
				<td><input type="text" value="{$pageTitle}" class="form-control" name="pageTitle" placeholder="Judul halaman" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>Deskripsi</td>
				<td>:</td>
				<td><textarea class="form-control" name="description" placeholder="Deskripsi" style="width: 100%;" required>{$description}</textarea></td>
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
</aside><!-- /.right-side -->

{literal}
<script>
	CKEDITOR.replace( 'description' );
</script>
{/literal}

{include file="footer.tpl"}
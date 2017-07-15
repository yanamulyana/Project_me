<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 09:45:22
         compiled from ".\templates\howtobuy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16394593e0042a74cc9-32437793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d414ca44ea367ee4a7138fa6518e057cda27f78' => 
    array (
      0 => '.\\templates\\howtobuy.tpl',
      1 => 1429539048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16394593e0042a74cc9-32437793',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'howID' => 0,
    'pageTitle' => 0,
    'description' => 0,
    'status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e0042b0a455_13900369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e0042b0a455_13900369')) {function content_593e0042b0a455_13900369($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Setting Profiles
			<small>Cara Pembelian</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="howtobuy.php"><i class="fa fa-dashboard"></i> Cara Pembelian</a></li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
			<p style="color: #5cb85c;">Cara pembelian berhasil diubah.</p>
		<?php }?>
		<form method="POST" action="howtobuy.php?mod=howtobuy&act=update">
		<input type="hidden" name="howID" value="<?php echo $_smarty_tpl->tpl_vars['howID']->value;?>
">
		<table cellpadding="5" cellspacing="5" width="100%">
			<tr valign="top">
				<td width="120">Judul Halaman</td>
				<td width="10">:</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
" class="form-control" name="pageTitle" placeholder="Judul halaman" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>Deskripsi</td>
				<td>:</td>
				<td><textarea class="form-control" name="description" placeholder="Deskripsi" style="width: 100%;" required><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><select class="form-control" name="status" style="width: 300px;" required>
						<option value=""></option>
						<option value="Y" <?php if ($_smarty_tpl->tpl_vars['status']->value=='Y'){?>SELECTED<?php }?>>Aktif</option>
						<option value="N" <?php if ($_smarty_tpl->tpl_vars['status']->value=='N'){?>SELECTED<?php }?>>Tidak Aktif</option>
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


<script>
	CKEDITOR.replace( 'description' );
</script>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
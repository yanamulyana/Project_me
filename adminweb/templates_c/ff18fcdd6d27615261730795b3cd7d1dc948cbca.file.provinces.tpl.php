<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 09:40:19
         compiled from ".\templates\provinces.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18887593dff136f3eb3-87660933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff18fcdd6d27615261730795b3cd7d1dc948cbca' => 
    array (
      0 => '.\\templates\\provinces.tpl',
      1 => 1449844164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18887593dff136f3eb3-87660933',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'msg' => 0,
    'provinceID' => 0,
    'provinceName' => 0,
    'status' => 0,
    'numsProvince' => 0,
    'dataProvince' => 0,
    'pageLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593dff137e8ac1_54155475',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dff137e8ac1_54155475')) {function content_593dff137e8ac1_54155475($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='province'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Propinsi
				<small>Tambah Propinsi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="provinces.php"><i class="fa fa-dashboard"></i> Manajemen Propinsi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="provinces.php?mod=province&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Propinsi</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="provinceName" placeholder="Nama propinsi" style="width: 300px;" required></td>
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
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='province'&&$_smarty_tpl->tpl_vars['act']->value=='import'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Propinsi
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="provinces.php"><i class="fa fa-dashboard"></i> Manajemen Propinsi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: green;">Import file berhasil, propinsi berhasil diubah/ditambahkan</p>
			<?php }?>
			<form method="POST" action="import_provinces.php?mod=province&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Propinsi</td>
					<td width="10">:</td>
					<td><a href="export_provinces.php?mod=province&act=export">Export Propinsi</a></td>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='province'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Propinsi
				<small>Edit Propinsi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="provinces.php"><i class="fa fa-dashboard"></i> Manajemen Propinsi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="provinces.php?mod=province&act=update">
			<input type="hidden" name="provinceID" value="<?php echo $_smarty_tpl->tpl_vars['provinceID']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Propinsi</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="provinceName" placeholder="Nama propinsi" style="width: 300px;" value="<?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
" required></td>
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
	
	<?php }else{ ?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Propinsi
				<small>Daftar Propinsi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="provinces.php"><i class="fa fa-dashboard"></i> Manajemen Propinsi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Propinsi berhasil disimpan.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Propinsi berhasil diubah.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Propinsi berhasil dihapus.</p>
			<?php }?>
			<p>
				<a href="provinces.php?mod=province&act=add"><button class="btn btn-primary">Tambah Propinsi</button></a>
				<a href="export_provinces.php?mod=province&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="provinces.php?mod=province&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total propinsi : <?php echo $_smarty_tpl->tpl_vars['numsProvince']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="200">Nama Propinsi <i class="fa fa-sort"></i></th>
						<th width="100">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['name'] = 'dataProvince';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProvince']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['status'];?>
</td>
							<td>
								<a href="provinces.php?mod=province&act=edit&provinceID=<?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="provinces.php?mod=province&act=delete&provinceID=<?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID'];?>
" title="Delete" onClick="return confirm('Are you sure want to delete this province?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<br>
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section><!-- /.content -->
	<?php }?>
</aside><!-- /.right-side -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
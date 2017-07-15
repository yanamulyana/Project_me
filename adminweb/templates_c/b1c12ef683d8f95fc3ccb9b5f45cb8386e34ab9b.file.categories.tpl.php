<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 09:39:59
         compiled from ".\templates\categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28422593dfeff581df5-99314146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1c12ef683d8f95fc3ccb9b5f45cb8386e34ab9b' => 
    array (
      0 => '.\\templates\\categories.tpl',
      1 => 1449844200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28422593dfeff581df5-99314146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'msg' => 0,
    'categoryID' => 0,
    'categoryName' => 0,
    'status' => 0,
    'numsCategory' => 0,
    'dataCategory' => 0,
    'pageLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593dfeff65ce30_51434583',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dfeff65ce30_51434583')) {function content_593dfeff65ce30_51434583($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='category'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
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
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='category'&&$_smarty_tpl->tpl_vars['act']->value=='import'){?>
		
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
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: green;">Import file berhasil, kategori berhasil diubah/ditambahkan</p>
			<?php }?>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='category'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
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
			<input type="hidden" name="categoryID" value="<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Category Name</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="category" placeholder="Category name" style="width: 300px;" value="<?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
" required></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" <?php if ($_smarty_tpl->tpl_vars['status']->value=='Y'){?>SELECTED<?php }?>>Active</option>
							<option value="N" <?php if ($_smarty_tpl->tpl_vars['status']->value=='N'){?>SELECTED<?php }?>>Not Active</option>
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
				Kategori
				<small>Daftar Kategori</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="categories.php"><i class="fa fa-dashboard"></i> Categories</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Kategori berhasil disimpan.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Kategori berhasil diubah.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Kategori berhasil dihapus.</p>
			<?php }?>
			<p>
				<a href="categories.php?mod=category&act=add"><button class="btn btn-primary">Tambah Kategori</button></a>
				<a href="export_categories.php?mod=category&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="categories.php?mod=category&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total category : <?php echo $_smarty_tpl->tpl_vars['numsCategory']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['name'] = 'dataCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['status'];?>
</td>
							<td>
								<a href="categories.php?mod=category&act=edit&categoryID=<?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="categories.php?mod=category&act=delete&categoryID=<?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryID'];?>
" title="Delete" onClick="return confirm('Are you sure want to delete this category?')">
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
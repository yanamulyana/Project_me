<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:09:54
         compiled from ".\templates\services.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18161593e0602563ef7-99331691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72f5f123d58debb6b2363644dcd81316dc840493' => 
    array (
      0 => '.\\templates\\services.tpl',
      1 => 1449855788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18161593e0602563ef7-99331691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'dataCourier' => 0,
    'msg' => 0,
    'serviceID' => 0,
    'courierID' => 0,
    'serviceName' => 0,
    'brandName' => 0,
    'status' => 0,
    'numsService' => 0,
    'dataService' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e06026b6bf3_67244187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e06026b6bf3_67244187')) {function content_593e06026b6bf3_67244187($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='service'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Layanan
				<small>Tambah Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="services.php"><i class="fa fa-dashboard"></i> Manajemen Layanan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="services.php?mod=service&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Ekspedisi</td>
					<td width="10">:</td>
					<td><select class="form-control" name="courierID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['name'] = 'dataCourier';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCourier']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total']);
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
</option>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Nama Layanan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="serviceName" placeholder="Nama layanan" style="width: 300px;" required></td>
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
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='service'&&$_smarty_tpl->tpl_vars['act']->value=='import'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Layanan Ekspedisi
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="services.php"><i class="fa fa-dashboard"></i> Manajemen Layanan Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: green;">Import file berhasil, jasa layanan ekspedisi berhasil diubah/ditambahkan</p>
			<?php }?>
			<form method="POST" action="import_services.php?mod=service&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="160">Export Layanan Ekspedisi</td>
					<td width="10">:</td>
					<td><a href="export_services.php?mod=service&act=export">Export Layanan Ekspedisi</a></td>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='service'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Layanan Ekspedisi
				<small>Edit Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="services.php"><i class="fa fa-dashboard"></i> Manajemen Layanan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="services.php?mod=service&act=update">
			<input type="hidden" name="serviceID" value="<?php echo $_smarty_tpl->tpl_vars['serviceID']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Ekspedisi</td>
					<td width="10">:</td>
					<td><select class="form-control" name="courierID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['name'] = 'dataCourier';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCourier']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID']==$_smarty_tpl->tpl_vars['courierID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Nama Layanan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="serviceName" value="<?php echo $_smarty_tpl->tpl_vars['serviceName']->value;?>
" placeholder="Nama layanan" style="width: 300px;" value="<?php echo $_smarty_tpl->tpl_vars['brandName']->value;?>
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
				Manajemen Layanan
				<small>Daftar Layanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="services.php"><i class="fa fa-dashboard"></i> Manajemen Layanan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Layanan ekspedisi berhasil disimpan.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Layanan ekspedisi berhasil diubah.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Layanan ekspedisi berhasil dihapus.</p>
			<?php }?>
			<p>
				<a href="services.php?mod=service&act=add"><button class="btn btn-primary">Tambah Layanan</button></a>
				<a href="export_services.php?mod=service&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="services.php?mod=service&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total layanan : <?php echo $_smarty_tpl->tpl_vars['numsService']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Ekspedisi <i class="fa fa-sort"></i></th>
						<th>Layanan <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['name'] = 'dataService';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataService']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['status'];?>
</td>
							<td>
								<a href="services.php?mod=service&act=edit&serviceID=<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="services.php?mod=service&act=delete&serviceID=<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceID'];?>
&file=<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['image'];?>
" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus layanan ekspedisi ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
		</section><!-- /.content -->
	<?php }?>
</aside><!-- /.right-side -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
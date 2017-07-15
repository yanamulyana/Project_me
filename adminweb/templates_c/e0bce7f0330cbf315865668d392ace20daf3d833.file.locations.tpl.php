<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:10:46
         compiled from ".\templates\locations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23448593e06365030e9-02796182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0bce7f0330cbf315865668d392ace20daf3d833' => 
    array (
      0 => '.\\templates\\locations.tpl',
      1 => 1449857156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23448593e06365030e9-02796182',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'dataCourier' => 0,
    'dataProvince' => 0,
    'msg' => 0,
    'locationID' => 0,
    'courierID' => 0,
    'provinceID' => 0,
    'dataCity' => 0,
    'cityID' => 0,
    'locationName' => 0,
    'status' => 0,
    'numsLocation' => 0,
    'dataLocation' => 0,
    'pageLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e063666ce02_83137905',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e063666ce02_83137905')) {function content_593e063666ce02_83137905($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



	<script>
		$(document).ready(function(){
			$("#provinceID").change(function(){
				var provinceID = $("#provinceID").val();
				$.ajax({
					url: "../get_cities.php",
					data: "provinceID="+provinceID,
					cache: false,
					success: function(msg){
						$("#cityID").html(msg);
					}
				});
			});
		});
	</script>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='location'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Lokasi Pengambilan
				<small>Tambah Lokasi Pengambilan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="locations.php"><i class="fa fa-dashboard"></i> Manajemen Lokasi Pengambilan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="locations.php?mod=location&act=input">
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
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><select class="form-control" id="provinceID" name="provinceID" style="width: 300px;" required>
							<option value=""></option>
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
								<option value="<?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceName'];?>
</option>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><select class="form-control" name="cityID" id="cityID" style="width: 300px;" required>
							<option value=""></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="locationName" placeholder="Lokasi Pengambilan" style="width: 300px;" required></td>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='location'&&$_smarty_tpl->tpl_vars['act']->value=='import'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Lokasi Pengambilan
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="locations.php"><i class="fa fa-dashboard"></i> Manajemen Lokasi Pengambilan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: green;">Import file berhasil, lokasi pengambilan berhasil diubah/ditambahkan</p>
			<?php }?>
			<form method="POST" action="import_locations.php?mod=location&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="170">Export Lokasi Pengambilan</td>
					<td width="10">:</td>
					<td><a href="export_locations.php?mod=location&act=export">Export Lokasi Pengambilan</a></td>
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
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='location'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Lokasi Pengambilan
				<small>Edit Lokasi Pengambilan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="locations.php"><i class="fa fa-dashboard"></i> Manajemen Lokasi Pengambilan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="locations.php?mod=location&act=update">
			<input type="hidden" name="locationID" value="<?php echo $_smarty_tpl->tpl_vars['locationID']->value;?>
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
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><select class="form-control" name="provinceID" id="provinceID" style="width: 300px;" required>
							<option value=""></option>
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
								<?php if ($_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID']==$_smarty_tpl->tpl_vars['provinceID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><select class="form-control" name="cityID" id="cityID" style="width: 300px;" required>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['name'] = 'dataCity';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCity']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityID']==$_smarty_tpl->tpl_vars['cityID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="locationName" value="<?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
" placeholder="Lokasi Pengambilan" style="width: 300px;" required></td>
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
				<small>Manajemen Lokasi Pengambilan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="locations.php"><i class="fa fa-dashboard"></i> Manajemen Lokasi Pengambilan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Lokasi pengambilan berhasil disimpan.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Lokasi pengambilan berhasil diubah.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Lokasi pengambilan berhasil dihapus.</p>
			<?php }?>
			<p>
				<a href="locations.php?mod=location&act=add"><button class="btn btn-primary">Tambah Lokasi Pengambilan</button></a>
				<a href="export_locations.php?mod=location&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="locations.php?mod=location&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			<p>Total lokasi pengambilan : <?php echo $_smarty_tpl->tpl_vars['numsLocation']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Ekspedisi <i class="fa fa-sort"></i></th>
						<th>Propinsi <i class="fa fa-sort"></i></th>
						<th>Kota <i class="fa fa-sort"></i></th>
						<th>Lokasi Pengambilan <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['name'] = 'dataLocation';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataLocation']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['provinceName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['cityName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['status'];?>
</td>
							<td>
								<a href="locations.php?mod=location&act=edit&locationID=<?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="locations.php?mod=location&act=delete&locationID=<?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationID'];?>
" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus lokasi pengambilan ekspedisi ini?')">
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
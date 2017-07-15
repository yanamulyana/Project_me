<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:06:32
         compiled from ".\templates\ekspedisi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10943593e05386618c2-75771077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2ff14074f8290ac3ce117493f7449a719c6ce49' => 
    array (
      0 => '.\\templates\\ekspedisi.tpl',
      1 => 1449849270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10943593e05386618c2-75771077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'act' => 0,
    'module' => 0,
    'msg' => 0,
    'courierID' => 0,
    'image' => 0,
    'courierName' => 0,
    'courierType' => 0,
    'addCost' => 0,
    'insurance' => 0,
    'status' => 0,
    'dataCourier' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e0538797a96_42070800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e0538797a96_42070800')) {function content_593e0538797a96_42070800($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['act']->value=='add'||$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
	<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Ajaxfile-upload.css">
	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	
	<style>
		li{
			list-style: none;
		}
	</style>
	
	<script>
		$(document).ready(function(){
			
			var btnUpload=$('#me');
			var mestatus=$('#mestatus');
			var files=$('#files');
			new AjaxUpload(btnUpload, {
				action: '../upload/upload_courier.php',
				name: 'uploadfile',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
		                // extension is not allowed 
						mestatus.text('Only JPG file are allowed');
						return false;
					}
					mestatus.html('<img src="../images/ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					//On completion clear the status
					mestatus.text('');
					//On completion clear the status
					files.html('');
					//Add uploaded file to list
					if(response == 'bigger'){
						alert('The file size should not exceed 100kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files').html('<img src="../images/couriers/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc"/><br />').addClass('success');
							$('<li></li>').appendTo('#ekspedisi').html('<input type="hidden" name="filename" value="'+response+'">').addClass('nameupload');
							
						} else{
							$('<li></li>').appendTo('#files').text(file).addClass('error');
						}
					}
				}
			});
		});
	</script>
	
<?php }?>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='ekspedisi'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Ekspedisi
				<small>Tambah Ekspedisi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="ekspedisi.php"><i class="fa fa-dashboard"></i> Manajemen Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="ekspedisi.php?mod=ekspedisi&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Ekspedisi</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="courierName" placeholder="Nama ekspedisi" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Jenis Ekspedisi</td>
					<td>:</td>
					<td><select class="form-control" name="courierType" style="width: 300px;" required>
							<option value=""></option>
							<option value="U">Ekspedisi Umum</option>
							<option value="N">Non Ekspedisi Umum (Travel, Bus, dll)</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Tambahan Biaya</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="addCost" placeholder="Tambahan biaya" style="width: 300px;"></td>
				</tr>
				<tr valign="top">
					<td>Asuransi</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="insurance" placeholder="Asuransi (berapa % dari total biaya)" style="width: 300px;"></td>
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
					<td>Upload Gambar</td>
					<td>:</td>
					<td>
						<p>File size should not exceed uploaded 100 KB and only JPG/JPEG allowed.</p>
						
						<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
							<button class="button_profile"><img src="../images/add.png" width="50"></button>
							
							<div id="ekspedisi">
								<li class="nameupload"></li>
							</div>
							<div id="files">
								<li class="success"></li>
							</div>
						</div>
						<span id="mestatus"></span>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='ekspedisi'&&$_smarty_tpl->tpl_vars['act']->value=='import'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Jasa Ekspedisi
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="ekspedisi.php"><i class="fa fa-dashboard"></i> Manajemen Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: green;">Import file berhasil, jasa ekspedisi berhasil diubah/ditambahkan</p>
			<?php }?>
			<form method="POST" action="import_ekspedisi.php?mod=ekspedisi&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Ekspedisi</td>
					<td width="10">:</td>
					<td><a href="export_ekspedisi.php?mod=ekspedisi&act=export">Export Ekspedisi</a></td>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='ekspedisi'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Ekspedisi
				<small>Edit Ekspedisi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="ekspedisi.php"><i class="fa fa-dashboard"></i> Manajemen Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="ekspedisi.php?mod=ekspedisi&act=update">
			<input type="hidden" name="courierID" value="<?php echo $_smarty_tpl->tpl_vars['courierID']->value;?>
">
			<input type="hidden" name="oldfile" value="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Ekspedisi</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="courierName" placeholder="Nama ekspedisi" style="width: 300px;" value="<?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
" required></td>
				</tr>
				<tr>
					<td>Jenis Ekspedisi</td>
					<td>:</td>
					<td><select class="form-control" name="courierType" style="width: 300px;" required>
							<option value=""></option>
							<option value="U" <?php if ($_smarty_tpl->tpl_vars['courierType']->value=='U'){?>SELECTED<?php }?>>Ekspedisi Umum</option>
							<option value="N" <?php if ($_smarty_tpl->tpl_vars['courierType']->value=='N'){?>SELECTED<?php }?>>Non Ekspedisi Umum (Travel, Bus, dll)</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Tambahan Biaya</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['addCost']->value;?>
" class="form-control" name="addCost" placeholder="Tambahan biaya" style="width: 300px;"></td>
				</tr>
				<tr valign="top">
					<td>Asuransi</td>
					<td>:</td>
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['insurance']->value;?>
" class="form-control" name="insurance" placeholder="Asuransi (berapa % dari total biaya)" style="width: 300px;"></td>
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
				<tr valign="top">
					<td>Upload Gambar</td>
					<td>:</td>
					<td>
						<p>File size should not exceed uploaded 100 KB and only JPG/JPEG allowed.</p>
						
						<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
							<button class="button_profile"><img src="../images/add.png" width="50"></button>
							
							<div id="ekspedisi">
								<li class="nameupload"></li>
							</div>
							<div id="files">
								<li class="success">
									<?php if ($_smarty_tpl->tpl_vars['image']->value!=''){?>
										<img src="../images/couriers/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc"><br>
										<p><a href="../upload/delete_courier.php?mod=courier&act=delete&courierID=<?php echo $_smarty_tpl->tpl_vars['courierID']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" style="font-size: 10pt;" onClick="return confirm('Anda yakin ingin menghapus gambar ini?')">Hapus</a></p>
									<?php }?>
								</li>
							</div>
						</div>
						<span id="mestatus"></span>
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
				Ekspedisi
				<small>Daftar Ekspedisi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="ekspedisi.php"><i class="fa fa-dashboard"></i> Manajemen Ekspedisi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Ekspedisi berhasil disimpan.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Ekspedisi berhasil diubah.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Ekspedisi berhasil dihapus.</p>
			<?php }?>
			<p>
				<a href="ekspedisi.php?mod=ekspedisi&act=add"><button class="btn btn-primary">Tambah Ekspedisi</button></a>
				<a href="export_ekspedisi.php?mod=ekspedisi&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="ekspedisi.php?mod=ekspedisi&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="50">Logo <i class="fa fa-sort"></i></th>
						<th width="200">Nama Ekspedisi <i class="fa fa-sort"></i></th>
						<th width="200">Jenis Ekspedisi <i class="fa fa-sort"></i></th>
						<th width="60">Tambahan Biaya <i class="fa fa-sort"></i></th>
						<th width="60">Asuransi <i class="fa fa-sort"></i></th>
						<th width="100">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
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
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['no'];?>
</td>
							<td><?php if ($_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['image']!=''){?> <img src="../images/couriers/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['image'];?>
" width="80"> <?php }?></td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierType'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['addCost'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['insurance'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['status'];?>
</td>
							<td>
								<a href="ekspedisi.php?mod=ekspedisi&act=edit&courierID=<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="ekspedisi.php?mod=ekspedisi&act=delete&courierID=<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
&file=<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['image'];?>
" title="Delete" onClick="return confirm('Anda yakin ingin menghapus ekspedisi ini?')">
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
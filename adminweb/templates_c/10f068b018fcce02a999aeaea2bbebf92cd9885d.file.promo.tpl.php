<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:12:08
         compiled from ".\templates\promo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6102593e0688d634a8-87899226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10f068b018fcce02a999aeaea2bbebf92cd9885d' => 
    array (
      0 => '.\\templates\\promo.tpl',
      1 => 1439324786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6102593e0688d634a8-87899226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'act' => 0,
    'module' => 0,
    'promoID' => 0,
    'image' => 0,
    'title' => 0,
    'status' => 0,
    'url' => 0,
    'description' => 0,
    'msg' => 0,
    'numsPromo' => 0,
    'dataPromo' => 0,
    'pageLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e0688e63d18_04554342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e0688e63d18_04554342')) {function content_593e0688e63d18_04554342($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
				action: '../upload/upload_promo.php',
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
						alert('The file size should not exceed 500kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files').html('<img src="../images/promo/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc"/><br />').addClass('success');
							$('<li></li>').appendTo('#promo').html('<input type="hidden" name="filename" value="'+response+'">').addClass('nameupload');
							
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

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='promo'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Promosi
				<small>Tambah Promosi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="promo.php"><i class="fa fa-dashboard"></i> Manajemen Promosi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="promo.php?mod=promo&act=input">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Judul</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="title" placeholder="Judul promosi" style="width: 300px;" required></td>
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
					<td>Upload</td>
					<td>:</td>
					<td>
						<p>File size should not exceed uploaded 500 KB and only JPG/JPEG allowed. The resolution must be 1000 x 350 pixels</p>
						<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
							<button class="button_profile"><img src="../images/add.png" width="50"></button>
								
							<div id="promo">
								<li class="nameupload"></li>
							</div>
							<div id="files">
								<li class="success"></li>
					        </div>
						</div>
						<span id="mestatus"></span>
					</td>
				</tr>
				<tr valign="top">
					<td>URL</td>
					<td>:</td>
					<td><input type="url" class="form-control" name="url" placeholder="Url" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Deskripsi</td>
					<td>:</td>
					<td><textarea id="description" name="description"></textarea></td>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='promo'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Promosi
				<small>Edit Promosi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="promo.php"><i class="fa fa-dashboard"></i> Manajemen Promosi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="promo.php?mod=promo&act=update">
			<input type="hidden" name="promoID" value="<?php echo $_smarty_tpl->tpl_vars['promoID']->value;?>
">
			<input type="hidden" name="oldfile" value="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Judul</td>
					<td width="10">:</td>
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="form-control" name="title" placeholder="Judul promosi" style="width: 300px;" required></td>
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
					<td>Upload</td>
					<td>:</td>
					<td>
						<p>File size should not exceed uploaded 500 KB and only JPG/JPEG allowed. The resolution must be 1000 x 350 pixels</p>
						<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
							<button class="button_profile"><img src="../images/add.png" width="50"></button>
								
							<div id="promo">
								<li class="nameupload"></li>
							</div>
							<div id="files">
								<li class="success">
									<?php if ($_smarty_tpl->tpl_vars['image']->value!=''){?>
										<img src="../images/promo/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc">
									<?php }?>
								</li>
					        </div>
						</div>
						<span id="mestatus"></span>
					</td>
				</tr>
				<tr valign="top">
					<td>URL</td>
					<td>:</td>
					<td><input type="url" class="form-control" name="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" placeholder="Url" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Deskripsi</td>
					<td>:</td>
					<td><textarea id="description" name="description"><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea></td>
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
				Promosi
				<small>Daftar Promosi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="promo.php"><i class="fa fa-dashboard"></i> Manajemen Promosi</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Promosi berhasil disimpan.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Promosi berhasil diubah.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Promosi berhasil dihapus.</p>
			<?php }?>
			<p><a href="promo.php?mod=promo&act=add"><button class="btn btn-primary">Tambah Promosi</button></a></p>
			<p>Total promosi : <?php echo $_smarty_tpl->tpl_vars['numsPromo']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="50">No <i class="fa fa-sort"></i></th>
						<th>Judul <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Url / Link <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['name'] = 'dataPromo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataPromo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total']);
?>
						<tr valign="top">
							<td><?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['title'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['status'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['url'];?>
</td>
							<td>
								<a href="promo.php?mod=promo&act=edit&promoID=<?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['promoID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="promo.php?mod=promo&act=delete&promoID=<?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['promoID'];?>
" title="Delete" onClick="return confirm('Are you sure want to delete this promotion?')">
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

<?php if ($_smarty_tpl->tpl_vars['act']->value=='add'||$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
	
	<script>
		CKEDITOR.replace( 'description' );
	</script>
	
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
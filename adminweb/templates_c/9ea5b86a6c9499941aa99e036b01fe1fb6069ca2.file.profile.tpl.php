<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 09:42:47
         compiled from ".\templates\profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15348593dffa724cde9-93498712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ea5b86a6c9499941aa99e036b01fe1fb6069ca2' => 
    array (
      0 => '.\\templates\\profile.tpl',
      1 => 1439410144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15348593dffa724cde9-93498712',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'profileID' => 0,
    'pageTitle' => 0,
    'companyName' => 0,
    'senderName' => 0,
    'address' => 0,
    'phone' => 0,
    'fax' => 0,
    'email' => 0,
    'facebook' => 0,
    'twitter' => 0,
    'description' => 0,
    'status' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593dffa7314983_58991242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dffa7314983_58991242')) {function content_593dffa7314983_58991242($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
			action: '../upload/upload_profile.php',
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
					alert('The file size should not exceed 400kb');
					return false;
				}
				else
				{
					if(response!=="error"){
						$('<li></li>').appendTo('#files').html('<img src="../images/profile/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc"/><br />').addClass('success');
						$('<li></li>').appendTo('#profile').html('<input type="hidden" name="filename" value="'+response+'">').addClass('nameupload');
						
					} else{
						$('<li></li>').appendTo('#files').text(file).addClass('error');
					}
				}
			}
		});
	});
</script>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Setting Profiles
			<small>Tentang Kami</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="profile.php"><i class="fa fa-dashboard"></i> Tentang Kami</a></li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
			<p style="color: #5cb85c;">Tentang kami berhasil diubah.</p>
		<?php }?>
		<form method="POST" action="profile.php?mod=profile&act=update">
		<input type="hidden" name="profileID" value="<?php echo $_smarty_tpl->tpl_vars['profileID']->value;?>
">
		<table cellpadding="5" cellspacing="5" width="100%">
			<tr valign="top">
				<td width="120">Judul Halaman</td>
				<td width="10">:</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
" class="form-control" name="pageTitle" placeholder="Judul halaman" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>Nama Toko Online</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['companyName']->value;?>
" class="form-control" name="companyName" placeholder="Nama toko online" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>Nama Pengirim (Label)</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['senderName']->value;?>
" class="form-control" name="senderName" placeholder="Nama pengirim (label)" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>Alamat</td>
				<td>:</td>
				<td><textarea class="form-control" name="address" placeholder="Alamat" style="width: 100%;" required><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea></td>
			</tr>
			<tr valign="top">
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" class="form-control" name="phone" placeholder="Telepon" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>Fax</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['fax']->value;?>
" class="form-control" name="fax" placeholder="Fax" style="width: 300px;"></td>
			</tr>
			<tr valign="top">
				<td>Email</td>
				<td>:</td>
				<td><input type="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" class="form-control" name="email" placeholder="Email" style="width: 300px;" required></td>
			</tr>
			<tr valign="top">
				<td>Facebook URL</td>
				<td>:</td>
				<td><input type="url" value="<?php echo $_smarty_tpl->tpl_vars['facebook']->value;?>
" class="form-control" name="facebook" placeholder="Facebook url" style="width: 300px;"></td>
			</tr>
			<tr valign="top">
				<td>Twitter URL</td>
				<td>:</td>
				<td><input type="url" value="<?php echo $_smarty_tpl->tpl_vars['twitter']->value;?>
" class="form-control" name="twitter" placeholder="Twitter url" style="width: 300px;"></td>
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
			<tr valign="top">
				<td>Upload Logo</td>
				<td>:</td>
				<td>
					<p>File tidak boleh melebihi 400 KB</p>
					<div id="me" style="cursor:pointer; height: 70px; width: 75px;">
						<button class="button_profile"><img src="../images/add.png" width="50"></button>
							
						<div id="profile">
							<li class="nameupload"></li>
						</div>
						<div id="files">
							<li class="success">
								<?php if ($_smarty_tpl->tpl_vars['image']->value!=''){?>
									<img src="../images/profile/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-60px; border: 3px solid #ccc">
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
</aside><!-- /.right-side -->


<script>
	CKEDITOR.replace( 'description' );
</script>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>